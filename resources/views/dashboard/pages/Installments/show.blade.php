@extends('dashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Installments Show
                <a href="{{url('Installments')}}" class="btn btn-primary for pull-right">Back</a>


            </h1>


        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-primary">


                        <h3>Client Info</h3>

                        <table class="table table-bordered table-responsive-sm table-hover">

                            <thead>
                            <tr>

                                <td>Client Name</td>
                                <td>Mobile</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$one_installment->client_name}}</td>
                                <td>{{$one_installment->client_mobile}}</td>

                            </tr>


                            </tbody>
                        </table>

                        </hr>
                        <h3>Product Info</h3>


                        <table class="table table-bordered table-responsive-sm table-hover">

                            <thead>
                            <tr>

                                <td>Product Name</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$one_installment->product_name}}</td>
                            </tr>
                            </tbody>
                        </table>

                        <h3>Price Info</h3>

                        <table class="table table-bordered table-responsive-sm table-hover">

                            <thead>
                            <tr>

                                <td>Price</td>
                                <td>Price per Month</td>
                                <td>Price Last Month</td>
                                <td> No. of Month</td>


                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$one_installment->price_after_interest}}</td>
                                <td>{{$one_installment->price_per_month}}</td>
                                <td>{{$one_installment->price_last_month}}</td>
                                <td>{{$one_installment->month_no}}</td>

                            </tr>
                            </tbody>
                        </table>

                        <h3>Additional Info</h3>

                        <table class="table table-bordered table-responsive-sm table-hover">

                            <thead>
                            <tr>

                                <td>Description</td>
                                <td>Date of Sale :</td>
                                <td>Last Date :</td>


                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td>{{$one_installment->description}}</td>
                                <td><span class="label label-warning">{{$one_installment->start_month}}</span></td>
                                <td><span class="label label-danger">{{$one_installment->last_month}}</span></td>

                            </tr>
                            </tbody>
                        </table>


                    </div>

                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@stop
