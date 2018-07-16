@extends('dashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card">
                        <div class=" card-header"><h3>Installments Show</h3>
                            <center> <a href="{{url('Installments')}}" class="btn btn-primary">Back to Installment</a></center>
                        </div>


                        <h2>Client Info</h2>
                        </br>
                        <h4>
                        <div class="col-md-1">Name</div>
                        <div class="col-md-2">{{$one_installment->client_name}}</div>
                        </br>
                        <div class="col-md-1">Mobile</div>
                        <div class="col-md-2">{{$one_installment->client_mobile}}</div>
                        </h4></br>
                        <h2>Product Info</h2>
                        <h4><div class="col-md-1"> Name</div>
                        <div class="col-md-2">{{$one_installment->product_name}}</div>
                        </h4></br>
                        <h2>Price Info</h2>
                        <h4><div class="col-md-3"> Price </div>
                        <div class="col-md-3">{{$one_installment->price_after_interest}}</div>
                        <div class="col-md-3"> Price per Month </div>
                        <div class="col-md-3">{{$one_installment->price_per_month}}</div>

                        <div class="col-md-3"> Price Last Month</div>
                        <div class="col-md-3">{{$one_installment->price_last_month}}</div>

                        <div class="col-md-3"> No. of  Month</div>
                        <div class="col-md-3">{{$one_installment->month_no}}</div>

                        <div><div class="col-md-3">Description</div>
                        <div class="col-md-9">{{$one_installment->description}}</div>
                        </div></h4>
                        <br/>

                        <h4><div><div class="col-md-3">Date of Sale :</div>
                                <div class="col-md-3"> <span class="label label-warning">{{$one_installment->start_month}}</span></div>
                            <div class="col-md-3">Last Date :</div>
                                <div class="col-md-3">  <span class="label label-danger">{{$one_installment->last_month}}</span></div>
                            </div>
                        </h4>








                    </div>

                </div>

            </div>

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@stop
