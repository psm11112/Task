@extends('layout.app')
@section('content')

    <div class="row" id="div">

    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">List Of Uset Task</h4>


            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>User</th>
                    <th>Number of Recode</th>
                    <th>Status</th>
                    <th>Action</th>


                </tr>
                </thead>


                <tbody>

                @if(!is_null($userList))
                    @foreach($userList as $list)
                        <tr>
                            <td><img src="{{url('uploads/'.$list['profile_image'])}}"
                                     class="thumb-sm" alt="">
                                @if($list['is_online'])
                                    <i style="color:#a0d269" class="fa fa-circle online"></i>
                                @else
                                    <i style="color:#FF2525;" class="fa fa-circle offline"></i>
                                @endif

                            </td>
                            <td>{{$list['first_name']}}</td>
                            <td>{{count($list['userTask'])}}</td>
                            <td>@if($list['status']) <button class="btn btn-success">Active</button> @else <button class="btn btn-success">InActive</button>  @endif</td>
                            <td><a href="{{'/admin/view/'.$list['id']}}">View</a> &nbsp; <a href="{{'/admin/user-task/'.$list['id']}}"> User Task </a> &nbsp;  @if($list->status) <a href="{{'/user/in-active/'.$list['id']}}"> InActive </a> @else  <a href="{{'/user/active/'.$list['id']}}">Active</a> @endif </td>

                        </tr>
                    @endforeach
                @endif


                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection
@section('scripts')

    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $('#addUserTask').submit(function (event) {
            event.preventDefault();

            $.ajax({
                type: "post",
                url: "{{ url('user-task') }}",
                data: $('#addUserTask').serialize(),
                success: function (data) {
                    $("#div").load(" #div >*");

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


@endsection
