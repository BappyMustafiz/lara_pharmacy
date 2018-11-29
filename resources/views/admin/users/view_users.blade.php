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
                        <li class="breadcrumb-item"><a href="#!">View Users</a>
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
                                <h5>View Users</h5>
                                <a href="{{url('/admin/add_user')}}" class="btn btn-info page-header-breadcrumb"><i class="ti-plus"></i> Add User</a>
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
		                            <table id="simpletable" class="table table-striped table-bordered nowrap">
		                                <thead>
		                                    <tr>
		                                        <th>#</th>
		                                        <th>Name</th>
                                                <th>Email</th>
                                                <th>User Type</th>
                                                <th>Phone</th>
                                                <th>Image</th>
                                                <th>Status</th>
		                                        <th>Action</th>
		                                    </tr>
		                                </thead>
                                        <tbody>
                                            @foreach($all_users as $user) 
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->user_type_id=="1" ? 'Admin' : 'Staff' }}</td>
                                                    <td>{{$user->phone}}</td>
                                                    <td>
                                                        @if(!empty($user->image))
                                                          <img src="{{asset('/images/backend_images/users/small/'.$user->image)}}" alt="" style="width: 60px;">
                                                        @endif
                                                    </td>
                                                    <td>{{$user->status}}</td>
                                                    <td>
                                                        <a href="{{url('/admin/edit_user/'.$user->id)}}" class="btn btn-success waves-effect waves-light">Edit</a> 
                                                        <a href="javascript:" rel="{{$user->id}}" rel1="delete_user" class="btn btn-danger waves-effect waves-light deleteRecord">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
		                                <tfoot>
		                                    <tr>
		                                        <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>User Type</th>
                                                <th>Phone</th>
                                                <th>Image</th>
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
            $('#simpletable').DataTable();
        });
        
    </script>
@endsection
