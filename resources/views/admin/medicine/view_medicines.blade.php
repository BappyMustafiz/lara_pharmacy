@extends('layouts.adminLayout.admin_design')
@section('content')
<div class="main-body">
        <div class="page-wrapper">
            <!-- Page header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Medicine</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Medicine</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">View Medicine</a>
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
                                <h5>View Medicine</h5>
                                <a href="{{url('/admin/add_medicine')}}" class="btn btn-info page-header-breadcrumb"><i class="ti-plus"></i> Add Medicine</a>
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
		                            <table id="medicineTable" class="table table-striped table-bordered nowrap">
		                                <thead>
		                                    <tr>
		                                        <th>#</th>
		                                        <th>Medicine title</th>
                                                <th>Company name</th>
                                                <th>Purchase price</th>
                                                <th>Selling price</th>
		                                        <th>Quantity</th>
                                                <th>Stock alert</th>
                                                <th>Self Number</th>
		                                        <th>Expiry date</th>
                                                <th>Status</th>
		                                        <th>Action</th>
		                                    </tr>
		                                </thead>
		                                <tfoot>
		                                    <tr>
		                                        <th>#</th>
                                                <th>Medicine title</th>
                                                <th>Company name</th>
                                                <th>Purchase price</th>
                                                <th>Selling price</th>
                                                <th>Quantity</th>
                                                <th>Stock alert</th>
                                                <th>Self Number</th>
                                                <th>Expiry date</th>
                                                <th>Status</th>
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
            $('#medicineTable').DataTable({
                "processing":true,
                "serverSide":true,
                "ajax": "{{route('ajax.get_medicines_data')}}",
                "columns":[
                    {"data" : "id"},
                    {"data" : "medicine_title"},
                    {"data" : "company_name"},
                    {"data" : "purchase_price"},
                    {"data" : "selling_price"},
                    {"data" : "quantity"},
                    {"data" : "stock_alert"},
                    {"data" : "self_number"},
                    {"data" : "expiry_date"},
                    {"data" : "status"},
                    {"data" : "action"},
                ]
            });
        });
        
    </script>
@endsection
