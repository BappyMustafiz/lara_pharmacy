@extends('layouts.adminLayout.admin_design')
@section('content')
<div class="main-body">
        <div class="page-wrapper">
            <!-- Page header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Users</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Users</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Add User</a>
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
                                <h5>Add user</h5>
                                <a href="{{url('/admin/view_users')}}" class="btn btn-info page-header-breadcrumb"><i class="ti-eye"></i> View User List</a>
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
                                <form enctype="multipart/form-data" method="post" action="{{url('/admin/add_user')}}" novalidate>
                                	@csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="name">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="email">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password" id="password">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">User Type <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <select name="user_type_id" id="user_type_id" class="js-example-basic-single col-sm-12">
                                                <option disabled="" selected="">Select user type</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Staff</option>
                                            </select>
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address" id="address">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="phone" id="phone">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="image" id="image">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">User Status</label>
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