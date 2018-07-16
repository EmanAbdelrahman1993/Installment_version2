@extends('dashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Installments Create
                <a href="{{url('Installments')}}" class="btn btn-primary for pull-right">Back</a>


            </h1>


        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form  class="col-md-12" method="post" action="{{url('Installments/'.$one_installment->id)}}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT"/>
                            <div class="box-body">
                                <div class="form-group col-md-4">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" name="product_name"
                                           value="{{$one_installment->product_name}}"
                                           required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Client Name</label>
                                    <input type="text" class="form-control" name="client_name"
                                           value="{{$one_installment->client_name}}"
                                           required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Client Phone</label>
                                    <input type="number" class="form-control" name="client_mobile"
                                           value="{{$one_installment->client_mobile}}"
                                           required>
                                </div>


                                <div class="form-group col-md-4">
                                    <label> Price Before Interest</label>
                                    <input type="number" class="form-control" name=" price_before_interest"
                                           id="price_before_interest"
                                           value="{{$one_installment->price_before_interest}}" onkeyup="add()" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Interest %</label>
                                    <input type="number" class="form-control" id="interest" name="interest"
                                           value="{{$one_installment->interest}}" onkeyup="add()"  required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Price After Interest</label>
                                    <input type="number" class="form-control" name="price_after_interest"
                                           id="price_after_interest" onkeyup="month_numbers()" readonly>
                                </div>



                                <div class="form-group col-md-4">
                                    <label>No of Month</label>
                                    <input type="number" class="form-control" name="month_no" id="month_no"
                                           value="{{$one_installment->month_no}}" onkeyup="month_numbers()" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Price Per Month</label>
                                    <input type="number" class="form-control" name="price_per_month" id="price_per_month"
                                           value="{{$one_installment->price_per_month}}" onkeyup="month_numbers()" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Last Month Money Paid</label>
                                    <input type="number" class="form-control" name="last_month_money" id="last_month_money"
                                           value="{{$one_installment->last_month_money}}"  readonly>
                                </div>



                                <div class="form-group col-md-4">
                                    <label>Start Month</label>
                                    <input type="date" class="form-control" name="start_month"
                                           value="{{$one_installment->start_month}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" required>
                                        {{$one_installment->description}}</textarea>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer"><center>
                                    <button type="submit" class="btn btn-primary">Update</button></center>
                            </div>
                        </form>
                    </div>


                    <!--/.col (right) -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        function add(){
            var price_before_interest = document.getElementById("price_before_interest").value;
            var interest = document.getElementById("interest").value;
            var price_after_interest = +price_before_interest + +price_before_interest*interest/100 ;
            document.getElementById("price_after_interest").value = price_after_interest;
        }


        function month_numbers() {
            var price_after_interest = document.getElementById("price_after_interest").value;
            var price_per_month = document.getElementById("price_per_month").value;
            var month_no = document.getElementById("month_no").value;
            var last_month_money = +price_after_interest - (+price_per_month * +month_no);
            document.getElementById("last_month_money").value = last_month_money;
        }
    </script>

@stop