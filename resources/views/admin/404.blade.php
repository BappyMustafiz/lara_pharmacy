@extends('layouts.adminLayout.admin_design')
@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-container">
                        <div class="error-code">404</div>
                        <div class="error-text">Nothing Found</div>
                        <div class="error-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ url('admin/dashboard') }}" class="btn btn-info btn-block btn-lg">Back to dashboard</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection