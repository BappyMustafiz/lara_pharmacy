<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Customer;
use yajra\Datatables\Datatables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = new Customer();
        return view('admin.customer.input_form', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'customer_name' => 'required|max:255',
            'phone' => 'required|unique:customers',
        ]);

        $data = $request->all();
        // check category enable or disable
        if(empty($data['status'])){
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }
        $customer = new Customer;
        $customer->customer_name = $data['customer_name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->address = $data['address'];
        $customer->status = $status;
        $customer->save();
        return $customer;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.view_customer', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.input_form', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'customer_name' => 'required|max:255',
            'phone' => 'required|unique:customers,phone,'. $id.',id',
        ]);

        $data = $request->all();
        // check category enable or disable
        if(empty($data['status'])){
            $status = 'Inactive';
        }else{
            $status = 'Active';
        }

        Customer::where(['id'=>$id])->update(['customer_name'=>$data['customer_name'],'email'=>$data['email'],'phone'=>$data['phone'],'address'=>$data['address'],'status'=>$status]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!empty($id)){
            $result = Customer::where(['id'=>$id])->update(['status'=>'Inactive']);
            return redirect()->back()->with('flash_message_success','Customer inactivate successfully');
        }
    }


    /*method for datatable*/
    public function get_customers_data(){
        $customers = Customer::get();
        return Datatables::of($customers)
                ->addColumn('action', function($customers){
                    return view('admin.customer._action', [
                        'customers' => $customers,
                        'url_show'  => route('customer.show', $customers->id),
                        'url_edit'  => route('customer.edit', $customers->id),
                        'url_destroy'  => route('customer.destroy', $customers->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])  
                ->make(true);
    }
}
