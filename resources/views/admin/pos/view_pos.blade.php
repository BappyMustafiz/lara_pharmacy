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
                                                        <form method="POST" action="{{ url('/admin/pos') }}" name="autocompleteData">
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
                                            @if($items->isEmpty())
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <div class="pos-empty-item">
                                                            <div class="well bg-info">
                                                                There are no medicine in cart.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <div class="pos_sell_item">
                                                            <div class="well well-sm">
                                                                <table id="selectedMedicineTable" class="table table table-bordered table-responsive">
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
                                                                            <td  class="medicine_price">{{ $item->price * $item->quantity }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="pos_right_side">
                                            <div class="well well-lg">
                                                <form action="{{ url('/admin/order-submit') }}" method="post" name="order-submit">
                                                    @csrf
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
                                                                <label class="col-sm-6 f-16">Total</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" name="total" id="sub_total" value="{{ $item_total }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-6 f-16">Less Adjustment</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control discount"  name="discount" id="discount" placeholder="Enter discount" value="">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group row">
                                                                <label class="col-sm-6 f-16">Net Amount</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" name="net-amount" id="grand_total" value="{{ $item_total }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div id="paidAmount">

                                                            </div>
                                                            <hr>
                                                            <div id="paymentDetailsDiv">
                                                                <div class="row">
                                                                    <div class="col-md-12" style="background-color: beige; padding: 19px 10px 0 10px;">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-6 f-16">Payment Type</label>
                                                                            <div class="col-sm-6">
                                                                                <select name="payment_type" id="paymentType" class="js-example-basic-single col-sm-12">
                                                                                    <option value="cash">Cash</option>
                                                                                    <option value="card">Card</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-6 f-16">Amount</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control paid-amount"  name="paid-amount" id="payment" placeholder="Enter amount" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <button type="button" onclick="addPayment();" class="btn btn-info page-header-breadcrumb float-right"><i class="ti-wallet"></i> Add Payment</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div id="paymentTypeSection">
                                                            </div>
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
                                                                    <button type="button" onclick="orderSubmit();" class="btn btn-info page-header-breadcrumb float-right order-submit">Submit <i class="ti-control-forward"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
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

    //hide order submit button and payment details div
    $('.order-submit').hide();
    $('#paymentDetailsDiv').hide();

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
                            $("form[name='autocompleteData']").submit();
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
        if (qty > 0){
            $.ajax({
                url: 'update_cart',
                type: 'post',
                data: {qty: qty, id: id,  _token: '{{csrf_token()}}'},
                dataType: 'json',
                success: function (data) {
                    if (data != undefined){
                        $this.closest('tr').find('td:last-child').html(data);
                        //change subtotal when update quantity
                        var sum = 0;
                        // iterate through each td based on class and add the values
                        $(".medicine_price").each(function() {
                            var value = $(this).text();
                            // add only if the value is number
                            if(!isNaN(value) && value.length != 0) {
                                sum += parseFloat(value);
                            }
                        });
                        $('#sub_total').val(sum);
                        $('#grand_total').val(sum);
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

                    //change subtotal when update quantity
                    var sum = 0;
                    // iterate through each td based on class and add the values
                    $(".medicine_price").each(function() {
                        var value = $(this).text();
                        // add only if the value is number
                        if(!isNaN(value) && value.length != 0) {
                            sum += parseFloat(value);
                        }
                    });
                    $('#sub_total').val(sum);
                    $('#grand_total').val(sum);
                }
            }
        });
    });
    /*restrict user for type letters*/
    $('.discount').keypress(function(e) {
        if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;
    })
    .on("cut copy paste",function(e){
        e.preventDefault();
    });
    $('.paid-amount').keypress(function(e) {
        if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;
    })
    .on("cut copy paste",function(e){
        e.preventDefault();
    });
    /*add discount*/
     $('.discount').on('keyup',function(){
         var total =$("[name='total']").val();
         var discount = $("[name='discount']").val();
         var netAmount = total - discount;
         $('#grand_total').val(netAmount);

         //if due amount exists
         var paidAmount  = $('#net_total').val();

         var totalDue = netAmount - paidAmount;
         $('#due_amount').val(totalDue);
    });

    // show payment details div
    var netAmount = $("[name='net-amount']").val();
    if(netAmount > 0){
        $('#paymentDetailsDiv').show();
    }
});


