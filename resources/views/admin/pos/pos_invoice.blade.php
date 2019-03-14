@extends('layouts.adminLayout.admin_design')
@section('content')
    <?php
        if (!empty($invoice_data)){
            $medicine_details = unserialize($invoice_data[0]->medicine_details);
            $payment_details = unserialize($invoice_data[0]->payment_details);
            $customer_details = unserialize($invoice_data[0]->customer_details);
            $discount = $invoice_data[0]->discount;
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
                        <li class="breadcrumb-item"><a href="{{url('/admin/pos')}}">POS</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{url('/admin/invoice')}}">Invoice</a>
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
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="printDiv">
                                            <table border="0" class="table-responsive">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <table border="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" style="border-bottom:2px #333 solid;">
                                                                            <span>
                                                                                <img src="{{asset('/images/backend_images/invoice_logo2.png')}}" class="" alt="">
                                                                            </span>
                                                                            <br>
                                                                            House-34 (2nd floor), Road-11,<br> D.I.T Project,Merul Badda, Dhaka-1212,BD.
                                                                            <br>+8801714 062916, +8801714 062917
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        @if(!empty($customer_details))
                                                                            <td align="center"><b>{{ $customer_details['customer_name'] }}</b><br>
                                                                                {{ $customer_details['address'] }}
                                                                                <br>
                                                                                {{ $customer_details['phone'] }}
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        @if(!empty($invoice_data))
                                                                        <td align="center">
                                                                            <nobr>
                                                                                <date>Date:{{ date('d M Y', strtotime($invoice_data[0]->created_at))}}<time></time></date>
                                                                            </nobr>
                                                                        </td>
                                                                        @endif
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>#</td>
                                                                        <td>Qty</td>
                                                                        <td>Medicine</td>
                                                                        <td align="right">Price</td>
                                                                        <td align="right">Total</td>
                                                                    </tr>
                                                                    <?php
                                                                        $i = 1;
                                                                        $sub_total = 0;
                                                                    ?>
                                                                    @if(!empty($medicine_details))
                                                                        @foreach($medicine_details as $medicine)
                                                                            <tr>
                                                                                <td align="left"><nobr>{{ $i++ }}</nobr></td>
                                                                                <td align="left"><nobr>{{ $medicine['medicine_qty'] }}</nobr></td>
                                                                                <td align="left"><nobr>{{ $medicine['medicine_name'] }}</nobr><nobr></nobr></td>
                                                                                <td align="right"><nobr>$ {{ $medicine['medicine_price'] }}</nobr></td>
                                                                                <?php
                                                                                    $total = $medicine['medicine_qty'] * $medicine['medicine_price'];
                                                                                    $sub_total += $total;
                                                                                ?>
                                                                                <td align="right"><nobr>$ {{ $total  }}</nobr></td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                    <tr>
                                                                        <td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left"><nobr></nobr></td>
                                                                        <td align="left" colspan="3"><nobr>Sub Total</nobr></td>
                                                                        <td align="right"><nobr>$ {{ $sub_total }}</nobr></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
                                                                    </tr>
                                                                    @if(!empty($discount))
                                                                    <tr>
                                                                        <td align="left"><nobr></nobr></td>
                                                                        <td align="left" colspan="3"><nobr>Total Discount</nobr></td>
                                                                        <td align="right"><nobr>$ {{ $discount }}</nobr></td>
                                                                    </tr>
                                                                    @endif
                                                                    <tr>
                                                                        <td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left"><nobr></nobr></td>
                                                                        <td align="left" colspan="3"><nobr><strong>Grand Total</strong></nobr></td>
                                                                        <td align="right"><nobr><strong>$ {{ $sub_total - $discount }}</strong></nobr></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
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
                                                                        <td align="left"><nobr></nobr></td>
                                                                        <td align="left" colspan="3"><nobr>Paid</nobr></td>
                                                                        <td align="right"><nobr>$ {{ $paid_amount }}</nobr></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left"><nobr></nobr></td>
                                                                        <td align="left" colspan="3">
                                                                            <nobr>Due</nobr>
                                                                        </td>
                                                                        <td align="right">
                                                                            <nobr>$ {{ $grand_total - $paid_amount }}</nobr>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        @if(isset($invoice_data))
                                                                            <td>Receipt  No: # {{ $invoice_data[0]->id }}</td>
                                                                        @else
                                                                            <td> </td>
                                                                        @endif
                                                                        @if(!empty($user_details))
                                                                            <td>User: {{$user_details->name}}</td>
                                                                        @endif
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Powered  By: Saros IT, info@sarosit.com
                                                        </td>
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