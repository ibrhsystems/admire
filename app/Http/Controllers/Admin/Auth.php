<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Common_model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
class Auth extends Controller
{
    public function __construct(){
        $this->data['title'] = 'Login';
        $this->commonmodel = new Common_model;
    }
    public function login(Request $request){
        if($request->isMethod('POST')){
            $validated = $this->validate($request, [
                'email' => 'required|email|exists:tbl_admin,email',
                'password' => 'required|min:5|max:12',
            ],
            [
                'email.required' => 'Email is required',
                'email.exists' => 'This email is not registered on your service',
                'password.required' => 'Password is required',
                'password.min' => 'Password must have atleast 5 characters in length',
                'password.max' => 'Password must not have more than 12 characters in length',
            ]);
            if($validated){
                $email = $request->input('email');
                $password = $request->input('password');
                $admin_info = $this->commonmodel->isvalidate($email);
                $check_password = Hash::check($password, $admin_info->password);
                if(!$check_password){
                    $request->session()->flash('err', 'Incorrect Password!');
                    return redirect()->to('/'.ADMIN)->withinput();
                }else{
                    $sessionData = array(
                        'user_id' => $admin_info->user_id,
                        'name' => $admin_info->name,
                        'email' => $admin_info->email,
                        'phone' => $admin_info->phone,
                        'address' => $admin_info->address,
                        'image' => $admin_info->image,
                        'privilege_id' => $admin_info->privilege_id,
                        'status' => $admin_info->status,
                        'admindata' => true,
                    );
                    $request->session()->put($sessionData);
                    return redirect()->to('/'.ADMIN.'-dashboard');
                }
            }
        }
            
        return view('auth.login', $this->data);
    }
    public function edit_profile(Request $request){
        $data = array();
        if ($request->isMethod('POST')){
            if($request->input('submit') == 'profile'){
                // print_r($_POST); exit;
                $validation = $this->validate($request, [
                    'name' =>'required',
                    'email' =>'required|email',
                    ],[
                        'name.required'=>'The full name is required',
                        'email.email'=>'Enter a valid email address',
                    
                ]);
                if($validation){
                    if($request->hasFile('image')){
                        if ($request->file('image')->isValid()) {
                            $filename = $request->file('image')->getClientOriginalName();
                            $ext = $request->file('image')->extension();
                            $newfilename = 'user_'.base64_encode(time()).'.'.$ext;
                            $path = Storage::putFileAs('/image/users/', $request->file('image'), $newfilename);
                            if($path){
                                $data['image'] = $newfilename;
                            }
                        }
                    }
                    $data['name'] = $request->input('name');
                    $data['email'] = $request->input('email');
                    $data['phone'] = $request->input('phone');
                    $data['address'] = $request->input('address');
                    $data['updated'] = date('Y-m-d H:i:s');
                    $alert_msg = 'User Update Successfully';
                }
            }
            if($request->input('submit') == 'change_password'){
                $validation = $this->validate($request, [
                    'oldpwd' =>'required',
                    'pwd' =>'required|min:5|max:12',
                    'cpwd' =>'required|min:5|same:pwd',
                    ],[
                        'oldpwd.required'=>'The old password is required',
                        'pwd.required'=>'The password is required',
                        'pwd.min' => 'Password must have atleast 5 characters in length',
                        'pwd.max' => 'Password must not have more than 12 characters in length',
                        'cpwd.required'=>'The confirm password is required',
                        'cpwd.min' => 'confirm password must have atleast 5 characters in length',
                        'cpwd.same' => 'confirm password must match password',
                    
                ]);
                if($validation){
                    $oldpwd = $request->input('oldpwd');
                    $password = $request->input('cpwd');
                    $admin_info = $this->commonmodel->isvalidate(session('email'));
                    $check_password = Hash::check($oldpwd, $admin_info->password);
                    if(!$check_password){
                        $request->session()->flash('message', ['msg'=>'Incorrect Current Password!','type'=>'danger']);
                        return redirect()->to(ADMIN.'-profile')->withinput();
                    }else{
                        // print_r($_POST); exit;
                        $data['password'] = Hash::make($password,['rounds'=>12,]);
                        $alert_msg = 'Password Changed Successfully';
                    }
                }
            }
            if(!empty($data)){
                $updated = $this->commonmodel->updateRecord('tbl_admin',$data, ['user_id'=>session('user_id')]);
                if($updated){
                    $user_info =  $this->commonmodel->getOneRecord('tbl_admin', ['user_id'=>session('user_id')]);
                    $sess_item = ['user_id','name','email','phone','address','image','privilege_id','status','admindata'];
                    session()->forget($sess_item);
                    $sessionData = array(
                        'user_id' => $user_info->user_id,
                        'name' => $user_info->name,
                        'email' => $user_info->email,
                        'phone' => $user_info->phone,
                        'address' => $user_info->address,
                        'image' => $user_info->image,
                        'privilege_id' => $user_info->privilege_id,
                        'status' => $user_info->status,
                        'admindata' => true,
                    );
                    //print_r($mysession);exit;
                    $request->session()->put($sessionData);

                    $request->session()->flash('message',['msg'=>$alert_msg,'type'=>'success']);
                }else{
                    $request->session()->flash('message',['msg'=>'Please Try After Sometimes...','type'=>'danger']);
                }
            }
            return redirect()->to(ADMIN.'-profile');
        }
        $this->data['profile'] = $this->commonmodel->getOneRecord('tbl_admin', ['user_id'=>session('user_id')]);
        // print_r($this->data['profile']); exit;
        return view('auth.edit_profile', $this->data);
        
    }
    public function logout(Request $request){
        if($request->session()->has('admindata')){
            $request->session()->flush();
            return redirect()->to(ADMIN.'?access=out')->with('err', 'You are logged out');
        }
    }
}
