@extends('layouts.adminLayout.admin_design')
@section('content')
<div class="main-body">
        <div class="page-wrapper">
            <!-- Page header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Invoice</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{url('/admin/dashboard')}}">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{url('/admin/pos')}}">POS</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{url('/admin/invoice')}}">Invoice</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <!-- Container-fluid starts -->
                <div class="container">
                    <!-- Main content starts -->
                    <div>
                        <!-- Invoice card start -->
                        <div class="card">
                            <div class="row invoice-contact">
                                <div class="col-md-8">
                                    <div class="invoice-box row">
                                        <div class="col-sm-12">
                                            <table class="table table-responsive invoice-table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{asset('/images/backend_images/invoice_logo2.png')}}" class="m-b-10" alt="100 x 41"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>SarosIT Limited.</td>
                                                    </tr>
                                                    <tr>
                                                        <td>House-34 (2nd floor), Road-11, D.I.T Project,Merul Badda, Dhaka-1212,BD.</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="mailto:hjnoyon@sarosit.com" target="_top">hjnoyon@sarosit.com</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>+8801714 062916, +8801714 062917 </td>
                                                    </tr>
                                                    <!-- <tr>
                                                            <td><a href="#" target="_blank">www.demo.com</a>
                                                            </td>
                                                        </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row text-center">
                                        <div class="col-sm-12 invoice-btn-group">
                                            <button type="button" class="btn btn-primary btn-print-invoice waves-effect waves-light m-r-20">Print Invoice
                                            </button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light">Cancel Invoice
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="row invoive-info">
                                    <div class="col-md-4 col-xs-12 invoice-client-info">
                                        <h6>Client Information :</h6>
                                        <h6 class="m-0">Josephin Villa</h6>
                                        <p class="m-0 m-t-10">208, Peris Point, Varachha Road, Surat.</p>
                                        <p class="m-0">(1234) - 567891</p>
                                        <p>demo@phoenixcoded.com</p>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <h6>Order Information :</h6>
                                        <table class="table table-responsive invoice-table invoice-order table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th>Date :</th>
                                                    <td>November 14</td>
                                                </tr>
                                                <tr>
                                                    <th>Status :</th>
                                                    <td>
                                                        <span class="label label-warning">Pending</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Id :</th>
                                                    <td>
                                                        #145698
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <h6 class="m-b-20">Invoice Number   <span>#12398521473</span></h6>
                                        <h6 class="text-uppercase text-primary">Total Due :
                                    <span>$900.00</span>
                                </h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-responsive invoice-detail-table">
                                            <thead>
                                                <tr class="thead-default">
                                                    <th width="25%">Description</th>
                                                    <th width="25%">Quantity</th>
                                                    <th width="25%">Amount</th>
                                                    <th width="25%">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6>Logo Design</h6>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                                                    </td>
                                                    <td>6</td>
                                                    <td>$200.00</td>
                                                    <td>$1200.00</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Logo Design</h6>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                                                    </td>
                                                    <td>7</td>
                                                    <td>$100.00</td>
                                                    <td>$700.00</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Logo Design</h6>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                                                    </td>
                                                    <td>5</td>
                                                    <td>$150.00</td>
                                                    <td>$750.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-responsive invoice-table invoice-total">
                                            <tbody>
                                                <tr>
                                                    <th>Sub Total :</th>
                                                    <td>$4725.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Taxes (10%) :</th>
                                                    <td>$57.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Discount (5%) :</th>
                                                    <td>$45.00</td>
                                                </tr>
                                                <tr class="text-info">
                                                    <td>
                                                        <hr/>
                                                        <h5 class="text-primary">Total  :</h5>
                                                    </td>
                                                    <td>
                                                        <hr/>
                                                        <h5 class="text-primary">$4827.00</h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h6>Terms And Condition :</h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Invoice card end -->
                    </div>
                </div>
                <!-- Container ends -->
            </div>
            <!-- Page body end -->
        </div>
    </div>
@endsection