<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\ExpenseCategory;
use App\Expense;
use yajra\Datatables\Datatables;
use DB;

class ExpenseController extends Controller
{
    /*add expense*/
    public function add_expense(Request $request){
    	if($request->isMethod('post')){
    		$validatedData = $request->validate([
		        'entry_date' => 'required',
		        'expense_category_id' => 'required|integer',
		        'expense' => 'required'
		    ]);
    		$data = $request->all();
            // check category enable or disable
            if(empty($data['status'])){
                $status = 'Inactive';
            }else{
                $status = 'Active';
            }
            $expense = new Expense;
    		$expense->entry_date = $data['entry_date'];
    		$expense->expense_category_id = $data['expense_category_id'];
    		$expense->expense = $data['expense'];
            $expense->status = $status;
    		$expense->save();
    		return redirect()->back()->with('flash_message_success','Expense added successfully');
    	}
    	$categories = DB::table('expense_categories')->where('status', 'Active')->get();
    	return view('admin.expense.add_expense')->with(compact('categories'));
    }

    /*view expenses*/
    public function view_expenses(){
        return view('admin.expense.view_expenses');
    }

    /*get expenses and expense category data for datatable*/
    public function get_expenses_data(){
        $expenses = DB::table('expenses')
                    ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
                    ->select('expenses.*', 'expense_categories.expense_category_title')
                    ->get();
        return Datatables::of($expenses)
                ->addColumn('action', function($expense){
                    return '<a href="'.url('admin/edit_expense',$expense->id).'" class="btn btn-success waves-effect waves-light">Edit</a> <a href="javascript:" rel="'.$expense->id.'" rel1="delete_expense" class="btn btn-danger waves-effect waves-light deleteRecord">Delete</a>';
                })  
                ->make(true);
    }

    /*get medicine data for edit*/
    public function edit_expense(Request $request, $id = null){
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'entry_date' => 'required',
		        'expense_category_id' => 'required|integer',
		        'expense' => 'required'
            ]);
            $data = $request->all();
            // check category enable or disable
            if(empty($data['status'])){
                $status = 'Inactive';
            }else{
                $status = 'Active';
            }

            Expense::where(['id'=>$id])->update(['entry_date'=>$data['entry_date'],'expense_category_id'=>$data['expense_category_id'],'expense'=>$data['expense'],'status'=>$status]);
            return redirect('/admin/view_expenses')->with('flash_message_success','Expense updated successfully');
        }
        $categories = DB::table('expense_categories')->where('status', 'Active')->get();
        $expense_details = Expense::where(['id'=>$id])->first();
        if ($expense_details === null) {
            return view('admin.404');
        }
        return view('admin.expense.edit_expense')->with(compact('categories','expense_details'));
    }

    /*delete expense */
    public function delete_expense($id = null){
        if(!empty($id)){
            Expense::where(['id'=>$id])->update(['status'=>'Inactive']);
            return redirect()->back()->with('flash_message_success','Expense deleted successfully');
        }
    }
}
