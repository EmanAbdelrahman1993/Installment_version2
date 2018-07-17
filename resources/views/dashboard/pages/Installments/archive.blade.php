@extends('dashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Archived Installment
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

                        <thead>
                        <tr>

                            <td>Product Name</td>
                            <td>Description</td>
                            <td>Price After Interest</td>
                            <td>Start Date</td>
                            <td>Action</td>

                        </tr>
                        </thead>
                        <tbody>
                    @if($installemnts_archived)
                        @foreach($installemnts_archived as $installemnt)
                            <tr>

                                <td>{{$installemnt->product_name}}</td>
                                <td> {{ str_limit($installemnt->description, $limit = 25, $end = '...') }}</td>
                                <td> {{$installemnt->price_after_interest}}</td>
                                <td>{{$installemnt->start_month}}</td>

                                <td>
                                    <a href="{{url('Installments/showOnlyTrashed/'.$installemnt->id)}}" class="btn btn-success">Show</a>
                                    <form method="post" action="{{url('Installments/forcedelete/'.$installemnt->id)}}"
                                          style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE"/>
                                        <input type="submit" value="delete" class="btn btn-danger"/>
                                    </form>

                                </td>


                            </tr>

                        @endforeach
                    @else
                        <div class="alert alert-dismissible alert-primary">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Oh snap! Archived Do For You</strong> <a href="url{{'Installments/create'}}" class="alert-link">Add New Installment </a> and try  again.
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