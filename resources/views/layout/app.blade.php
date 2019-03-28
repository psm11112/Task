
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <title>Task</title>

    <!--Morris Chart CSS -->
    {{--<link rel="stylesheet" href="../plugins/morris/morris.css">--}}

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="{{asset('/assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">



    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('/assets/js/modernizr.min.js')}}"></script>


</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">


@extends('layout.top_bar')


    @extends('layout.side_bar')

    <div @if(Session::get('user_type')==UserType::SUPER_ADMIN) class="content-page" @else - @endif>

        <section class="content">
            @yield('content')

        </section>


        {{--@extends('layout.footer')--}}

    </div>




</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- jQuery  -->

<script type="text/javascript" src="{{asset('/assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<script src="{{asset('/assets/pages/jquery.sweet-alert2.init.js')}}"></script>

<script src="{{asset('/assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>


<script src="{{asset('/assets/js/popper.min.js')}}"></script><!-- Popper for Bootstrap -->
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>







<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

@yield('scripts')
</body>
</html>
