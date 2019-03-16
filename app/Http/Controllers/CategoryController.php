<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    /*add category*/
    public function add_category(Request $request){
    	if($request->isMethod('post')){
    		 $validatedData = $request->validate([
		        'category_title' => 'required|unique:categories|max:255',
		        'category_description' => 'required',
		    ]);
    		$data = $request->all();
            // check category enable or disable
            if(empty($data['status'])){
                $status = 'Inactive';
            }else{
                $status = 'Active';
            }
    		$category = new Category;
    		$category->category_title = $data['category_title'];
    		$category->category_description = $data['category_description'];
            $category->status = $status;
    		$category->save();
    		return redirect()->back()->with('flash_message_success','Category added successfully');
    	}
    	return view('admin.category.add_category');
    }

    /*view categories*/
    public function view_categories(){
    	return view('admin.category.view_categories');
    }

    /*get categories data for datatable*/
    public function get_categories_data(){
    	$categories = Category::get();
    	return Datatables::of($categories)
    			->addColumn('action', function($category){
    				return '<a href="'.url('admin/edit_category',$category->id).'" class="btn btn-success waves-effect waves-light">Edit</a> <a href="javascript:" rel="'.$category->id.'" rel1="delete_category" class="btn btn-danger waves-effect waves-light deleteRecord">Delete</a>';
    			})	
    			->make(true);
    }

    /*get category data for edit*/
    public function edit_category(Request $request, $id = null){
    	if($request->isMethod('post')){
    		$validatedData = $request->validate([
                'category_title' => 'required|unique:categories,category_title,'. $id.',id',
		        'category_description' => 'required',
		    ]);
    		$data = $request->all();
            // check category enable or disable
            if(empty($data['status'])){
                $status = 'Inactive';
            }else{
                $status = 'Active';
            }

    		Category::where(['id'=>$id])->update(['category_title'=>$data['category_title'],'category_description'=>$data['category_description'],'status'=>$status]);
    		return redirect('/admin/view_categories')->with('flash_message_success','Category updated successfully');
    	}
    	$category_details = Category::where(['id'=>$id])->first();
        if ($category_details === null) {
            return view('admin.404');
        }
    	return view('admin.category.edit_category')->with(compact('category_details'));
    }

    /*delete category */
    public function delete_category($id = null){
    	if(!empty($id)){
    		Category::where(['id'=>$id])->update(['status'=>'Inactive']);
    		return redirect()->back()->with('flash_message_success','Category deleted successfully');
    	}
    }
}
