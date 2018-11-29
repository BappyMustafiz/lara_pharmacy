<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Medicine;
use DB;
use Cart;
use Session;
use App\Category;

class PosController extends Controller
{	
	/*pos functionality*/
    public function pos(Request $request){
        if (isset($_POST['medicine_title'])){
            $item_id = $_POST['medicine_title'];
            $item_id = (int) $item_id;
        }
        if (isset($item_id)){
            // database query
            $data = Medicine::where(['id'=>$item_id])->first();
            $arr = array(
                'id' => $data->id,
                'name' => $data->medicine_title,
                'price' => $data->selling_price,
                'quantity' => 1,
                'attributes' => array()
            );

            Cart::add($arr);
        }

        $items = Cart::getContent();
        $item_total = Cart::getTotal();
        $save_customers = Customer::get()->where('status','Active');
    	return view('admin.pos.view_pos')->with(compact('save_customers','items', 'item_total'));
    }

    public function update_cart(Request $request){
        $data = $request->all();

        if ($request->get('qty')){
            $qty = $request->get('qty');
            $id = $request->get('id');
            Cart::update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $qty
                ),
            ));
            $summedPrice = Cart::get($id)->getPriceSum();
            echo json_encode($summedPrice);
        }
    }

    public function delete_cart(Request $request){
        $data = $request->all();
        if($request->get('id')){
            $id = $request->get('id');
            Cart::remove($id);
            echo true;
        }
    }

    /*invoice functionality*/
    public function invoice(){
    	return view('admin.pos.view_invoice');
    }


    /*invoice list */
    public function invoice_list(){
    	return view('admin.pos.invoice_list');
    }

    /*autocomplete data*/
    public function get_autocomplete_data(Request $request){
        if($request->get('query')){
            $query = $request->get('query');
            
            $data = DB::table('medicines')
                    ->where('medicine_title', 'LIKE', '%'.$query.'%')
                    ->limit(10)
                    ->get();
            $arr = array();
            foreach ($data as $val){
                $arr[] = array(
                    'value' => $val->id,
                    'label' => $val->medicine_title,
                );
            }

            echo json_encode($arr);
        }
    }

    /*medicine quick add by modal*/
    public function medicine_quick_add(Request $request){
        if($request->isMethod('post')){
            $this->validate($request , [
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
            return $medicine;
        }

        $categories = DB::table('categories')->where('status', 'Active')->get();
        return view('admin.pos.quick_add_medicine')->with(compact('categories'));
    }
}
