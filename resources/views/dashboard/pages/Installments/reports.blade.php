@extends('dashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Reoport for you
                <a href="{{url('Installments')}}" class="btn btn-primary for pull-right">Back</a>


            </h1>


        </section>


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-primary">



                    <table class="table table-bordered table-responsive-sm table-hover">

                        <tbody>
                        @if($total_sales || $real_payments || $profits || $collected_amount_this_month)
                            <tr>
                                <td><h4>Total Sales</h4></td>
                                <td><h4>{{$total_sales}}</h4></td>
                            </tr>

                            <tr>
                                <td><h4>Real Payments</h4></td>
                                <td><h4>{{$real_payments}}</h4></td>
                            </tr>

                            <tr>
                                <td><h4>Profits</h4></td>
                                <td><h4>{{$profits}}</h4></td>
                            </tr>

                            <tr>
                                <td><h4>Collected Amount This Month</h4></td>
                                <td><h4>{{$collected_amount_this_month}}</h4></td>
                            </tr>


                        @else
                            <div class="alert alert-dismissible alert-primary">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Oh snap! No Report For You <button class="btn btn-primary"><a href="{{url('Installments/create')}}">Add New
                                            Installment </a></button> and try again.</strong>
                            </div>
                        @endif
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