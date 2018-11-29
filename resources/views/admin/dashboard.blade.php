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
	                <div class="col-md-12 col-xl-6">
                        <!-- table card start -->
                        <div class="card table-card">
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-cur-taka-plus text-success"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>1000</h5>
                                                <span>Sales Today</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-cur-taka-minus text-danger"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>500</h5>
                                                <span>Expenses Today</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- table card end -->
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <!-- table card start -->
                        <div class="card table-card">
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-4">
                                               <i class="icofont icofont-first-aid-alt text-primary"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <a href="{{url('/admin/view_medicines')}}">
                                                    <h5>{{$counted_medicine}}</h5>
                                                    <span>Medicine</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row ">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-nurse text-primary"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <a href="{{url('/admin/view_users')}}">
                                                    <h5>{{$counted_staff}}</h5>
                                                    <span>Staff</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- table card end -->
                    </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection