<?php //die(var_dump($item_total)); ?>
@extends('layouts.adminLayout.admin_design')
@section('content')
<div class="main-body quick-add-medicine">
    <div class="page-wrapper">
        <!-- Page header start -->
        <div class="page-header">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('/admin/dashboard')}}">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/pos')}}">pos</a>
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
                            <h5>Point of Sale ( POS )</h5>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="pos_left_side">
                                        <div class="well well-lg">
                                            <div class="row">
                                                <div class="col-md-10 col-sm-10">
                                                    <form method="POST" action="{{ url('/admin/pos') }}">
                                                        @csrf
                                                        <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Medicine name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="medicine_title" id="tags" placeholder="Type medicine name" autocomplete="off" autofocus>
                                                            <div id="medicineList"></div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-2 col-sm-2">
                                                    <a href="{{url('/admin/medicine_quick_add')}}" class="btn btn-info page-header-breadcrumb add-medicine" title="Medicine quick add" tabindex="-1"><i class="ti-plus"></i> Add</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <div class="pos_sell_item">
                                                    <div class="well well-sm">
                                                        <table class="table table table-bordered table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th width="5%">Delete</th>
                                                                    <th width="20%">Name</th>
                                                                    <th width="20%">Price</th>
                                                                    <th width="20%">Quantity</th>
                                                                    <th width="20%">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($items as $item)
                                                                <tr data-itemid="{{ $item->id }}">
                                                                    <td class="action-icon text-center">
                                                                        <button type="button"  class="crm-action-delete text-danger del-medicine" tabindex="-1"><i class="icofont icofont-delete-alt"></i></button>
                                                                    </td>
                                                                    <td>{{ $item->name }}</td>
                                                                    <td>{{ $item->price }}</td>
                                                                    <td><input type="text" class="form-control cart-qty" onkeypress="numbersOnly(this)" value="{{ $item->quantity }}" ></td>
                                                                    <td>{{ $item->price * $item->quantity }}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <div class="pos-empty-item">
                                                    <div class="well bg-info">
                                                       There are no medicine in cart.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="pos_right_side">
                                        <div class="well well-lg">
                                            <div class="row">
                                                <div class="col-md-12 c0l-sm-12"><p class="f-16">Select customer</p></div>
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="form-group">
                                                        <select name="customer_id" id="customer_id" class="js-example-basic-single col-sm-12">
                                                            <option value="" selected="">Select customer</option>
                                                            @foreach($save_customers as $customer)
                                                            <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <a href="{{route('customer.create')}}" class="btn btn-info page-header-breadcrumb modal-show"><i class="ti-plus"></i> Add</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="pos_invoice_field m-t-25">
                                                        <div class="form-group row">
                                                            <label class="col-sm-6 f-16">Sub total</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="sub_total" id="sub_total" value="{{ $item_total }}" disabled="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-6 f-16">Discount</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="discount" id="discount" value="2%">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label class="col-sm-6 f-16">Grand total</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="grand_total" id="grand_total" value="8" disabled="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-6 f-16">Payment</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="payment" id="payment" value="5">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-6 f-16">Due amount</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="due_amount" id="due_amount" value="3" disabled="">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="pos_status_button">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6">
                                                                <a href="#!" class="btn btn-danger page-header-breadcrumb float-left"><i class="ti-control-backward"></i> Cancel</a>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <a href="{{url('/admin/invoice')}}" class="btn btn-info page-header-breadcrumb float-right">Submit <i class="ti-control-forward"></i></a>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body end -->
    </div>
</div>
<script src="{{asset('js/backend_js/jquery-ui/jquery-ui.min.js')}}"></script>
<script>

$(document).ready(function () {

    /*get medicine list for adding into cart*/
    $("#tags").keyup(function () {

        var query = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: 'get_autocomplete_data',
            method: "POST",
            data: {query: query, _token: _token},
            dataType: 'json',
            success: function (data) {
                if (data != undefined) {
                    $("#tags").autocomplete({
                        source: data,
                        select: function (a, ui) {
                            $("#tags").val(ui.item.value);
                            $('form').submit();
                        }
                    });
                }
            }
        });

    });

    /*cart quantity update*/

    $('.cart-qty').on('keyup', function () {
        $this = $(this);
        var qty = parseInt($(this).val());
        var id = parseInt($(this).closest('tr').data('itemid'));
        console.log(id);
        if (qty > 0){
            $.ajax({
                url: 'update_cart',
                type: 'post',
                data: {qty: qty, id: id,  _token: '{{csrf_token()}}'},
                dataType: 'json',
                success: function (data) {
                    if (data != undefined){
                        $this.closest('tr').find('td:last-child').html(data);

                    }
                }
            });
        }
    });

    /*delete cart item*/
    $('.del-medicine').on('click', function () {
        $this = $(this);
        var id = parseInt($(this).closest('tr').data('itemid'));
        $.ajax({
            url: 'delete_cart',
            type: 'post',
            data: {id: id,  _token: '{{csrf_token()}}'},
            dataType: 'json',
            success: function (data) {
                if (data != undefined){

                    $this.closest('tr').remove();

                }
            }
        });
    });

});

</script>
@endsection
