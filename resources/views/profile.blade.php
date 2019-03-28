@extends('layout.app')
@section('content')

    <div class="wrapper-page" style="padding: 20px;">

        <div class="card-box">
            <a href="/"  class="btn btn-success">Go Back</a>
            <div class="panel-heading">
                <h4 class="text-center"> User <strong class="text-custom">Update</strong></h4>
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
                <form class="form-horizontal m-t-20" action="{{route('user-update')}}" method="post" ENCTYPE="multipart/form-data">


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">First Name<span
                                    class="text-danger">*</span></label>
                            <input id=""  name="first_name" type="text"  required
                                   class="form-control" @if(!is_null($user['first_name']))value="{{$user['first_name']}}" @endif>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Last Name<span
                                    class="text-danger">*</span></label>
                            <input  type="text" required
                                   placeholder="Last Name" name="last_name" class="form-control" @if(!is_null($user['last_name']))  value="{{$user['last_name']}}" @endif >
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Date Of Birth<span
                                    class="text-danger">*</span></label>
                            <input type="date" name="birth_date" required @if(!is_null($user['date_of_birth'])) value="{{$user['date_of_birth']}}" @endif>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Profile Image<span
                                    class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>


                    {{ csrf_field() }}

                    <div class="form-group text-center m-t-40">
                        <div class="col-12">
                            <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                                    type="submit">Update
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
