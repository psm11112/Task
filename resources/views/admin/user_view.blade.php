@extends('layout.app')
@section('content')

    {{--<div class="row clearfix">--}}
    {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
        {{--<div class="card-box table-responsive">--}}
        {{--<div class="card bg-white" style="padding: 20px;">--}}
            {{--<div class="header">--}}
                {{--<div class="btn-group pull-right">--}}
                    {{--<a href="/category/{{$category->id}}" class="btn btn-primary" target="_blank">Edit</a>--}}


                {{--</div>--}}
                {{--<h2>--}}
                    {{--User Details--}}
                {{--</h2>--}}
            {{--</div>--}}
{{--<center>--}}
            {{--<div class="col-md-4">--}}

                {{--<label id="imageId">Profile</label>--}}
                {{--<div class="label--value" id="image">--}}

                    {{--@if($userList->profile_image)--}}
                        {{--<img src="{{url('uploads/'.$userList->profile_image)}}" class="img-thumbnail" width="150"--}}
                             {{--height="100">--}}

                {{--</div>--}}
                {{--@else--}}
                    {{--<small class="text-danger"> Not Available</small>--}}
                {{--@endif--}}
            {{--</div>--}}

                {{--<div class="row">--}}
                    {{--<div class="col-md-8 ">--}}

                        {{--<div class="row text-center">--}}
                        {{--<label id="name">First Name</label>--}}
                            {{--<div class="label--value">{{$userList->first_name}}</div>--}}
                        {{--</div>--}}

                        {{--<label id="code">Last Name</label>--}}
                        {{--<div class="label--value">{{$userList->last_name}}</div>--}}
                        {{--<label id="">Date Of Birth</label>--}}
                        {{--<div class="label--value">{{$userList->date_of_birth}}</div>--}}



                    {{--</div>--}}


                {{--</div>--}}
{{--</center>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

    <div class="profile-detail card-box">
        <div>
            <img src="{{url('uploads/'.$userList->profile_image)}}" class="rounded-circle" alt="profile-image">

            <ul class="list-inline status-list m-t-20">
                <li class="list-inline-item">
                    <h3 class="text-primary m-b-5">{{count($userList->userTask)}}</h3>
                    <p class="text-muted">Number Of Recode</p>
                </li>

            </ul>

            <hr>
            <h4 class="text-uppercase font-18 font-600">User Details</h4>


            <div class="text-left">
                <p class="text-muted font-20"><strong>Full Name :</strong> <span class="m-l-15">{{$userList->first_name}} &nbsp; @if($userList->last_name) {{$userList->last_name}} @endif</span></p>

                <p class="text-muted font-20"><strong>UserName :</strong><span class="m-l-15"> {{$userList->user_name}}</span></p>

                <p class="text-muted font-20"><strong>Date of Birth</strong> <span class="m-l-15">{{$userList->date_of_birth}}</span></p>

                <p class="text-muted font-20"><strong>Account Created At:-</strong> <span class="m-l-15">{{getReadableDateTime($userList->created_at)}}</span></p>



            </div>



        </div>

    </div>
@endsection
