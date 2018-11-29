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
		                                        <th>Customer name</th>
                                                <th>Invoice #</th>
		                                        <th>Total</th>
                                                <th>Due</th>
		                                        <th>Action</th>
		                                    </tr>
		                                </thead>
		                                <tfoot>
		                                    <tr>
		                                        <th>#</th>
                                                <th>Customer name</th>
                                                <th>Invoice #</th>
                                                <th>Total</th>
                                                <th>Due</th>
                                                <th>Action</th>
		                                    </tr>
		                                </tfoot>
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
            // $('#categoryTable').DataTable({
            //     "processing":true,
            //     "serverSide":true,
            //     "ajax": "{{route('ajax.get_categories_data')}}",
            //     "columns":[
            //         {"data" : "id"},
            //         {"data" : "category_title"},
            //         {"data" : "category_description"},
            //         {"data" : "status"},
            //         {"data" : "action"},
            //     ]
            // });
        });
        
    </script>
@endsection
