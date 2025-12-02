<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Common_model;
use App\Models\Admin_model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class Admin extends Controller
{
    public function __construct(){
        $this->data['title'] = 'Login';
        $this->commonmodel = new Common_model;
        $this->adminmodel = new Admin_model;
    }
    public function index(){
        return view('admin.dashboard', $this->data);
    }
    public function settings(Request $request){
        if($request->isMethod('POST')){
            $data = array();
            unset($_POST['_token']);
            unset($_POST['id']);
            $data = $_POST;
            $updated = $this->commonmodel->update_setting($data);
            if($updated){
                $request->session()->flash('message',['msg'=>'Setting Update Successfully','type'=>'success']);
                return redirect()->to(url(ADMIN.'-settings'));
            }else{
                $request->session()->flash('message',['msg'=>'All field already upToDate.','type'=>'danger']);
                return redirect()->to(url(ADMIN.'-settings'));
            }
        }
        $this->data['settings'] = $this->commonmodel->get_setting();  
        return view('admin.settings.edit_settings', $this->data);
    }
    /******************************Testimonials****************************************** */
    public function testimonials(Request $request){
        $this->data['testimonial'] = $this->commonmodel->hybrid('RA','tbl_testimonial','','',['id','DESC']);
        return view('admin.testimonial.index', $this->data);
    }
    public function add_edit_testimonials(Request $request, $id=null){
        if($request->isMethod('POST')){
            $post = array();
            $message = ['msg'=>'Something went wrong!','type'=>'danger'];
            $validation = $this->validate($request, [
                'name' =>'required',
                'description' =>'required|',
                ],[
                    'name.required'=>'The name is required',
            ]);
            if($validation){
                // print_r($_POST); exit;
                if($request->hasFile('logo')){
                    if($request->file('logo')->isValid()) {
                        $fileContent = $request->file('logo');
                        $newfilename = $this->uploadImage($fileContent, $_POST['old_image']);
                        if($newfilename){
                            $post['logo'] = $newfilename;
                        }
                    }
                }
                $post['name'] = trim($request->input('name'));
                $post['description'] = $request->input('description');
                $post['post'] = $request->input('post');
                $post['status'] = $request->input('status');
                if(!$id){
                    $post['added_at'] = date('Y-m-d H:i:s');
                    if($this->commonmodel->hybrid('C','tbl_testimonial', $post)){
                        $message = ['msg'=>'Data inserted successfully.', 'type'=>'success'];
                    }
                }else{
                    $post['update_at'] = date('Y-m-d H:i:s');
                    if($this->commonmodel->hybrid('U','tbl_testimonial', $post, ['id'=>$id])){
                        $message = ['msg'=>'Data updated successfully.', 'type'=>'success'];
                    }
                }
                return redirect()->to(ADMIN.'-testimonials')->with('message', $message);
            }
        }
        if($id){
            $this->data['solo'] = $this->commonmodel->hybrid('R1','tbl_testimonial','', ['id'=>$id]);
        }
        return view('admin.testimonial.add_edit_testimonial', $this->data);
    }
    /***********************************CMS************************************* */
    public function cms(Request $request)
	{
        $this->data['cms'] = $this->adminmodel->get_cms_list();
        return view('admin.cms.cms_index', $this->data);
	}
    public function add_edit_cms(Request $request, $id=false){
        if ($request->isMethod('POST')){
            $post = array();
            $message = ['msg'=>'Something went wrong!','type'=>'danger'];
            $validation = $this->validate($request,[
                'page'=>'required',
                'banner_title'=>'required',
                'description'=>'required',
                // 'cms_banner'=> 'max:10|mimes:jpg,png,jpeg,JPEG,bmp',
                //'description1'=>'required',
                'status'=>'required'
            ]);
            if($validation){
                // print_r($_POST); exit;
                if($request->hasFile('cms_banner')){
                    if($request->file('cms_banner')->isValid()) {
                        $fileContent = $request->file('cms_banner');
                        $newfilename = $this->uploadImage($fileContent, $_POST['old_image']);
                        if($newfilename){
                            $post['cms_banner'] = $newfilename;
                        }
                    }
                }
                $post['page'] = $_POST['page'];
                $post['banner_title'] = $_POST['banner_title'];
                $post['description'] = $_POST['description'];
                // $data['banner_head'] = $_POST['banner_head'];
                //$data['description2'] = $_POST['description2'];
                //$data['description3'] = $_POST['description3'];
                //$data['description4'] = $_POST['description4'];
                //$data['description5'] = $_POST['description5'];
                $post['status'] = $_POST['status'];
                if(!$id){
                    $post['added_at'] = date('Y-m-d H:i:s');
                    if($this->commonmodel->hybrid('C','tbl_cms', $post)){
                        $message = ['msg'=>'Data inserted successfully.', 'type'=>'success'];
                    }
                }else{
                    $post['updated_at'] = date('Y-m-d H:i:s');
                    if($this->commonmodel->hybrid('U','tbl_cms', $post, ['id'=>$id])){
                        $message = ['msg'=>'Data updated successfully.', 'type'=>'success'];
                    }
                }
                return redirect()->to(ADMIN.'-cms')->with('message', $message);
            }
            
        }
        if($id){
            $this->data['solo'] = $this->commonmodel->hybrid('R1','tbl_cms','', ['id'=>$id]);
        }
        $this->data['pages'] = $this->commonmodel->hybrid('RA','tbl_page');
        return view('admin.cms.add_edit_cms', $this->data);
    }
    /***********************************MANAGE BANNER************************************* */
    public function banner(Request $request)
	{
        $this->data['banners'] = $this->adminmodel->get_banner_list();
        return view('admin.banner.banner_index', $this->data);
	}
    public function add_edit_banner(Request $request, $id=false){
        if ($request->isMethod('POST')){
            $post = array();
            $message = ['msg'=>'Something went wrong!','type'=>'danger'];
            $validation = $this->validate($request,[
                'page'=>'required',
                'main_title'=>'required',
                // 'banner_head'=>'required',
                // 'cms_banner'=> 'max:10|mimes:jpg,png,jpeg,JPEG,bmp',
                //'description1'=>'required',
                'status'=>'required'
                ],[
                    'main_title.required' => 'Banner title is required',
                ]);
            if($validation){
                // print_r($_POST); exit;
                if($request->hasFile('image')){
                    if($request->file('image')->isValid()) {
                        $fileContent = $request->file('image');
                        $newfilename = $this->uploadImage($fileContent, $_POST['old_image']);
                        if($newfilename){
                            $post['image'] = $newfilename;
                        }
                    }
                }
                $post['page'] = $request->input('page');
                $post['main_title'] = $request->input('main_title');
                $post['image_alt'] = $_POST['image_alt'];
                $post['image_title'] = $_POST['image_title'];
                $post['status'] = $request->input('status');
                if(!$id){
                    // $post['added_at'] = date('Y-m-d H:i:s');
                    if($this->commonmodel->hybrid('C','tbl_banner', $post)){
                        $message = ['msg'=>'Data inserted successfully.', 'type'=>'success'];
                    }
                }else{
                    $post['update_at'] = date('Y-m-d H:i:s');
                    if($this->commonmodel->hybrid('U','tbl_banner', $post, ['id'=>$id])){
                        $message = ['msg'=>'Data updated successfully.', 'type'=>'success'];
                    }
                }
                return redirect()->to(ADMIN.'-banner')->with('message', $message);
            }
            
        }
        if($id){
            $this->data['solo'] = $this->commonmodel->hybrid('R1','tbl_banner','', ['id'=>$id]);
        }
        $this->data['pages'] = $this->commonmodel->hybrid('RA','tbl_page');
        return view('admin.banner.add_edit_banner', $this->data);
    }
    public function contact_us(Request $request){
        if ($request->isMethod('POST')){
            // print_r($_POST);exit;
            $id = $_POST['id'];
            $data['status'] = $_POST['status'];
            $updated = $this->commonmodel->hybrid('U','tbl_contact_us', $data, ['id'=>$id]);
            if($updated){
                $request->session()->flash('message', ['msg'=>'Record Updated Successfully', 'type'=>'success']);
            }else{
                $request->session()->flash('message', ['msg'=>'Record Not Update. Please try again...', 'type'=>'danger']);
            }
            return redirect()->to(url(ADMIN.'-contact_us'));
        }
        $this->data['contactList'] = $this->commonmodel->hybrid('RA','tbl_contact_us','','',['id','DESC']);
        return view('admin.contact_us.contact_index', $this->data);
	}

    public function blogs(Request $request){
        $this->data['blogs'] = $this->commonmodel->hybrid('RA','tbl_blog','','',['blg_id','DESC']);
        return view('admin.blog.blog_index', $this->data);
	}
    public function add_edit_blog(Request $request, $id=false){
        if ($request->isMethod('POST')){
            $post = array();
            $message = ['msg'=>'Something went wrong!','type'=>'danger'];
            $validation = $this->validate($request,[
                'catid'=>'required',
                'blog_title'=>'required',
                'blog_url'=>'required',
                'short_desc'=>'required',
                'blog_details'=>'required',
                'meta_title'=> 'required',
                'meta_description'=>'required',
                'meta_keyword'=>'required',
                'post_date'=>'required',
                'blog_added_by'=>'required',
                'blog_status'=>'required'
            ]);
            if($validation){
                // print_r($_POST); exit;
                if($request->hasFile('blog_image')){
                    if($request->file('blog_image')->isValid()) {
                        $fileContent = $request->file('blog_image');
                        $newfilename = $this->uploadImage($fileContent, $_POST['old_image']);
                        if($newfilename){
                            $post['blog_image'] = $newfilename;
                        }
                    }
                }
                $post['catid'] = $_POST['catid'];
                $post['blog_title'] = trim($_POST['blog_title']);
                $post['blog_url'] = trim($_POST['blog_url']);
                $post['short_desc'] = trim($_POST['short_desc']);
                $post['blog_details'] = $_POST['blog_details'];
                $post['meta_title'] = trim($_POST['meta_title']);
                $post['meta_description'] = trim($_POST['meta_description']);
                $post['meta_keyword'] = trim($_POST['meta_keyword']);
                $post['post_date'] = date('Y-m-d',strtotime($_POST['post_date']));
                $post['blog_added_by'] = $_POST['blog_added_by'];
                $post['tot_views'] = $_POST['tot_views'];
                $post['blog_status'] = $_POST['blog_status'];
                if(!$id){
                    $post['added_at'] = date('Y-m-d H:i:s');
                    if($this->commonmodel->hybrid('C','tbl_blog', $post)){
                        $message = ['msg'=>'Data inserted successfully.', 'type'=>'success'];
                    }
                }else{
                    $post['update_at'] = date('Y-m-d H:i:s');
                    if($this->commonmodel->hybrid('U','tbl_blog', $post, ['blg_id'=>$id])){
                        $message = ['msg'=>'Data updated successfully.', 'type'=>'success'];
                    }
                }
                return redirect()->to(ADMIN.'-blogs')->with('message', $message);
            }
            
        }
        if($id){
            $this->data['solo'] = $this->commonmodel->hybrid('R1','tbl_blog','', ['blg_id'=>$id]);
        }
        $this->data['category'] = $this->commonmodel->hybrid('RA','tbl_blog_category','',['status'=>'Y']);
        return view('admin.blog.add_edit_blog', $this->data);
    }
    public function visa(Request $request){
        $this->data['visa'] = $this->commonmodel->hybrid('RA','tbl_visa','','',['id','DESC']);
        return view('admin.visa.visa_index', $this->data);
	}
    public function add_edit_visa(Request $request, $id=false){
        if ($request->isMethod('POST')){
            $post = array();
            $message = ['msg'=>'Something went wrong!','type'=>'danger'];
            $validation = $this->validate($request,[
                'visa_name'=>'required',
                'country'=>'required',
                'max_stays'=>'required',
                'process_time'=> 'required',
                'start_from'=>'required',
            ]);
            if($validation){
                // print_r($_POST); exit;
                if($request->hasFile('image')){
                    if($request->file('image')->isValid()) {
                        $fileContent = $request->file('image');
                        $newfilename = $this->uploadImage($fileContent, $_POST['old_image']);
                        if($newfilename){
                            $post['image'] = $newfilename;
                        }
                    }
                }
                $post['visa_name'] = trim($_POST['visa_name']);
                $post['country'] = $_POST['country'];
                $post['type'] = trim($_POST['type']);
                $post['mode'] = trim($_POST['mode']);
                $post['max_stays'] = trim($_POST['max_stays']);
                $post['process_time'] = trim($_POST['process_time']);
                $post['start_from'] = $_POST['start_from'];
                $post['status'] = $_POST['status'];
                if(!$id){
                    $post['added_at'] = date('Y-m-d H:i:s');
                    if($this->commonmodel->hybrid('C','tbl_visa', $post)){
                        $message = ['msg'=>'Data inserted successfully.', 'type'=>'success'];
                    }
                }else{
                    $post['update_at'] = date('Y-m-d H:i:s');
                    if($this->commonmodel->hybrid('U','tbl_visa', $post, ['id'=>$id])){
                        $message = ['msg'=>'Data updated successfully.', 'type'=>'success'];
                    }
                }
                return redirect()->to(ADMIN.'-visa')->with('message', $message);
            }
            
        }
        if($id){
            $this->data['solo'] = $this->commonmodel->hybrid('R1','tbl_visa','', ['id'=>$id]);
        }
        $this->data['countries'] = $this->commonmodel->hybrid('RA','tbl_countries','',['status'=>1],['countries_name','ASC']);
        return view('admin.visa.add_edit_visa', $this->data);
    }
    public function locations(Request $request){
        $this->data['listing'] = $this->commonmodel->hybrid('RA','tbl_locations','','',['id','DESC']);
        return view('admin.location.location_index', $this->data);
	}
    public function add_edit_location(Request $request, $id=false){
        if ($request->isMethod('POST')){
            $post = array();
            $message = ['msg'=>'Something went wrong!','type'=>'danger'];
            $validation = $this->validate($request,[
                'name'=>'required',
                'url'=>'required',
                'type'=>'required',
                'title'=>'required',
                'status'=>'required'
            ]);
            if($validation){
                // print_r($_POST); exit;
                if($request->hasFile('image')){
                    if($request->file('image')->isValid()) {
                        $fileContent = $request->file('image');
                        $newfilename = $this->uploadImage($fileContent, $_POST['old_image']);
                        if($newfilename){
                            $post['image'] = $newfilename;
                        }
                    }
                }
                if($request->hasFile('image2')){
                    if($request->file('image2')->isValid()) {
                        $fileContent = $request->file('image2');
                        $newfilename = $this->uploadImage($fileContent, $_POST['old_image2']);
                        if($newfilename){
                            $post['image2'] = $newfilename;
                        }
                    }
                }
                if($request->hasFile('image3')){
                    if($request->file('image3')->isValid()) {
                        $fileContent = $request->file('image3');
                        $newfilename = $this->uploadImage($fileContent, $_POST['old_image3']);
                        if($newfilename){
                            $post['image3'] = $newfilename;
                        }
                    }
                }
                if($request->hasFile('image4')){
                    if($request->file('image4')->isValid()) {
                        $fileContent = $request->file('image4');
                        $newfilename = $this->uploadImage($fileContent, $_POST['old_image4']);
                        if($newfilename){
                            $post['image4'] = $newfilename;
                        }
                    }
                }
                if($request->hasFile('image5')){
                    if($request->file('image5')->isValid()) {
                        $fileContent = $request->file('image5');
                        $newfilename = $this->uploadImage($fileContent, $_POST['old_image5']);
                        if($newfilename){
                            $post['image5'] = $newfilename;
                        }
                    }
                }
                if($request->hasFile('image6')){
                    if($request->file('image6')->isValid()) {
                        $fileContent = $request->file('image6');
                        $newfilename = $this->uploadImage($fileContent, $_POST['old_image6']);
                        if($newfilename){
                            $post['image6'] = $newfilename;
                        }
                    }
                }
                $post['name'] = trim($_POST['name']);
                $post['url'] = trim($_POST['url']);
                $post['type'] = $_POST['type'];
                $post['title'] = trim($_POST['title']);
                $post['description'] = $_POST['description'];
                $post['title2'] = trim($_POST['title2']);
                $post['description2'] = $_POST['description2'];
                $post['points'] = $_POST['points'];
                $post['status'] = $_POST['status'];
                if(!$id){
                    $post['added_at'] = date('Y-m-d H:i:s');
                    if($this->commonmodel->hybrid('C','tbl_locations', $post)){
                        $message = ['msg'=>'Data inserted successfully.', 'type'=>'success'];
                    }
                }else{
                    $post['update_at'] = date('Y-m-d H:i:s');
                    if($this->commonmodel->hybrid('U','tbl_locations', $post, ['id'=>$id])){
                        $message = ['msg'=>'Data updated successfully.', 'type'=>'success'];
                    }
                }
                return redirect()->to(ADMIN.'-locations')->with('message', $message);
            }
            
        }
        if($id){
            $this->data['solo'] = $this->commonmodel->hybrid('R1','tbl_locations','', ['id'=>$id]);
        }
        // $this->data['pages'] = $this->commonmodel->hybrid('RA','tbl_page');
        return view('admin.location.add_edit_location', $this->data);
    }
    /*******************************PACKAGE************************** */
    public function packages(Request $request){
        $this->data['listing'] = $this->commonmodel->hybrid('RA','tbl_package','','',['p_id','DESC']);
        return view('admin.package.package_index', $this->data);
	}
    public function add_edit_package(Request $request, $config=null){
        $config = json_decode(base64_decode($config),true);
        $id = (isset($config['id']))?$config['id']:null;
        // echo ($id); 
        if($request->isMethod('POST')){
            $post = array();
            $tabname = '';
            $message = ['msg'=>'Something went wrong!','type'=>'danger'];
            if($request->input('submit') == 'basic'){
                $validation = $this->validate($request,[
                    'tour_title'=>'required',
                    'url'=>'required',
                    'destination'=>'required',
                    'description'=>'required',
                ]);
                if($validation){
                    $tabname = 'Basic';
                    $post['add_by'] = session('user_id');
                    if($request->hasFile('tour_image')){
                        if($request->file('tour_image')->isValid()) {
                            $fileContent = $request->file('tour_image');
                            $newfilename = $this->uploadImage($fileContent, $_POST['old_image']);
                            if($newfilename){
                                $post['tour_image'] = $newfilename;
                            }
                        }
                    }
                    if($request->hasFile('tour_image2')){
                        if($request->file('tour_image2')->isValid()) {
                            $fileContent = $request->file('tour_image2');
                            $newfilename = $this->uploadImage($fileContent, $_POST['old_image2']);
                            if($newfilename){
                                $post['tour_image2'] = $newfilename;
                            }
                        }
                    }
                    if($request->hasFile('tour_image3')){
                        if($request->file('tour_image3')->isValid()) {
                            $fileContent = $request->file('tour_image3');
                            $newfilename = $this->uploadImage($fileContent, $_POST['old_image3']);
                            if($newfilename){
                                $post['tour_image3'] = $newfilename;
                            }
                        }
                    }
                    if($request->hasFile('tour_image4')){
                        if($request->file('tour_image4')->isValid()) {
                            $fileContent = $request->file('tour_image4');
                            $newfilename = $this->uploadImage($fileContent, $_POST['old_image4']);
                            if($newfilename){
                                $post['tour_image4'] = $newfilename;
                            }
                        }
                    }
                    if($request->hasFile('tour_image5')){
                        if($request->file('tour_image5')->isValid()) {
                            $fileContent = $request->file('tour_image5');
                            $newfilename = $this->uploadImage($fileContent, $_POST['old_image5']);
                            if($newfilename){
                                $post['tour_image5'] = $newfilename;
                            }
                        }
                    }
                    $post['tour_title'] = $_POST['tour_title'];
                    $post['url'] = $_POST['url'];
                    $post['destination'] = $_POST['destination'];
                    $post['ti_alt'] = $_POST['ti_alt'];
                    $post['ti_title'] = $_POST['ti_title'];
                    $post['description'] = $_POST['description'];
                    $post['meta_title'] = $_POST['meta_title'];
                    $post['meta_keyword'] = $_POST['meta_keyword'];
                    $post['meta_description'] = $_POST['meta_description'];
                    $post['c_tab'] = 1;
                }
            }
            if($request->input('submit') == 'tab2'){
                $validation = $this->validate($request,[
                    'included'=>'required',
                    'excluded'=>'required',
                    'highlights'=>'required',
                ]);
                if($validation){
                    $tabname = 'Features';
                    $post['add_by'] = session('user_id');
                    $post['included'] = $_POST['included'];
                    $post['excluded'] = $_POST['excluded'];
                    $post['highlights'] = $_POST['highlights'];
                    $post['c_tab'] = 2;
                }
            }
            if($request->input('submit') == 'tab3'){
                $validation = $this->validate($request,[
                    'iti_title.0'=>'required',
                    'desc.0'=>'required',
                ]);
                if($validation){
                    $tabname = 'Itinerary';
                    $itiArr = [];
                    if(sizeof($_POST['iti_title'])){
                        $n=0;
                        foreach($_POST['iti_title'] as $k=>$title){
                            if($title != '' && $_POST['desc'][$k] != ''){
                                $itiArr[$n]['title'] = $title;
                                $itiArr[$n]['desc'] = $_POST['desc'][$k];
                                $itiArr[$n]['b_point'] = $_POST['b_point'][$k];
                                $n++;
                            }
                        }
                    }
                    if(!empty($itiArr)){
                        $post['itinerary'] = json_encode($itiArr);
                    }
                    // echo '<pre>';print_r($itiArr); exit;
                    $post['c_tab'] = 3;
                }
            }
            if($request->input('submit') == 'tab4'){
                $validation = $this->validate($request,[
                    'faq_title.0'=>'required',
                    'desc.0'=>'required',
                ]);
                if($validation){
                    $tabname = 'Faq';
                    $faqArr = [];
                    if(sizeof($_POST['faq_title'])){
                        $n=0;
                        foreach($_POST['faq_title'] as $k=>$title){
                            if($title != '' && $_POST['desc'][$k] != ''){
                                $faqArr[$n]['title'] = $title;
                                $faqArr[$n]['desc'] = $_POST['desc'][$k];
                                $n++;
                            }
                        }
                    }
                    if(!empty($faqArr)){
                        $post['faqs'] = json_encode($faqArr);
                    }
                    // echo '<pre>';print_r($itiArr); exit;
                    $post['c_tab'] = 4;
                }
            }
            if($request->input('submit') == 'tab5'){
                $validation = $this->validate($request,[
                    'mrp'=>'required',
                    'sp'=>'required',
                    'day'=>'required|integer|min:1',
                    'night'=>'required|integer|min:1',
                    'max_people'=>'required|integer|min:1',
                ]);
                if($validation){
                    $tabname = 'Others';
                    $post['add_by'] = session('user_id');
                    $post['mrp'] = $_POST['mrp'];
                    $post['sp'] = $_POST['sp'];
                    $post['day'] = $_POST['day'];
                    $post['night'] = $_POST['night'];
                    $post['max_people'] = $_POST['max_people'];
                    $post['c_tab'] = 5;
                }
            }
            if($request->input('submit') == 'tab6'){
                $validation = $this->validate($request,[
                    'status'=>'required',
                ]);
                if($validation){
                    $tabname = 'Publish';
                    $post['add_by'] = session('user_id');
                    $post['is_front'] = $_POST['is_front'];
                    $post['is_featured'] = $_POST['is_featured'];
                    $post['status'] = $_POST['status'];
                    $post['c_tab'] = 6;
                }
            }
            if(isset($post) && !empty($post)){
                if(!$id){
                    $post['added_at'] = date('Y-m-d H:i:s');
                    $inserted = $this->commonmodel->hybrid('C','tbl_package', $post);
                }else{
                    $post['update_at'] = date('Y-m-d H:i:s');
                    $updated = $this->commonmodel->hybrid('U','tbl_package', $post, ['p_id'=>$id]);
                }
                    
                if(isset($inserted)){
                    $id = $inserted;
                    $message = ['msg'=>$tabname.' added successfuly', 'type'=>'success'];
                }else if(isset($updated)){
                    $message = ['msg'=>$tabname.' updated successfuly', 'type'=>'success'];
                }
                $config['id'] = $id;
                $config['tab'] = $post['c_tab'];
                $config = base64_encode(json_encode($config));
                return redirect()->to(ADMIN.'-package/'.$config)->with('message', $message);
            }
        }
        if($id){
            $this->data['solo'] = $this->commonmodel->hybrid('R1','tbl_package','', ['p_id'=>$id]);
        }
        $this->data['destinations'] = $this->commonmodel->hybrid('RA','tbl_locations','',['status'=>'Y'],['id','DESC']);
        return view('admin.package.add_edit_package', $this->data);
    }
    /*******************************HOTEL************************** */
    public function hotels(Request $request){
        $this->data['listing'] = $this->commonmodel->hybrid('RA','tbl_hotel','','',['h_id','DESC']);
        return view('admin.hotel.hotel_index', $this->data);
	}
    public function add_edit_hotel(Request $request, $config=null){
        $config = json_decode(base64_decode($config),true);
        $id = (isset($config['id']))?$config['id']:null;
        // echo ($id); 
        if($request->isMethod('POST')){
            $post = array();
            $tabname = '';
            $message = ['msg'=>'Something went wrong!','type'=>'danger'];
            if($request->input('submit') == 'basic'){
                $validation = $this->validate($request,[
                    'hotel_title'=>'required',
                    'url'=>'required',
                    'address'=>'required',
                    'price_text'=>'required',
                    'description'=>'required',
                ]);
                if($validation){
                    $tabname = 'Basic';
                    $post['add_by'] = session('user_id');
                    if($request->hasFile('image')){
                        if($request->file('image')->isValid()) {
                            $fileContent = $request->file('image');
                            $newfilename = $this->uploadImage($fileContent, $_POST['old_image']);
                            if($newfilename){
                                $post['image'] = $newfilename;
                            }
                        }
                    }
                    if($request->hasFile('image2')){
                        if($request->file('image2')->isValid()) {
                            $fileContent = $request->file('image2');
                            $newfilename = $this->uploadImage($fileContent, $_POST['old_image2']);
                            if($newfilename){
                                $post['image2'] = $newfilename;
                            }
                        }
                    }
                    if($request->hasFile('image3')){
                        if($request->file('image3')->isValid()) {
                            $fileContent = $request->file('image3');
                            $newfilename = $this->uploadImage($fileContent, $_POST['old_image3']);
                            if($newfilename){
                                $post['image3'] = $newfilename;
                            }
                        }
                    }
                    if($request->hasFile('image4')){
                        if($request->file('image4')->isValid()) {
                            $fileContent = $request->file('image4');
                            $newfilename = $this->uploadImage($fileContent, $_POST['old_image4']);
                            if($newfilename){
                                $post['image4'] = $newfilename;
                            }
                        }
                    }
                    if($request->hasFile('image5')){
                        if($request->file('image5')->isValid()) {
                            $fileContent = $request->file('image5');
                            $newfilename = $this->uploadImage($fileContent, $_POST['old_image5']);
                            if($newfilename){
                                $post['image5'] = $newfilename;
                            }
                        }
                    }
                    $post['hotel_title'] = $_POST['hotel_title'];
                    $post['url'] = $_POST['url'];
                    // $post['destination'] = $_POST['destination'];
                    $post['ti_alt'] = $_POST['ti_alt'];
                    $post['ti_title'] = $_POST['ti_title'];
                    $post['address'] = $_POST['address'];
                    $post['price_text'] = $_POST['price_text'];
                    $post['description'] = $_POST['description'];
                    $post['meta_title'] = $_POST['meta_title'];
                    $post['meta_keyword'] = $_POST['meta_keyword'];
                    $post['meta_description'] = $_POST['meta_description'];
                    $post['c_tab'] = 1;
                }
            }
            if($request->input('submit') == 'tab2'){
                $validation = $this->validate($request,[
                    'pets'=>'required',
                    'children'=>'required',
                    'highlights.0'=>'required',
                    'facilities.0'=>'required',
                ]);
                if($validation){
                    $tabname = 'Features';
                    $post['add_by'] = session('user_id');
                    $post['pets'] = $_POST['pets'];
                    $post['children'] = $_POST['children'];
                    $post['highlights'] = json_encode($_POST['highlights']);
                    $post['facilities'] = json_encode($_POST['facilities']);
                    $post['map_url'] = $_POST['map_url'];
                    $post['c_tab'] = 2;
                }
            }
            if($request->input('submit') == 'tab3'){
                $validation = $this->validate($request,[
                    'f_title.0'=>'required',
                ]);
                if($validation){
                    $tabname = 'Other Features';
                    
                    $post['other_features'] = json_encode(array_filter($_POST['f_title']));
                    $post['other_text1'] = $_POST['other_text1'];
                    $post['other_text2'] = $_POST['other_text2'];

                    // echo '<pre>';print_r($itiArr); exit;
                    $post['c_tab'] = 3;
                }
            }
            /* if($request->input('submit') == 'tab4'){
                $validation = $this->validate($request,[
                    'faq_title.0'=>'required',
                    'desc.0'=>'required',
                ]);
                if($validation){
                    $tabname = 'Faq';
                    $faqArr = [];
                    if(sizeof($_POST['faq_title'])){
                        $n=0;
                        foreach($_POST['faq_title'] as $k=>$title){
                            if($title != '' && $_POST['desc'][$k] != ''){
                                $faqArr[$n]['title'] = $title;
                                $faqArr[$n]['desc'] = $_POST['desc'][$k];
                                $n++;
                            }
                        }
                    }
                    if(!empty($faqArr)){
                        $post['faqs'] = json_encode($faqArr);
                    }
                    // echo '<pre>';print_r($itiArr); exit;
                    $post['c_tab'] = 4;
                }
            } */
            if($request->input('submit') == 'tab5'){
                $validation = $this->validate($request,[
                    'mrp'=>'required',
                    'sp'=>'required',
                    'day'=>'required|integer|min:1',
                    'night'=>'required|integer|min:1',
                    'max_people'=>'required|integer|min:1',
                ]);
                if($validation){
                    $tabname = 'Others';
                    $post['add_by'] = session('user_id');
                    $post['mrp'] = $_POST['mrp'];
                    $post['sp'] = $_POST['sp'];
                    $post['day'] = $_POST['day'];
                    $post['night'] = $_POST['night'];
                    $post['max_people'] = $_POST['max_people'];
                    $post['c_tab'] = 5;
                }
            }
            if($request->input('submit') == 'tab6'){
                $validation = $this->validate($request,[
                    'status'=>'required',
                ]);
                if($validation){
                    $tabname = 'Publish';
                    $post['add_by'] = session('user_id');
                    // $post['is_front'] = $_POST['is_front'];
                    // $post['is_featured'] = $_POST['is_featured'];
                    $post['tag'] = $_POST['tag'];
                    $post['status'] = $_POST['status'];
                    $post['c_tab'] = 6;
                }
            }
            if(isset($post) && !empty($post)){
                if(!$id){
                    $post['added_at'] = date('Y-m-d H:i:s');
                    $inserted = $this->commonmodel->hybrid('C','tbl_hotel', $post);
                }else{
                    $post['update_at'] = date('Y-m-d H:i:s');
                    $updated = $this->commonmodel->hybrid('U','tbl_hotel', $post, ['h_id'=>$id]);
                }
                    
                if(isset($inserted)){
                    $id = $inserted;
                    $message = ['msg'=>$tabname.' added successfuly', 'type'=>'success'];
                }else if(isset($updated)){
                    $message = ['msg'=>$tabname.' updated successfuly', 'type'=>'success'];
                }
                $config['id'] = $id;
                $config['tab'] = $post['c_tab'];
                $config = base64_encode(json_encode($config));
                return redirect()->to(ADMIN.'-hotel/'.$config)->with('message', $message);
            }
        }
        if($id){
            $this->data['solo'] = $this->commonmodel->hybrid('R1','tbl_hotel','', ['h_id'=>$id]);
        }
        $this->data['heilight'] = $this->commonmodel->hybrid('RA','tbl_heilight','',['status'=>'Y']);
        $this->data['facilities'] = $this->commonmodel->hybrid('RA','tbl_facilities','',['status'=>'Y']);
        return view('admin.hotel.add_edit_hotel', $this->data);
    }

    /**************************************************************************** */
    public function deleteRecord($config){
        $config = json_decode(base64_decode($config));
        if(isset($config->table) && isset($config->field) && isset($config->val) && isset($config->url)){
            $deleted = $this->commonmodel->hybrid('D',$config->table,'', [$config->field => $config->val]);
            if($deleted){
                if((isset($config->old_image) && $config->old_image != '') && (file_exists(IMAGE_PATH.$config->old_image))){
                    unlink(IMAGE_PATH.$config->old_image);
                }
                $message = ['msg'=>'Record deleted successfully.', 'type'=>'success'];
            }else{
                $message = ['msg'=>'Something went wrong!','type'=>'danger'];
            }
            return redirect()->to(url($config->url))->with('message', $message);
        }else{
            return redirect()->to(ADMIN);
        }
    }
    public function uploadImage($fileContent, $old_image=null){
        $ext = $fileContent->extension();
        $filename = explode('.',$fileContent->getClientOriginalName())[0];
        $str = $this->getRandomString(6);
        $newfilename = $filename.$str.'.'.$ext;
        $path = Storage::putFileAs('image/', $fileContent, $newfilename);
        if($path){
            if($old_image != '' && file_exists(IMAGE_PATH.$old_image)){
                unlink(IMAGE_PATH.$old_image);
            }
            return $newfilename;
        }else{
            return 0;
        }
    }
    function getRandomString($n) {
        $characters = 'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = random_int(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
    public function remove_image($config){
        $config = json_decode(base64_decode($config));
        // print_r($config); exit;
        if(isset($config->table) && isset($config->u_field) && isset($config->val) && isset($config->url)){
            $deleted = $this->commonmodel->hybrid('U',$config->table,[$config->u_field => ''], [$config->w_field => $config->val]);
            if($deleted){
                $old_image = $config->old_image;
                if($old_image != '' && file_exists(IMAGE_PATH.$old_image)){
                    unlink(IMAGE_PATH.$old_image);
                }
                $message = ['msg'=>'Image Removed successfully.', 'type'=>'success'];
            }else{
                $message = ['msg'=>'Something went wrong!','type'=>'danger'];
            }
            return redirect()->to($config->url)->with('message', $message);
        }else{
            return redirect()->to(ADMIN);
        }
        
    }
}