/*add payment amount*/
function addPayment(){
    var netAmount = $("[name='net-amount']").val();
    var paymentType = $("#paymentType").val();
    var paidAmount =$("[name='paid-amount']").val();
    $('#paidAmount').show();
    $('.order-submit').show();

    if(paidAmount){
        $.ajax({
            url: 'add_payment',
            type: 'post',
            data: {net_amount: netAmount, payment_type: paymentType, paid_amount: paidAmount, _token: '{{csrf_token()}}'},
            dataType: 'json',
            success: function (response) {
                $('#paymentTypeSection').css('display','block');
                if (response != undefined){
                    //view paid and due amount
                    var paidAmount = 0;
                    $.each(response, function(k,v){
                        var payment = parseFloat(v);
                        paidAmount = paidAmount + payment;
                    });
                    var dueAmount = netAmount - paidAmount;
                    var paidOutput = '';
                    paidOutput += '<div class="form-group row">';
                    paidOutput += '<label class="col-sm-6 f-16">Paid Amount</label>';
                    paidOutput += '<div class="col-sm-6">';
                    paidOutput += '<input type="text" class="form-control" name="net-amount" id="net_total" value="'+ paidAmount +'" readonly>';
                    paidOutput += '</div></div>';
                    paidOutput += '<div class="form-group row">';
                    paidOutput += '<label class="col-sm-6 f-16">Due Amount</label>';
                    paidOutput += '<div class="col-sm-6">';
                    paidOutput += '<input type="text" class="form-control" name="due-amount" id="due_amount" value="'+ dueAmount +'" readonly>';
                    paidOutput += '</div></div>';
                    $('#paidAmount').html(paidOutput);

                    //view payment details
                    var output = '';
                    output += '<div class="row" style="background-color: lavender; padding-top: 15px;margin-bottom: 15px;"><div class="col-md-12" ><div class="payment-method">';
                    output += '<table id="paymentMethodTable" class="table table table-bordered table-responsive">';
                    output += '<thead>';
                    output += '<tr>';
                    output += '<th width="5%">Delete</th>';
                    output += '<th width="20%">Payment type</th>';
                    output += '<th width="20%">Amount</th>';
                    output += '</tr>';
                    output += '</thead>';
                    output += '<tbody>';
                    $.each(response, function(index, value) {
                        output += '<tr>';
                        output += '<td class="action-icon text-center"><button type="button" data-type="'+ index +'" data-value="'+ value +'" class="crm-action-delete text-danger del-payment" tabindex="-1"><i class="icofont icofont-delete-alt"></i></button>';
                        output += '</td>';
                        output += '<td>' + index + '</td>';
                        output += '<td>' + value + '</td>';
                        output += '</tr>';
                    });
                    output += '</tbody>';
                    output += '</div></div></div>';
                    $('#paymentTypeSection').html(output);
                }
            }
        });
    }else{
        $("[name='paid-amount']").css('border','1px solid red');
    }

    //delete payment method and amount
    $(document).on('click','.del-payment',function(){
       var paymentType = $(this).data('type');
       var paidAmount = $(this).data('value');
        var $tr = $(this).closest('tr');
        $.ajax({
            url: 'delete_payment',
            type: 'post',
            data: {payment_type: paymentType, paid_amount: paidAmount, _token: '{{csrf_token()}}'},
            dataType: 'json',
            success: function (response) {
                if(response){
                    $tr.find('td').fadeOut(1000,function(){
                        $tr.remove();
                    });
                    if (response === undefined || response.length == 0) {
                        $('#paidAmount').hide();
                        $('#paymentTypeSection').hide();
                        $('.order-submit').hide();
                    }else{
                        var netAmount = $("[name='net-amount']").val();
                        var paidAmount = 0;
                        $.each(response, function(k,v){
                            var payment = parseFloat(v);
                            paidAmount = paidAmount + payment;
                        });
                        var dueAmount = netAmount - paidAmount;
                        $('#net_total').val(paidAmount);
                        $('#due_amount').val(dueAmount);
                    }
                }
            }
        });
    });
}

/*submit order */
function orderSubmit(){

    $("form[name='order-submit']").submit();
    // var total = $("[name='total']").val();
    // var discount = $("[name='discount']").val();
}
</script>
@endsection
