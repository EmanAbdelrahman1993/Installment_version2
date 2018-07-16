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
                        <h3 class=" card-header">Analysis of Installments</h3>
                    </div>
                    <table class="table table-bordered table-responsive-sm table-hover">

                        <thead>
                        <tr>

                            <td>Date </td>
                            <td>Installmets</td>


                        </tr>
                        </thead>
                        <tbody>
                    {{--@if($all_installemnts)--}}
                        {{--@foreach($all_installemnts as $installemnt)--}}
                            {{--<tr>--}}


                                {{--<td> {{$installemnt->price_after_interest}}</td>--}}
                                {{--<td>{{$installemnt->start_month}}</td>--}}


                            {{--</tr>--}}

                        {{--@endforeach--}}
                    {{--@else--}}
                        {{--<div class="alert alert-dismissible alert-primary">--}}
                            {{--<button type="button" class="close" data-dismiss="alert">&times;</button>--}}
                            {{--<strong>Oh snap! No Analysis For You</strong> <a href="url{{'Installments/create'}}" class="alert-link">Add New Installment </a> and try  again.--}}
                        {{--</div>--}}
                    {{--@endif--}}
                        </tbody>
                    </table>






                </div>

            </div>

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@stop