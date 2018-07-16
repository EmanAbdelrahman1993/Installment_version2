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
                    <div class=" card-header">Installments Index
                        <center> <a href="{{url('Installments/create')}}" class="btn btn-primary">Add Installment</a></center>
                    </div>
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
                        @if($all_installments)
                        @foreach($all_installments as $installemnt)
                            @if($danger == 1)
                            <tr class="table-danger">

                                <td>{{$installemnt->product_name}}</td>
                                <td> {{ str_limit($installemnt->description, $limit = 25, $end = '...') }}</td>
                                <td> {{$installemnt->price_after_interest}}</td>
                                <td>{{$installemnt->start_month}}</td>



                                <td>
                                    <a href="{{url('Installments/'.$installemnt->id)}}" class="btn btn-success">Show</a>
                                    <a href="{{url('Installments/'.$installemnt->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                    <form method="post" action="{{url('Installments/'.$installemnt->id)}}"
                                          style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE"/>
                                        <input type="submit" value="delete" class="btn btn-danger"/>
                                    </form>

                                </td>
                            </tr>
                            @else
                                <tr>

                                    <td>{{$installemnt->product_name}}</td>
                                    <td> {{ str_limit($installemnt->description, $limit = 25, $end = '...') }}</td>
                                    <td> {{$installemnt->price_after_interest}}</td>
                                    <td>{{$installemnt->start_month}}</td>



                                    <td>
                                        <a href="{{url('Installments/'.$installemnt->id)}}" class="btn btn-success">Show</a>
                                        <a href="{{url('Installments/'.$installemnt->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                        <form method="post" action="{{url('Installments/'.$installemnt->id)}}"
                                              style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <input type="submit" value="delete" class="btn btn-danger"/>
                                        </form>

                                    </td>
                                </tr>
                                @endif
                        @endforeach
                            @else
                            <div class="alert alert-dismissible alert-primary">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Oh snap! No To Do For You</strong> <a href="url{{'Installments/create'}}" class="alert-link">Add New Installment </a> and try  again.
                            </div>
                        @endif
                        </tbody>
                    </table>
                </div>
                <center>
                    {{$all_installments->links()}}
                </center>

            </div>

        </div>

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@stop