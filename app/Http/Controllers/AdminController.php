<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;
use Session;
use App\User;
use App\Medicine;
use App\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Image;
use DB;

class AdminController extends Controller
{
	/*login page function*/
	public function loginPage(){
		return view('admin.admin_login');
	}
    /*login  function*/
    public function login(Request $request){
    	if ($request->isMethod('post')) {
    		$data = $request->input();
    		if(Auth::attempt(['email'=>$data['email'], 'password' =>$data['password'],'status'=>'Active'])){
    			return redirect('admin/dashboard');
    		} else{
    			return redirect('/admin')->with('flash_message_error','Invalid Username Or Password or Inactive Users!!!!');
    		}
    	}
    	return view('admin.admin_login');
    }

    /*admin dashboard*/
    public function dashboard(){
        $user_name = Auth::user()->name;

        $all_medicines = DB::table('medicines')->where('status', 'Active')->get();
        $counted_medicine = count($all_medicines);

        $all_staffs = DB::table('users')->where('user_type_id',2)->where('status','Active')->get();
        $counted_staff = count($all_staffs);
    	return view('admin.dashboard')->with(compact('counted_medicine','user_name','counted_staff'));
    }

    /*admin dashboard*/
    public function settings(){
        return view('admin.settings');
    }

    /*user profile*/
    public function user_profile(){
        $id = Auth::user()->id;
        $user_details = User::where(['id'=>$id])->first();
        return view('admin.profile')->with(compact('user_details'));
    }

    /*update user profile*/
    public function updateProfile(Request $request){
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'current_password' => 'required',
                'new_password' => 'required|alpha_dash|min:6'
            ]);
            $data = $request->all();
            
            $user_details = User::where(['id'=>Auth::user()->id])->first();
            $id = $user_details->id;
            $user_name = $data['name'];
            $user_email = $data['email'];
            $user_address = $data['address'];
            $user_phone = $data['phone'];

            if($request->hasFile('image')){
                //check image path
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename  = rand(111,99999).'.'.$extension;
                    
                    $large_image_path = 'images/backend_images/users/large/'.$filename;
                    $small_image_path = 'images/backend_images/users/small/'.$filename;

                    // Resize images
                    Image::make($image_tmp)->save($large_image_path);  
                    Image::make($image_tmp)->resize(128,128)->save($small_image_path);
                }        
            } else if(!empty($data['current_image'])){
                    $filename = $data['current_image'];
            } else {
                    $filename = '';
            }

            $current_password = $data['current_password'];
            $new_password = $data['new_password'];
            if(Hash::check($current_password,$user_details->password)){
                $password = bcrypt($data['new_password']);
                User::where('id',$id)->update(['name'=>$user_name,'email'=>$user_email,'address'=>$user_address,'phone'=>$user_phone,'image'=>$filename,'password'=>$password]);
                return redirect()->back()->with('flash_message_success','Profile updated successfully');
            }else{
                return redirect('admin/user_profile')->with('flash_message_error','Invalid current password');
            }
        }
    }


    /*logout function*/
    public function logout(){
    	Session::flush();
    	return redirect('/admin')->with('flash_message_success','Logged out successfully !!!!');
    }
}
