@extends('layouts.adminLayout.admin_design')
@section('content')
	<div class="main-body">
	    <div class="page-wrapper">
	        <div class="page-header">
	            <div class="page-header-title">
	                <h4>Dashboard</h4>
	            </div>
	            <div class="page-header-breadcrumb">
	                <ul class="breadcrumb-title">
	                    <li class="breadcrumb-item">
	                        <a href="index.html">
	                            <i class="icofont icofont-home"></i>
	                        </a>
	                    </li>
	                    <li class="breadcrumb-item"><a href="#!">Pages</a>
	                    </li>
	                    <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	        <div class="page-body">
	            <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks dark-primary-border">
                            <div class="card-block">
                                <h5>Sales Today</h5>
                                <ul>
                                    <li>
                                        <i class="icofont icofont-cur-taka-plus"></i>
                                    </li>
                                    <li class="text-right">
                                        {{ $total_sales }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Documents card end -->
                    <!-- New clients card start -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks warning-border">
                            <div class="card-block">
                                <h5>Expenses Today</h5>
                                <ul>
                                    <li>
                                        <i class="icofont icofont-cur-taka-minus text-warning"></i>
                                    </li>
                                    <li class="text-right text-warning">
                                        {{ $total_expense }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- New clients card end -->
                    <!-- New files card start -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks success-border">
                            <div class="card-block">
                                <h5>Total Medicine</h5>
                                <ul>
                                    <li>
                                        <i class="icofont icofont icofont-first-aid-alt text-success"></i>
                                    </li>
                                    <li class="text-right text-success">
                                        {{$counted_medicine}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- New files card end -->
                    <!-- Open Project card start -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks">
                            <div class="card-block">
                                <h5>Total Staff</h5>
                                <ul>
                                    <li>
                                        <i class="icofont icofont icofont-nurse text-primary"></i>
                                    </li>
                                    <li class="text-right text-primary">
                                        {{$counted_staff}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
	            </div>
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks primary-border">
                            <div class="card-block">
                                <a href="{{ 'add_medicine' }}" class="summary-title">Add Medicine</a>
                                <ul>
                                    <li>
                                        <i class="icofont icofont-medical-sign text-primary"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks success-border">
                            <div class="card-block">
                                <a href="{{ 'customer' }}" class="summary-title">Add Customer</a>
                                <ul>
                                    <li>
                                        <i class="icofont icofont-hotel-boy text-success"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks warning-border">
                            <div class="card-block">
                                <a href="{{ 'sales-report' }}" class="summary-title">Sales Report</a>
                                <ul>
                                    <li>
                                        <i class="icofont icofont-money text-warning"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks dark-primary-border">
                            <div class="card-block">
                                <a href="{{ 'pos' }}" class="summary-title">Create Invoice</a>
                                <ul>
                                    <li>
                                        <i class="icofont icofont-social-opencart"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks danger-border">
                            <div class="card-block">
                                <a href="{{ 'out-of-stock' }}" class="summary-title">Stock Alert</a>
                                <ul>
                                    <li>
                                        <i class="icofont icofont-notification text-danger"></i>
                                    </li>
                                    <li class="text-right text-danger">
                                        15
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection