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
                        <li class="breadcrumb-item"><a href="#!">Add Medicine</a>
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
                                <h5>Add Medicine</h5>
                                <a href="{{url('/admin/view_medicines')}}" class="btn btn-info page-header-breadcrumb"><i class="ti-eye"></i> View Medicine List</a>
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
                                <form  method="post" action="{{url('/admin/add_medicine')}}" novalidate>
                                	@csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Medicine Title <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="medicine_title" id="medicine_title">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Medicine Category <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <select name="category_id" id="category_id" class="js-example-basic-single col-sm-12">
                                                <option value="" selected="">Select medicine category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_title}}</option>
                                                @endforeach
                                            </select>
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Generic Name <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="generic_name" id="generic_name">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Company Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="company_name" id="company_name">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Purchase Price <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="purchase_price" id="purchase_price">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Selling Price <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="selling_price" id="selling_price">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Stored Box</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="stored_box" id="stored_box">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Quantity <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="quantity" id="quantity">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Effects</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="effects" id="effects">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Expire Date <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input id="dropper-default" name="expiry_date" id="expiry_date" class="form-control" type="text" placeholder="Select Expire date" />
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