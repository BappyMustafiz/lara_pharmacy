<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;
use Session;
use App\User;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Image;

class StaffController extends Controller
{
    /*add staff*/
    public function add_user(Request $request){
        if(!Gate::allows('isAdmin')){
            abort(403, 'Unauthorized action.');
        }
    	if($request->isMethod('post')){
    		$validatedData = $request->validate([
		        'name' => 'required',
		        'email' => 'required|unique:users',
		        'password' => 'required',
		        'user_type_id' => 'required|integer',
		    ]);
    		$data = $request->all();
    		
            // check category enable or disable
            if(empty($data['status'])){
                $status = 'Inactive';
            }else{
                $status = 'Active';
            }
            // password hashing
            $input_password = $data['password'];
            $hashed_password = Hash::make($input_password);

            $users = new User;
    		$users->name = $data['name'];
    		$users->email = $data['email'];
    		$users->password = $hashed_password;
    		$users->user_type_id = $data['user_type_id'];
    		$users->address = $data['address'];
    		$users->phone = $data['phone'];


    		//upload image    
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

                    // store image name in product tables 
                    $users->image = $filename;


                }

            }


            $users->status = $status;
    		$users->save();
    		return redirect()->back()->with('flash_message_success','User added successfully');

    	}
    	return view('admin.users.add_user');
    }

    /*view users*/
    public function view_users(){
        if(!Gate::allows('isAdmin')){
            abort(403, 'Unauthorized action.');
        }
    	$all_users = User::get();
    	return view('admin.users.view_users')->with(compact('all_users'));
    }

    /*edit user*/
    public function edit_user(Request $request, $id = null){
        if(!Gate::allows('isAdmin')){
            abort(403, 'Unauthorized action.');
        }

    	if($request->isMethod('post')){
    		$validatedData = $request->validate([
		        'name' => 'required',
		        'email' => 'required|email|unique:users,email,'. $id.',id',
		        'user_type_id' => 'required|integer',
		    ]);

    		$data = $request->all();
            // check product enable or disable
            if(empty($data['status'])){
                $status = 'Inactive';
            }else{
                $status = 'Active';
            }
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

            User::where(['id'=>$id])->update(['name'=>$data['name'],'email'=>$data['email'],'user_type_id'=>$data['user_type_id'],'address'=>$data['address'],'phone'=>$data['phone'],'image'=>$filename,'status'=>$status]);

            return redirect()->back()->with('flash_message_success','User updated successfully');
    	}

    	$user_details = User::where(['id'=>$id])->first();
        if ($user_details === null) {
            return view('admin.404');
        }
    	return view('admin.users.edit_user')->with(compact('user_details'));
    }

    // delete user image function
    public function delete_user_image($id = null){
        // get product image name
        $userImage = User::where(['id'=>$id])->first();

        // get image path by image name
        $large_image_path = 'images/backend_images/users/large/';
        $small_image_path = 'images/backend_images/users/small/';

        //delete large image if not exists in folder
        if(file_exists($large_image_path.$userImage->image)){
            unlink($large_image_path.$userImage->image);
        }

        //delete small image if not exists in folder
        if(file_exists($small_image_path.$userImage->image)){
            unlink($small_image_path.$userImage->image);
        }

        //Delete image from product table
        User::where(['id'=>$id])->update(['image'=>'']);

        return redirect()->back()->with('flash_message_success','User image has been deleted');
    }

    /*delete user */
    public function delete_user($id = null){
        if(!Gate::allows('isAdmin')){
            abort(403, 'Unauthorized action.');
        }
        if(!empty($id)){
            User::where(['id'=>$id])->update(['status'=>'Inactive']);
            return redirect()->back()->with('flash_message_success','Medicine deleted successfully');
        }
    }


}

