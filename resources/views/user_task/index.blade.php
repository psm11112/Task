@extends('layout.app')
@section('content')
    <div class="content">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Dashboard</h4>
                    <p class="text-muted page-title-alt">Welcome  admin panel !</p>
                </div>
            </div>
            @if(Session::get('error'))
                <div class="error">
                    {{Session::get("error")}}
                </div>
            @endif
            @if(Session::get('user_type')!==UserType::SUPER_ADMIN)
                <div class="row">

                    <div class="col-lg-12">

                        <form id="addUserTask">
                            <div class="card-box">


                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="city">City<span class="text-danger">*</span></label>
                                            <input type="text" name="city" parsley-trigger="change" required
                                                   placeholder="City" class="form-control" id="city"
                                                   @if(!is_null($task)) value="{{$task['city'] ?? ''}}" @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="state">State<span class="text-danger">*</span></label>
                                            <input type="text" name="state" parsley-trigger="change" required=""
                                                   placeholder="Enter State " class="form-control" id="state"
                                                   @if(!is_null($task)) value="{{$task['state'] ?? ''}}" @endif>
                                        </div>
                                    </div>
                                    <input type="hidden" @if(!is_null($task)) value="{{$task['id']}}" @endif name="id">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="userName">Country<span class="text-danger">*</span></label>
                                            <input type="text" name="country" parsley-trigger="change" required=""
                                                   placeholder="Enter Country" class="form-control" id="country"
                                                   @if(!is_null($task)) value="{{$task['country'] ?? ''}}" @endif>
                                        </div>
                                    </div>
                                    {{ csrf_field() }}
                                    <div class="col-md-3 m-b-10" style="    margin-top: 30px;">
                                        <button class="btn btn-primary waves-effect waves-light" id="dd" type="submit">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div> <!-- end card-box -->
                        </form>
                    </div>
                </div>
                <div class="row" id="div">

                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title">List Of Uset Task</h4>


                            <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Action</th>

                                </tr>
                                </thead>


                                <tbody>

                                @if(!is_null($user_task))
                                    @foreach($user_task as $task)
                                        <tr>
                                            <td>{{$task['city']}}</td>
                                            <td>{{$task['state']}}</td>
                                            <td>{{$task['country']}}</td>
                                            <td><a href="{{'/user-task/'.$task['id']}}" class="btn btn-dark"> Edit</a>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <button id="{{$task['id']}}" class="btn btn-animated deleteData"
                                                        value="{{$task['id']}}">Delete
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif


                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            @endif


            @if(Session::get('user_type')==UserType::SUPER_ADMIN)
                <div class="row">


                    <div class="col-md-8 col-lg-12 col-xl-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-purple pull-left">
                                <i class="md ti-user text-purple"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">{{$count}}</b></h3>
                                <p class="text-muted mb-0">Total User</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!-- col -->

                    <div class="col-lg-12">
                        <div class="card-box">
                            <a href="admin/user" class="pull-right btn btn-default btn-sm waves-effect waves-light">View
                                All</a>
                            <h4 class="text-dark header-title m-t-0">Recent Register User</h4>
                            <p class="text-muted m-b-30 font-13">

                            </p>

                            <div class="table-responsive">
                                <table class="table table-actions-bar mb-0">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>First Name</th>
                                        <th>LastName</th>
                                        <th>UserName</th>

                                        <th>Date Of Birth</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!is_null($last_five))
                                        @foreach($last_five as $_lastFive)
                                            <tr>
                                                <td><img src="{{url('uploads/'.$_lastFive['profile_image'])}}"
                                                         class="thumb-sm" alt="">
                                                    @if($_lastFive['is_online'])
                                                    <i style="color:#a0d269" class="fa fa-circle online"></i>
                                                        @else
                                                        <i style="color:#FF2525;" class="fa fa-circle offline"></i>
                                                    @endif
                                                </td>
                                                <td>{{$_lastFive['first_name']}}</td>
                                                <td>{{$_lastFive['last_name']}}</td>
                                                <td>{{$_lastFive['user_name']}}</td>
                                                <td>{{$_lastFive['date_of_birth']}}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->


        </div> <!-- container -->
        @endif
    </div>
    </div>
@endsection
@section('scripts')

    <script src="{{asset('/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $('#addUserTask').submit(function (event) {
            event.preventDefault();

            $.ajax({
                type: "post",
                url: "{{ url('user-task') }}",
                data: $('#addUserTask').serialize(),
                success: function (data) {

                    location.reload(true);

                    document.getElementById("addUserTask").reset();


                },
                error: function (data) {
                    var message = JSON.parse(data);
                    console.log(message.message);
                    alert("Error")
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {

            // Default Datatable
            $('#datatable').DataTable();

        });
    </script>
    <script>
        //var id = $('#taskId').val();

        // var id = $(this).closest('tr');
        // console.log(id);


        $('.deleteData').click(function () {

            var id = $(this).val();


            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                buttonsStyling: false
            }).then(function () {


                $.ajax({
                    type: "GET",
                    url: "/user-task/delete/" + id,

                    success: function (data) {
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        location.reload(true);
                    }


                }), function (dismiss) {
                    // dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                    if (dismiss === 'cancel') {
                        swal(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                };
            });
        });

    </script>

@endsection
