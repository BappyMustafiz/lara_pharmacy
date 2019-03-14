<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Medicine;
use DB;
use Cart;
use Session;
use App\User;
use Auth;

class PosController extends Controller
{	
	/*pos functionality*/
    /**
     * add medicine to the cart
     * pass medicine cart data into view
     *
     * @param Request $request
     * @return $this
     */
    public function pos(Request $request){
        $cus = session('customer_data');
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
                'attributes' => array(
                    'self' => $data->self_number,
                    'available_quantity' => $data->quantity,
                )
            );
            Cart::add($arr);
        }
        //set customer auto complete data into session
        if ($request->input('customer_name')){
            $customer_id = $request->input('customer_name');
            $customer_id = (int) $customer_id;
        }

        if (isset($customer_id)){
            $customer_data = Customer::where(['id'=>$customer_id])->first();
            session(['customer_data'=> $customer_data]);
        }


        $items = Cart::getContent();
        $item_total = Cart::getTotal();
        $save_customers = Customer::get()->where('status','Active');
    	return view('admin.pos.view_pos')->with(compact('save_customers','items', 'item_total'));
    }
    /**
     * remove auto complete customer data
     */
    public function romove_autocomplete_customer(Request $request){
        if ($request->isMethod('post')){
            Session::forget('customer_data');
            echo true;
        }
    }

    /**
     * update cart data
     *
     * @param Request $request
     */
    public function update_cart(Request $request){
        $data = $request->all();

        if ($request->get('qty')){
            $qty = $request->get('qty');
            $id = $request->get('id');

            // get medicine quantity from medicine table
            $data = Medicine::select('quantity')->where('id',$id)->get();
            $stored_qty = $data[0]->quantity;

            if($qty > $stored_qty){
                $alert = 'This quantity is not available in stock';
            }else{
                $alert = null;
            }

            Cart::update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $qty
                ),
            ));
            $summedPrice = Cart::get($id)->getPriceSum();
            if ($alert){
                echo json_encode(['summedprice'=>$summedPrice, 'alert'=>$alert]);
            }else{
                echo json_encode(['summedprice'=>$summedPrice]);
            }


        }
    }

    /**
     * delete cart data
     *
     * @param Request $request
     */
    public function delete_cart(Request $request){
        $data = $request->all();
        if($request->get('id')){
            $id = $request->get('id');
            Cart::remove($id);
            echo true;
        }
    }


    /*invoice list */
    public function invoice_list(){
        $invoices = DB::table('orders')
                        ->where('status', 'Active')
                        ->select('id','customer_details','total','discount','created_at')
                        ->get();
    	return view('admin.pos.invoice_list')->with(compact('invoices'));
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

    /**
     * method for get customer auto complete data
     *
     * @param Request $request
     *
     */
    public function get_customer_autocomplete_data(Request $request){
        $query = $request->get('query');

        $data = DB::table('customers')
            ->where('customer_name', 'LIKE', '%'.$query.'%')
            ->limit(10)
            ->get();
        $arr = array();
        foreach ($data as $val){
            $arr[] = array(
                'value' => $val->id,
                'label' => $val->customer_name,
            );
        }

        echo json_encode($arr);
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

    /**
     * add payment type and value
     * ajax route
     */
    public function add_payment_type(Request $request){
        $net_amount = $request->input('net_amount');
        $payment_type = $request->input('payment_type');
        $paid_amount = $request->input('paid_amount');

        $payment_details[$payment_type] = $paid_amount;

        if(session('payment_details')){
            $payment = session('payment_details');
            if(array_key_exists($payment_type,$payment)){
                $previous_amount = $payment[$payment_type];
                $paid_amount += $previous_amount;
                $payment[$payment_type] = $paid_amount;
                session(['payment_details' => $payment]);
            }else{
                $payment[$payment_type] = $paid_amount;
                session(['payment_details' => $payment]);
            }
        }else{
           session(['payment_details' => $payment_details]);
           $payment = session('payment_details');
           return $payment;
        }
        return $payment;
    }

    /**
     * delete payment type
     * ajax route
     */
    public function delete_payment_type(Request $request){
        $payment_type = $request->input('payment_type');
        $paid_amount = $request->input('paid_amount');

        $payment = session('payment_details');
        unset($payment[$payment_type]);
        $new_payment = $payment;
        session(['payment_details' => $new_payment]);
        return $new_payment;
    }

    /**
     * order submit method
     */
    public function order_submit(Request $request){
        $items = Cart::getContent();
        $details = [];
        foreach ($items as $item){
            $medicine_id = $item->id;
            $medicine_name = $item->name;
            $medicine_qty = $item->quantity;
            $medicine_price = $item->price;


            //get medicine data for specific id

            $data = DB::table('medicines')
                               ->select('quantity')
                               ->where('id','=',$medicine_id)
                               ->get();

            $stocked_qty = $data[0]->quantity;

            $remained_qty = $stocked_qty - $medicine_qty;
            //update medicine quantity in medicine
            DB::table('medicines')
                ->where("medicines.id", '=',  $medicine_id)
                ->update(['medicines.quantity'=> $remained_qty]);


            $details[] = array(
                'medicine_id' => $medicine_id,
                'medicine_name' => $medicine_name,
                'medicine_qty' => $medicine_qty,
                'medicine_price' => $medicine_price,
            );
        }


        $medicine_details = serialize($details);

        $total = $request->input('total');
        $discount = $request->input('discount');
        $customer_id = $request->input('customer_id');

        $payments = session('payment_details');
        $payment_details = serialize($payments);

        $customer = session('customer_data');
        $customer_details = serialize($customer);

        $data_arr = array(
            'medicine_details' => $medicine_details,
            'total' => $total,
            'discount' => $discount,
            'payment_details' => $payment_details,
            'customer_details' => $customer_details
        );


        session(['order_details'=> $data_arr]);
        $insertId = DB::table('orders')->insertGetId($data_arr);
        if ($insertId){
            //get inserted data
            $order_data = DB::table('orders')
                                ->select('orders.id','orders.created_at')
                                ->where('orders.id','=',$insertId)
                                ->get();

            session(['order_data' => $order_data]);

            Session::forget('payment_details');
            Session::forget('customer_data');
            Cart::clear();
            return redirect('/admin/invoice');
        }

    }

    /**
     * method for view invoice page
     */
    public function invoice(){
        return view('admin.pos.invoice');
    }

    /**
     * method for view invoice
     *
     * @param $id
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view_invoice($id){
        $invoice_data = DB::table('orders')
                            ->where('id',$id)
                            ->get();
        if (sizeof($invoice_data) >0){
            return view('admin.pos.view_invoice')->with(compact('invoice_data'));
        }else{
            return view('admin.404');
        }
    }

    /**
     * method for pos invoice
     *
     * @param $id
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view_pos_invoice($id){
        $invoice_data = DB::table('orders')
                            ->where('id',$id)
                            ->get();

        //get user data
        $id = Auth::user()->id;
        $user_details = User::where(['id'=>$id])->first();

        if (sizeof($invoice_data) >0){
            return view('admin.pos.pos_invoice')->with(compact('invoice_data','user_details'));
        }else{
            return view('admin.404');
        }
    }

    /**
     * method for delete invoice
     *
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete_invoice($id = null){
        if(!empty($id)){
            DB::table('orders')
                ->where('id',$id)
                ->update(['status'=>'deleted']);
            return redirect()->back()->with('flash_message_success','Invoice deleted successfully');
        }
    }


    /**
     * method for cancel order
     *
     * @param Request $request
     */
    public function cancel_order(Request $request){
        if ($request->isMethod('post')){
            Cart::clear();
            Session::forget('payment_details');
            Session::forget('customer_data');
            echo true;
        }
    }
}
