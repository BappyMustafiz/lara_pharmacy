<div class="card-block">
    <div class="view-info" style="">
        <div class="row">
            <div class="col-lg-12">
                <div class="general-info">
                    <div class="row">
                        <div class="col-lg-12 col-xl-6">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Customer Name</th>
                                        <td>{{$customer->customer_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{$customer->email}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone Number</th>
                                        <td>{{$customer->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{$customer->address}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end of row -->
                </div>
                <!-- end of general info -->
            </div>
            <!-- end of col-lg-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of view-info -->
</div>