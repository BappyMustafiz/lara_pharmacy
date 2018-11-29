@extends('layouts.adminLayout.admin_design')
@section('content')
<div class="main-body">
        <div class="page-wrapper">
            <!-- Page header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Expense Category</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Expense Category</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Add Expense Category</a>
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
                                <h5>Add Expense Category</h5>
                                <a href="{{url('/admin/view_cats')}}" class="btn btn-info page-header-breadcrumb"><i class="ti-eye"></i> View Expense Category List</a>
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

					            @if ($errors->any())
								    <div class="alert alert-danger">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif
                                <form  method="post" action="{{url('/admin/add_cats')}}" novalidate>
                                	@csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Category Title <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="expense_category_title" id="expense_category_title">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Category Description <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="expense_category_description" id="expense_category_description">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">Category Status</label>
                                        <div class="col-sm-10">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="status" name="status" value="1">
                                                    <span class="cr">
                                             <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                                    <span>Active</span>
                                                </label>
                                            </div>
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>
@endsection