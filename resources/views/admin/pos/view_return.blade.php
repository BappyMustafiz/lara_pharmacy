@extends('layouts.adminLayout.admin_design')
@section('content')
    <?php
    if (!empty($invoice_data)){
        $medicine_details = unserialize($invoice_data[0]->item_details);
        $payment_details = unserialize($invoice_data[0]->return_type);
        $customer_details = unserialize($invoice_data[0]->customer_details);
        $discount = $invoice_data[0]->return_charge;
        $total = $invoice_data[0]->total;
    }

    ?>
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Invoice</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{url('/admin/dashboard')}}">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{url('/admin/returns')}}">Returns</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{url('/admin/return-list')}}">Returns List</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <!-- Container-fluid starts -->
                <div class="container">
                    <!-- Main content starts -->
                    <div>
                        <!-- Invoice card start -->
                        <div class="card">
                            <div id="printDiv">
                                <div class="row invoice-contact">
                                    <div class="col-md-8">
                                        <div class="invoice-box row">
                                            <div class="col-sm-12">
                                                <table class="table table-responsive invoice-table table-borderless">
                                                    <tbody>
                                                    <tr>
                                                        <td><img src="{{asset('/images/backend_images/invoice_logo2.png')}}" class="m-b-10" alt="100 x 41"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>SarosIT Limited.</td>
                                                    </tr>
                                                    <tr>
                                                        <td>House-34 (2nd floor), Road-11, D.I.T Project,Merul Badda, Dhaka-1212,BD.</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="mailto:hjnoyon@sarosit.com" target="_top">hjnoyon@sarosit.com</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>+8801714 062916, +8801714 062917 </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="row invoice-info">
                                        @if(!empty($customer_details))
                                            <div class="col-md-6 col-xs-12 invoice-client-info">
                                                <h4 class="text-primary">Customer Information :</h4>
                                                <h6 class="m-0">Name : {{ $customer_details['customer_name'] }}</h6>
                                                <p class="m-0 m-t-10">Address : {{ $customer_details['address'] }}</p>
                                                <p class="m-0">Phone : {{ $customer_details['phone'] }}</p>
                                                <p>Email : {{ $customer_details['email'] }}</p>
                                            </div>
                                        @endif
                                        <div class="col-md-6 col-sm-6">
                                            <h4 class="text-primary">Order Information :</h4>
                                            <table class="table table-responsive invoice-table invoice-order table-borderless">
                                                <tbody>
                                                <tr>
                                                    <th>Invoice Id :</th>
                                                    @if(isset($invoice_data))
                                                        <td>#{{ $invoice_data[0]->id }}</td>
                                                    @else
                                                        <td> </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th>Date :</th>
                                                    @if(isset($invoice_data))
                                                        <td>{{ date('d M Y', strtotime($invoice_data[0]->created_at))}}</td>
                                                    @else
                                                        <td> </td>
                                                    @endif
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-responsive invoice-detail-table">
                                                <thead>
                                                <tr class="thead-default">
                                                    <th width="10%">#</th>
                                                    <th width="30%">Medicine Name</th>
                                                    <th width="25%">Quantity</th>
                                                    <th width="25%">Price</th>
                                                    <th width="10%">Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $i = 1;
                                                $sub_total = 0;
                                                ?>
                                                @if(!empty($medicine_details))
                                                    @foreach($medicine_details as $medicine)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>
                                                                <h6>{{ $medicine['medicine_name'] }}</h6>
                                                            </td>
                                                            <td>{{ $medicine['medicine_qty'] }}</td>
                                                            <td>${{ $medicine['medicine_price'] }}</td>
                                                            <?php
                                                            $total = $medicine['medicine_qty'] * $medicine['medicine_price'];
                                                            $sub_total += $total;
                                                            ?>
                                                            <td>${{ $total  }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-responsive invoice-table invoice-total">
                                                <tbody>
                                                <tr>
                                                    <th>Sub Total :</th>
                                                    <td>${{ $sub_total }}</td>
                                                </tr>
                                                @if(!empty($discount))
                                                    <tr>
                                                        <th>Return Charge :</th>
                                                        <td>$ {{ $discount }}</td>
                                                    </tr>
                                                @endif
                                                <tr class="text-info">
                                                    <th>Grand Total : </th>
                                                    <td>$ {{ $sub_total - $discount }}</td>
                                                </tr>
                                                <?php
                                                $grand_total =  $sub_total - $discount;
                                                $paid_amount = 0;
                                                if(!empty($payment_details)){
                                                    foreach($payment_details as $key => $val){
                                                        $paid_amount += $val;
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <th>Paid Amount :</th>
                                                    <td>$ {{ $paid_amount }}</td>
                                                </tr>
                                                <tr class="text-info">
                                                    <th>Due Amount : </th>
                                                    <td>$ {{ $grand_total - $paid_amount }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" id="printInvoice" class="btn btn-primary btn-print-invoice waves-effect waves-light m-r-20" title="Print Invoice"><i class="ti-printer"></i> </button>
                                        <a href="{{ url('/admin/invoice_list') }}" type="button" class="btn btn-danger waves-effect waves-light">Back to Invoice</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Invoice card end -->
                    </div>
                </div>
                <!-- Container ends -->
            </div>
            <!-- Page body end -->
        </div>
    </div>
@endsection