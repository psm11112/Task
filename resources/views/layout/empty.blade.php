
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="">

    <title>Task</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('assets/js/modernizr.min.js')}}"></script>

</head>
<body>

<div class="account-pages"></div>
<div class="clearfix"></div>


<section class="content">
    @yield('content')

</section>





<!-- jQuery  -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
<script>

       $("#state").on("change", function () {

           var orgId = $('#state').val();
           $.ajax({
               type   : "GET",
               url    : "/city/"+orgId,
               data   : {
               id: orgId
               },
               success: function (data) {
               var stateCodes = data.data;
                   $('#city').empty();
               $.each(stateCodes, function (key, value) {
                   $('#city').append($("<option></option>")
                       .attr("value", value.slug)
                       .text(value.name));
               });
           }
           });
       });

</script>

</body>
</html>
