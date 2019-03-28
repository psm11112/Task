@extends('layout.empty')
@section('content')
    <div class="container-alt">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="wrapper-page signup-signin-page">
                    <div class="card-box">
                        <div class="panel-heading">
                            <h4 class="text-center"> Welcome to  Technologies<span><i class="md md-add-alarm"></i></h4>
                        </div>

                        <div class="p-20">
                            @if(Session::get('error'))
                                <div class="error">
                                    {{Session::get('error')}}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-12">


                                    <form action="{{route('addUser')}}"  method="post" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">First Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="first_name" parsley-trigger="change"
                                                           placeholder="Enter First Name" class="form-control"
                                                           required id="firstName">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="last_name" parsley-trigger="change"
                                                           placeholder="Enter Last Name" class="form-control"
                                                           id="LastName">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="birth_date">Birth Dates<span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" name="birth_date"
                                                           class="form-control"
                                                           id="birthDate" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Profile Image<span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">


                                        </div>
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="username">UserName<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="user_name" placeholder="User Name"
                                                           required
                                                           class="form-control">
                                                </div>
                                            </div>
                                            {{ csrf_field() }}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="pass1">Password<span
                                                            class="text-danger">*</span></label>
                                                    <input id="pass1"  name="password" type="password" placeholder="Password" required
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="passWord2">Confirm Password <span
                                                            class="text-danger">*</span></label>
                                                    <input data-parsley-equalto="#pass1" type="password" required
                                                           placeholder="Password" class="form-control" id="passWord2">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group text-left m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                Cancel
                                            </button>
                                        </div>

                                    </form>

                                </div>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection

        {{--@section('scripts')--}}

         {{----}}
        {{--@endsection--}}



