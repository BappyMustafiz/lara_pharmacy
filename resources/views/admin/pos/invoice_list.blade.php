@extends('layouts.adminLayout.admin_design')
@section('content')
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
                        <li class="breadcrumb-item"><a href="{{url('/admin/invoice_list')}}">Invoice List</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Inputs Validation start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>View Invoice List</h5>
                            </div>
                            <div class="card-block">
                            	@if(Session::has('flash_message_error'))
					            <div class="alert alert-danger background-danger">
					                <button type="button" class="close" data-dismiss="alert">x</button>
					                <strong>{!! session('flash_message_error')!!}</strong>
					            </div>
					            @endif
					            @if(Session::has('flash_message_success'))
					                <div class="alert alert-success background-success">
					                    <button type="button" class="close" data-dismiss="alert">x</button>
					                    <strong>{!! session('flash_message_success')!!}</strong>
					                </div>
					            @endif
		                        <div class="dt-responsive table-responsive">
		                            <table id="invoiceTable" class="table table-striped table-bordered nowrap">
		                                <thead>
		                                    <tr>
		                                        <th>#</th>
                                                <th>Invoice Id</th>
                                                <th>Customer name</th>
		                                        <th>Date</th>
                                                <th>Total Amount</th>
		                                        <th>Action</th>
		                                    </tr>
		                                </thead>
                                        <tbody>
                                        <?php $i = 1;?>
                                        @if(!empty($invoices))
                                            @foreach($invoices as $invoice)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td><a href="{{url('/admin/view-invoice/'.$invoice->id)}}">{{ $invoice->id }}</a></td>
                                                <?php
                                                    $customer_details = unserialize($invoice->customer_details);
                                                ?>
                                                <td>{{ $customer_details['customer_name'] }}</td>
                                                <td>{{ date('d M Y', strtotime($invoice->created_at))}}</td>
                                                <td>{{ $invoice->total - $invoice->discount }}</td>
                                                <td>
                                                    <a href="{{url('/admin/view-invoice/'.$invoice->id)}}" title="Invoice" class="btn btn-info waves-effect waves-light"><i class="fa fa-window-restore"></i></a>
                                                    <a href="{{url('/admin/receipt-invoice/'.$invoice->id)}}" title="POS Invoice" class="btn btn-primary waves-effect waves-light"><i class="fa fa-fax"></i></a>
                                                    <a href="javascript:" rel="{{$invoice->id}}" rel1="delete_invoice" class="btn btn-danger waves-effect waves-light deleteRecord" title="Delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
		                            </table>
		                        </div>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>

<!-- data-table js -->
    <script src="{{asset('js/backend_js/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/backend_js/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('css/backend_css/data-table/js/jszip.min.js')}}"></script>
    <script src="{{asset('css/backend_css/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('css/backend_css/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('js/backend_js/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/backend_js/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('css/backend_css/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/backend_js/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('css/backend_css/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#invoiceTable').dataTable();
        });
        
    </script>
@endsection
