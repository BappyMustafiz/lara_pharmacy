<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use App\Medicine;
use yajra\Datatables\Datatables;
use DB;

class MedicineController extends Controller
{
    /*add medicine*/
    public function add_medicine(Request $request){
    	if($request->isMethod('post')){
    		$validatedData = $request->validate([
		        'medicine_title' => 'required|unique:medicines',
		        'category_id' => 'required|integer',
		        'generic_name' => 'required',
		        'purchase_price' => 'required',
		        'selling_price' => 'required',
		        'quantity' => 'required|integer',
		        'expiry_date' => 'required',
		    ]);
    		$data = $request->all();
            // check category enable or disable
            if(empty($data['status'])){
                $status = 'Inactive';
            }else{
                $status = 'Active';
            }
            $medicine = new Medicine;
    		$medicine->medicine_title = $data['medicine_title'];
    		$medicine->category_id = $data['category_id'];
    		$medicine->generic_name = $data['generic_name'];
    		$medicine->company_name = $data['company_name'];
    		$medicine->purchase_price = $data['purchase_price'];
    		$medicine->selling_price = $data['selling_price'];
    		$medicine->stored_box = $data['stored_box'];
    		$medicine->quantity = $data['quantity'];
    		$medicine->effects = $data['effects'];
    		$medicine->expiry_date = $data['expiry_date'];
            $medicine->status = $status;
    		$medicine->save();
    		return redirect()->back()->with('flash_message_success','Medicine added successfully');
    	}
    	$categories = DB::table('categories')->where('status', 'Active')->get();
    	return view('admin.medicine.add_medicine')->with(compact('categories'));
    }

    /*view medicines*/
    public function view_medicines(){
        return view('admin.medicine.view_medicines');
    }

    /*get medicines and medicine category data for datatable*/
    public function get_medicines_data(){
        $medicines = DB::table('medicines')
                    ->join('categories', 'medicines.category_id', '=', 'categories.id')
                    ->select('medicines.*', 'categories.category_title')
                    ->get();
        return Datatables::of($medicines)
                ->addColumn('action', function($medicine){
                    return '<a href="'.url('admin/edit_medicine',$medicine->id).'" class="btn btn-success waves-effect waves-light">Edit</a> <a href="javascript:" rel="'.$medicine->id.'" rel1="delete_medicine" class="btn btn-danger waves-effect waves-light deleteRecord">Delete</a>';
                })  
                ->make(true);
    }

    /*get medicine data for edit*/
    public function edit_medicine(Request $request, $id = null){
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'medicine_title' => 'required|unique:medicines,medicine_title,'. $id.',id',
                'category_id' => 'required|integer',
                'generic_name' => 'required',
                'purchase_price' => 'required',
                'selling_price' => 'required',
                'quantity' => 'required|integer',
                'expiry_date' => 'required',
            ]);
            $data = $request->all();
            // check category enable or disable
            if(empty($data['status'])){
                $status = 'Inactive';
            }else{
                $status = 'Active';
            }

            Medicine::where(['id'=>$id])->update(['medicine_title'=>$data['medicine_title'],'category_id'=>$data['category_id'],'generic_name'=>$data['generic_name'],'company_name'=>$data['company_name'],'purchase_price'=>$data['purchase_price'],'selling_price'=>$data['selling_price'],'stored_box'=>$data['stored_box'],'quantity'=>$data['quantity'],'effects'=>$data['effects'],'expiry_date'=>$data['expiry_date'],'status'=>$status]);
            return redirect('/admin/view_medicines')->with('flash_message_success','Medicine updated successfully');
        }
        $categories = DB::table('categories')->where('status', 'Active')->get();
        $medicine_details = Medicine::where(['id'=>$id])->first();
        if ($medicine_details === null) {
            abort(404);
        }
        return view('admin.medicine.edit_medicine')->with(compact('categories','medicine_details'));
    }

    /*delete medicine */
    public function delete_medicine($id = null){
        if(!empty($id)){
            Medicine::where(['id'=>$id])->update(['status'=>'Inactive']);
            return redirect()->back()->with('flash_message_success','Medicine deleted successfully');
        }
    }
}
