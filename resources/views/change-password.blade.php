@extends('layout.app')
@section('content')

    <div class="wrapper-page" style="padding: 20px;">
        <div class="card-box">
            <a href="/"  class="btn btn-success">Go Back</a>
            <div class="panel-heading">
                <h4 class="text-center"> Change <strong class="text-custom">Password</strong></h4>
            </div>
            @if(Session::get('error'))
                <div class="error">
                    {{Session::get('error')}}
                </div>
            @endif
            <div class="p-20">
                @if(Session::get('success'))
                <div class="success alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                <form class="form-horizontal m-t-20" action="{{route('password-change')}}" method="post">


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pass1">Password<span
                                    class="text-danger">*</span></label>
                            <input id="pass1"  name="password" type="password" placeholder="Password" required
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="passWord2">Confirm Password <span
                                    class="text-danger">*</span></label>
                            <input data-parsley-equalto="#pass1" type="password" required
                                   placeholder="Password" class="form-control" id="passWord2">
                        </div>
                    </div>

                    {{ csrf_field() }}

                    <div class="form-group text-center m-t-40">
                        <div class="col-12">
                            <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                                    type="submit">Log In
                            </button>
                        </div>
                    </div>

                    <div class="form-group m-t-30 m-b-0">
                        {{--<div class="col-12">--}}
                        {{--<a href="page-recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot--}}
                        {{--your password?</a>--}}
                        {{--</div>--}}
                    </div>
                </form>

            </div>
        </div>


    </div>



@endsection
