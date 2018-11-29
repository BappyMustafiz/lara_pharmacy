<!-- customer form -->
<form method="post" action="{{url('/admin/medicine_quick_add')}}"  novalidate >
    @csrf
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Medicine Title <span class="text-danger">( Required )</span></label>
                <input type="text" class="form-control" name="medicine_title" id="medicine_title">
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Medicine Category <span class="text-danger">( Required )</span></label>
                <select name="category_id" id="category_id" class="js-example-basic-single col-sm-12">
                    <option value="" selected="">Select medicine category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Generic Name <span class="text-danger">( Required )</span></label>
                <input type="text" class="form-control" name="generic_name" id="generic_name">
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Company Name</label>
                <input type="text" class="form-control" name="company_name" id="company_name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Purchase Price <span class="text-danger">( Required )</span></label>
                <input type="number" class="form-control" name="purchase_price" id="purchase_price">
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Selling Price <span class="text-danger">( Required )</span></label>
                <input type="number" class="form-control" name="selling_price" id="selling_price">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Stored Box</label>
                <input type="number" class="form-control" name="stored_box" id="stored_box">
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Quantity <span class="text-danger">( Required )</span></label>
                <input type="number" class="form-control" name="quantity" id="quantity">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Effects</label>
                <input type="text" class="form-control" name="effects" id="effects">
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Expire Date <span class="text-danger">( Required )</span></label>
                <input id="dropper-default" name="expiry_date" id="expiry_date" class="form-control" type="text" placeholder="Select Expire date" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-form-label m-r-20">Customer Status</label>
        <div class="checkbox-fade fade-in-primary">
            <label>
                <input type="checkbox" id="status" name="status" value="1">
                <span class="cr">
        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
        </span>
                <span>Active</span>
            </label>
        </div>
    </div>
</form>