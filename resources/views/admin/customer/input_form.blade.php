<!-- customer form -->
<form  @if($customer->exists) method="put" @else method="post" @endif @if($customer->exists) action="{{route('customer.update',$customer->id)}}" @else action="{{route('customer.store')}}" @endif novalidate >
	@csrf
    <div class="form-group">
        <label class="col-form-label">Customer Name <span class="text-danger">( Required )</span></label>
        @if($customer->exists) <input type="hidden"  name="_method"  value="PUT"> @endif
        <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{$customer->customer_name}}">
    </div>
    <div class="form-group">
        <label class="col-form-label">Email </label>
        <input type="email" class="form-control" name="email" id="email" value="{{$customer->email}}">
    </div>
    <div class="form-group">
        <label class="col-form-label">Phone <span class="text-danger">( Required )</span> </label>
        <input type="text" class="form-control" name="phone" id="phone" value="{{$customer->phone}}">
    </div>
    <div class="form-group">
        <label class="col-form-label">Address </label>
        <input type="text" class="form-control" name="address" id="address" value="{{$customer->address}}">
    </div>
    <div class="form-group">
        <label class="col-form-label m-r-20">Customer Status</label>
        <div class="checkbox-fade fade-in-primary">
            <label>
                <input type="checkbox" id="status" name="status" @if($customer->status=="Active") checked @endif value="1">
                <span class="cr">
            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
            </span>
                <span>Active</span>
            </label>
        </div>
    </div>
</form>