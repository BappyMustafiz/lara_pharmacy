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
                        <li class="breadcrumb-item"><a href="#!">Edit User</a>
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
                                <h5>Edit user</h5>
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
                                <form enctype="multipart/form-data" method="post" action="{{url('/admin/edit_user/'.$user_details->id)}}" novalidate>
                                	@csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="name" value="{{$user_details->name}}">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="email" value="{{$user_details->email}}">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">User Type <span class="text-danger">( Required )</span></label>
                                        <div class="col-sm-10">
                                            <select name="user_type_id" id="user_type_id" class="js-example-basic-single col-sm-12">
                                                <option disabled="">Select user type</option>
                                                    @if($user_details->user_type_id == 1)
                                                       <option value="1" selected="">Admin</option>
                                                       <option value="2">Staff</option> 
                                                    @else
                                                        <option value="1">Admin</option>
                                                       <option value="2" selected="">Staff</option> 
                                                    @endif
                                                </optgroup>
                                            </select>
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address" id="address" value="{{$user_details->address}}">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="phone" id="phone" value="{{$user_details->phone}}">
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" id="image" />
                                            <input type="hidden" name="current_image" value="{{ $user_details->image }}" id="image" />
                                            @if(!empty($user_details->image))
                                                <img style="width: 50px;" src="{{ asset('/images/backend_images/users/small/'.$user_details->image) }}" alt="product-image"> | <a href="{{url('/admin/delete_user_image/'.$user_details->id )}}">Delete</a>
                                            @endif
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">User Status</label>
                                        <div class="col-sm-10">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" id="status" name="status" @if($user_details->status=="Active") checked @endif value="1">
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