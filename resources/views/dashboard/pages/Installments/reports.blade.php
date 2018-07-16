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
                        <h3 class=" card-header">Report of You</h3>
                    </div>


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
                                <strong>Oh snap! No Report For You<a href="{{url('Installments/create')}}">Add New
                                    Installment </a> and try again.</strong>
                            </div>
                        @endif
                        </tbody>
                    </table>


                </div>

            </div>

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@stop