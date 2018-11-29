<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\ExpenseCategory;
use yajra\Datatables\Datatables;

class ExpenseCategoryController extends Controller
{
    /*add category*/
    public function add_expense_category(Request $request){
    	if($request->isMethod('post')){
    		 $validatedData = $request->validate([
		        'expense_category_title' => 'required|unique:expense_categories|max:255',
		        'expense_category_description' => 'required',
		    ]);
    		$data = $request->all();
            // check category enable or disable
            if(empty($data['status'])){
                $status = 'Inactive';
            }else{
                $status = 'Active';
            }
    		$category = new ExpenseCategory;
    		$category->expense_category_title = $data['expense_category_title'];
    		$category->expense_category_description = $data['expense_category_description'];
            $category->status = $status;
    		$category->save();
    		return redirect()->back()->with('flash_message_success','Category added successfully');
    	}
    	return view('admin.expenseCategory.add_expense_category');
    }

    /*view categories*/
    public function view_expense_categories(){
    	return view('admin.expenseCategory.view_expense_categories');
    }

    /*get categories data for datatable*/
    public function get_expense_categories_data(){
    	$categories = ExpenseCategory::get();
    	return Datatables::of($categories)
    			->addColumn('action', function($category){
    				return '<a href="'.url('admin/edit_expense_category',$category->id).'" class="btn btn-success waves-effect waves-light">Edit</a> <a href="javascript:" rel="'.$category->id.'" rel1="delete_expense_category" class="btn btn-danger waves-effect waves-light deleteRecord">Delete</a>';
    			})	
    			->make(true);
    }

    /*get category data for edit*/
    public function edit_expense_category(Request $request, $id = null){
    	if($request->isMethod('post')){
    		$validatedData = $request->validate([
                'expense_category_title' => 'required|unique:expense_categories,expense_category_title,'. $id.',id',
		        'expense_category_description' => 'required',
		    ]);
    		$data = $request->all();
            // check category enable or disable
            if(empty($data['status'])){
                $status = 'Inactive';
            }else{
                $status = 'Active';
            }

    		ExpenseCategory::where(['id'=>$id])->update(['expense_category_title'=>$data['expense_category_title'],'expense_category_description'=>$data['expense_category_description'],'status'=>$status]);
    		return redirect('/admin/view_cats')->with('flash_message_success','Category updated successfully');
    	}
    	$category_details = ExpenseCategory::where(['id'=>$id])->first();
        if ($category_details === null) {
            abort(404);
        }
    	return view('admin.expenseCategory.edit_expense_category')->with(compact('category_details'));
    }

    /*delete category */
    public function delete_expense_category($id = null){
    	if(!empty($id)){
    		ExpenseCategory::where(['id'=>$id])->update(['status'=>'Inactive']);
    		return redirect()->back()->with('flash_message_success','Category deleted successfully');
    	}
    }
}
