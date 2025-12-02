<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Front_model;
use App\Models\Common_model;
use App\Mail\Thankyou;
use App\Mail\ContactUs;
use App\Mail\Subscribe;

class Home extends Controller
{
    public function __construct(){
        $this->data['title'] = 'Login';
        $this->frontmodel = new Front_model;
        $this->commonmodel = new Common_model;
    }
    public function index(){
        $data['settings'] = $this->commonmodel->get_setting();
        $data['locations'] = $this->frontmodel->get_locations();
        $data['packages'] = $this->frontmodel->get_packages();
        $data['banners'] = $this->commonmodel->getAllRecord('tbl_banner',['status'=>'Y','page'=>1]);
        $data['testimonial'] = $this->commonmodel->getAllRecord('tbl_testimonial',['status'=>'Y']);
        $data['newBlogs'] = $this->frontmodel->get_recent_two_blog();
        // echo '<pre>'; print_r($data['newBlogs']); exit;
        return view('home', $data);
    }
    public function visa(){ 
        $data['visa_list'] = $this->frontmodel->get_all_visa();
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>'Y','page'=>7]);
       return view('visa', $data);
    }
    public function about_us(){
        $data['settings'] = $this->commonmodel->get_setting();
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>'Y','page'=>4]);
        $data['newBlogs'] = $this->frontmodel->get_recent_two_blog();
        return view('about_us', $data);
    }
    public function domestic_tour(){
        $data['page_title'] = 'Domestic Tour';
        $data['packages'] = $this->frontmodel->get_packages_by_destination_and_destination_type('d');
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>'Y','page'=>5]);
        return view('package_list', $data);
    }
    public function international_tour(){
        $data['page_title'] = 'International Tour';
        $data['packages'] = $this->frontmodel->get_packages_by_destination_and_destination_type('i');
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>'Y','page'=>5]);
        return view('package_list', $data);
    }
    public function package_list($location_url=null){
        if($location_url != null){
            $data['page_title'] = ucwords($location_url.' Tour');
        }
        $data['packages'] = $this->frontmodel->get_packages_by_destination_and_destination_type('',$location_url);
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>'Y','page'=>5]);

        return view('package_list', $data);
    }
    public function contact(){
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>'Y','page'=>3]);
        $data['settings'] = $this->commonmodel->getOneRecord('tbl_setting',['id'=>1]);
        return view('contact', $data);
    }
    public function hotel(){
        $data['hotels'] = $this->frontmodel->get_hotel();
        // print_r($data['hotels']); exit;
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>'Y','page'=>8]);
        return view('hotel', $data);
    }
    /*public function package_details(){
        return view('package_details');
    }*/
    public function hotel_details($url){
        $data['hotel'] = $this->frontmodel->get_hotel($url);
        if(empty($data['hotel'])){
            return redirect()->to('/404');
        }
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>'Y','page'=>9]);
        return view('hotel_details', $data);
    }
    public function destination(){
        $data['locations'] = $this->frontmodel->get_locations();
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>'Y','page'=>6]);
        return view('destination_list', $data);
    }
    public function blogs(){
        $data['page_title'] = 'Blog';
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>'Y','page'=>10]);
        $data['blogs'] = $this->commonmodel->getAllRecord('tbl_blog',['blog_status'=>'Y']);

        return view('bloglist', $data);
    }
    public function blog_details($url){
        $data['page_title'] = 'Blog';
        $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>'Y','page'=>10]);
        $data['blog'] = $this->commonmodel->getOneRecord('tbl_blog',['blog_url'=>$url]);
        $data['otherBlogs'] = $this->commonmodel->getAllRecord('tbl_blog',[['blog_url','!=',$url],'blog_status'=>'Y']);
        $data['blogCat'] = $this->commonmodel->getAllRecord('tbl_blog_category',['status'=>'Y']);
        if(empty($data['blog'])){
            return redirect()->to('/404');
        }
        return view('blogdeatails', $data);
    }

    public function any_fun(Request $request){
        $segment1 = $request->segment(1);
        $destDtls = $this->commonmodel->getOneRecord('tbl_locations',['url'=>$segment1]);
        $pkgDtls = $this->commonmodel->getOneRecord('tbl_package',['url'=>$segment1]);
        $cms = $this->commonmodel->getOneRecord('tbl_cms',['status'=>'Y','page'=>$segment1]);
        // print_r($destDtls); exit;
        if(!empty($destDtls)){
           $data['solo'] = $destDtls;
           $data['banner'] = $this->commonmodel->getOneRecord('tbl_banner',['status'=>'Y','page'=>6]);
           return view('destionation_details', $data);
           exit;
        }elseif(!empty($pkgDtls)){
           $data['solo'] = $pkgDtls;
           return view('package_details', $data);
           exit;
        }elseif(!empty($cms)){
           $data['cms'] = $cms;
           return view('cms', $data);
           exit;
        }else{
           return redirect()->to('/404');
        }
    }
    public function save_contact_us(Request $request){
        if ($request->isMethod('POST')){
           $post = array();
           $message = ['msg'=>'Something went wrong!','type'=>'danger'];
           // $validation = $this->validate($request,[
           $validator = Validator::make($request->all(), [
              'name'=>'required',
              'phone'=>'required',
              'email' => 'required|email',
            //   'company_name'=> 'required',
              // 'meta_description'=>'required',
              // 'meta_keyword'=>'required',
              // 'post_date'=>'required',
              // 'blog_added_by'=>'required',
              // 'blog_status'=>'required'
           ]);
           if ($validator->fails()) {
              $errors = $validator->errors();
              $errArr = array(
                 'name' => $errors->first('name'),
                 'phone' => $errors->first('phone'),
                 'email' => $errors->first('email'),
              );
              $result['error'] = $errArr;
           
           }elseif($validator->passes()){
              
              $post['name'] = trim($_POST['name']);
              $post['phone'] = $_POST['phone'];
              $post['email'] = $_POST['email'];
              $post['message'] = $_POST['message'];
              if(isset($_POST['p_id']) && $_POST['p_id'] != ''){
                $post['type'] = 'BT';
                $post['p_id'] = $_POST['p_id'];
                $package = $this->commonmodel->hybrid('R1','tbl_package','', ['p_id'=>$_POST['p_id']]);
              }
              if(isset($_POST['h_id']) && $_POST['h_id'] != ''){
                $post['type'] = 'HA';
                $post['h_id'] = $_POST['h_id'];
                $hotel = $this->commonmodel->hybrid('R1','tbl_hotel','', ['h_id'=>$_POST['h_id']]);
              }
              if(isset($_POST['v_id']) && $_POST['v_id'] != ''){
                $post['type'] = 'VI';
                $post['v_id'] = $_POST['v_id'];
                $visa = $this->commonmodel->hybrid('R1','tbl_visa','', ['id'=>$_POST['v_id']]);
              }
              $post['added_at'] = date('Y-m-d H:i:s');
              $insertId = $this->commonmodel->hybrid('C','tbl_contact_us', $post);
              if ($insertId) {
                $post['msg'] = $_POST['message'];
                $post['package_name'] = (isset($package->tour_title))?$package->tour_title:'';
                $post['hotel_name'] = (isset($hotel->hotel_title))?$hotel->hotel_title:'';
                $post['visa_name'] = (isset($visa->visa_name))?$visa->visa_name:'';
                Mail::to(ADMIN_MAIL_TO)->send(new ContactUs($post));
                Mail::to($_POST['email'])->send(new ThankYou($post));
                 $swal_session = array(
                    'title' => 'Thank You!',
                    'text' => 'Thank you for contacting us!. We will be in touch with you shortly.',
                );
                session(['swal_session'=>$swal_session]);
                session()->save();
                $result['msg'] = 'success';
              }
           }
           echo json_encode($result);exit;
           
        }
    }
    
    public function save_subscriber(Request $request){
        if ($request->isMethod('POST')){
           $post = array();
           $message = ['msg'=>'Something went wrong!','type'=>'danger'];
           // $validation = $this->validate($request,[
           $validator = Validator::make($request->all(), [
              'email'=>'required|email|unique:tbl_newsletter,email',
           ]);
           if ($validator->fails()) {
              $errors = $validator->errors();
              $errArr = array(
                 'email' => $errors->first('email'),
              );
              $result['error'] = $errArr;
           
           }elseif($validator->passes()){
              $post['email'] = $_POST['email'];
              $insertId = $this->commonmodel->hybrid('C','tbl_newsletter', $post);
              if($insertId) {
                Mail::to(ADMIN_MAIL_TO)->send(new Subscribe($post));
                 /*$swal_session = array(
                    'title' => 'Thank You!',
                    'text' => 'Thank you for subscribe!. We will be in touch with you shortly.',
                );
                session(['swal_session'=>$swal_session]);
                session()->save();*/
                $result['msg'] = 'success';
              }else {
                 $result['err'] = 'fail';
              }
           }
           echo json_encode($result);exit;
           
        }
    }
    public function testmail(){
        $data = array(
            'name'=>"Raj",
            'phone' => "1234567890",
            'email' => "raj@yopmail.com",
            'msg' => "This is new test mail",
        );
        // $mailto = 'rajgudduara18@gmail.com';
        $mailto = 'test152@yopmail.com';
        $from = 'xyz@gmail.com';
        /*Mail::send('email.thankyou', $data, function($message) {
            $message->to($email, 'BALAJI Tour Package')->subject
                ('Thank You for Choosing Us!');
            $message->from($from,'BALAJI Tour Package');
        });*/
        Mail::to($mailto)->send(new ThankYou($data));
        echo "Basic Email Sent. Check your inbox.";
        //return view('email.thankyou');
     }
}
