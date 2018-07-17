@extends('dashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profile Update
                <a href="{{url('home')}}" class="btn btn-primary for pull-right">Back</a>


                @if(count($errors) >0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" >
                            <p class="text-center">
                                {{$error}}
                            </p>
                        </div>
                    @endforeach
                @endif

            </h1>

            @if(session('success'))
                <div class="alert alert-success" >
                    <p class="text-center"><i class="fa fa-check-square fa-lg" aria-hidden="true"></i>
                        {{ session('success')}}
                    </p>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" >
                    <p class="text-center"><i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i>
                        {{ session('error')}}
                    </p>
                </div>
            @endif


        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                    </br>

                        <!-- /.box-header -->
                        <!-- form start -->

                        <form method="POST" action="{{url('updatePassword')}}" aria-label="{{ __('Update') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                                <div class="col-md-6">
                                    <input id="old_password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="old_password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>




                            <div class="box-footer"><center>
                                    <button type="submit" class="btn btn-primary">Update Password</button>

                                </center>
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

@stop