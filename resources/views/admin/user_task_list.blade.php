@extends('layout.app')
@section('content')
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


                </tr>
                </thead>


                <tbody>

                @if(!is_null($userTaskList))
                    @foreach($userTaskList as $task)
                        <tr>
                            <td>{{$task['city']}}</td>
                            <td>{{$task['state']}}</td>
                            <td>{{$task['country']}}</td>

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
    <script type="text/javascript">
        $(document).ready(function () {

            // Default Datatable
            $('#datatable').DataTable();

        });
    </script>

    @endsection
