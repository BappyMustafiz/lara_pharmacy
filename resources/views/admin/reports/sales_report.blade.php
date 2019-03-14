@extends('layouts.adminLayout.admin_design')
@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <div class="page-header-title">
                <h4>Reports</h4>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('/admin/dashboard')}}">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/sales-report')}}">Sales report</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title">Sales Report</h5>
                        </div>
                        <div class="card-block">
                            <div class="well well-lg">
                                <div class="row">
                                    <div class="col-sm-12 col-xl-4 m-b-30">
                                        <div id="reportrange" class="f-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                            <i class="glyphicon glyphicon-calendar icofont icofont-ui-calendar"></i>
                                            <span></span> <b class="caret"></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="dt-responsive table-responsive">
                                        <table id="reportsTable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Entry Date</th>
                                                <th>Expense category</th>
                                                <th>Expense</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Entry Date</th>
                                                <th>Expense category</th>
                                                <th>Expense</th>
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
            </div>
        </div>
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
        $('#reportsTable').dataTable();
    });
</script>
@endsection
