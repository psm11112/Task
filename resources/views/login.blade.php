@extends('layout.empty')
@section('content')

    <div class="wrapper-page">
        <div class="card-box">
            <div class="panel-heading">
                <h4 class="text-center"> Sign In to <strong class="text-custom">Your Account</strong></h4>
            </div>
            @if(Session::get('error'))
                <div class="error">
                    {{Session::get('error')}}
                </div>
            @endif
            <div class="p-20">
                <form class="form-horizontal m-t-20" action="{{route('user-authentication')}}" method="post">

                    <div class="form-group ">
                        <div class="col-12">
                            <input class="form-control" name="user_name" type="text" required="" placeholder="Username">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <input class="form-control" name="password" type="password" required="" placeholder="Password">
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
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>Don't have an account? <a href="/sign-in" class="text-primary m-l-5"><b>Sign Up</b></a>
                </p>

            </div>
        </div>

    </div>



@endsection