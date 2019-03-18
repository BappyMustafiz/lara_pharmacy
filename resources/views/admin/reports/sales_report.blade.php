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
                                <form action="" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12 col-xl-4">
                                            <input id="reportrange" class="f-right" name="datepicker" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%" autocomplete="off"></input>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary m-b-0">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="dt-plugin-buttons">
                                <a href="{{ url('/admin/export-sales-report') }}" class="btn btn-primary m-r-10 m-b-20" style="color: #ffffff;"><i class="icofont icofont-spreadsheet"></i> Export Sales Report</a>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="dt-responsive table-responsive">
                                        <table id="reportsTable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Invoice #</th>
                                                <th>Customer Name</th>
                                                <th>Sales Date</th>
                                                <th>Sub Total</th>
                                                <th>Discount</th>
                                                <th>Grand Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i = 1;
                                            ?>
                                            @if(!empty($sales_report))
                                                @foreach($sales_report as $report)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td><a href="{{url('/admin/view-invoice/'.$report->id)}}">{{ $report->id }}</a></td>
                                                    <?php
                                                        $customer_details = unserialize($report->customer_details);
                                                    ?>
                                                    <td>
                                                        @if(!empty($customer_details))
                                                            {{ $customer_details['customer_name'] }}
                                                        @endif
                                                    </td>
                                                    <td>{{ date('d M Y', strtotime($report->created_at))}}</td>
                                                    <td>{{ $report->total }}</td>
                                                    <td>{{ $report->discount }}</td>
                                                    <td>{{ $report->total - $report->discount }}</td>
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
