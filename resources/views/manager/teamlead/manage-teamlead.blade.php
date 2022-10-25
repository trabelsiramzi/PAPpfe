@extends('manager.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">teamlead</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/manager')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">teamlead Info</li>
        </ol>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-info">teamleads Table</h4>
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive ">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>Department Name</th>
                                        <th>Manager ID</th>
                                        <th>teamlead Name</th>
                                        <th>teamlead ID</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th>Department Name</th>
                                        <th>Manager ID</th>
                                        <th>teamlead Name</th>
                                        <th>teamlead ID</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($teamleads as $teamlead)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$teamlead->department_name}}</td>
                                            <td>{{$teamlead->manager_official_id}}</td>
                                            <td>{{$teamlead->first_name." ".$teamlead->last_name}}</td>
                                            <td>{{$teamlead->teamlead_official_id}}</td>
                                            <td>{{$teamlead->email}}</td>
                                            <td>{{$teamlead->phone_number}}</td>
                                            <td> 
                                                <a href="{{route('view-teamlead-details',['id'=>$teamlead->id])}}" class="btn btn-success btn-xs" title="View Details">
                                                    <span class="fa fa-search-plus"></span>
                                                </a>
                                                {{--                                            <a href="" class="btn btn-dark btn-xs" title="Edit">--}}
                                                {{--                                                <span class="fa fa-edit"></span>--}}
                                                {{--                                            </a>--}}
                                                <a  href="{{route('delete-teamlead',['id'=>$teamlead->id])}}" class="btn btn-danger btn-xs" title="Delete">
                                                    <span class="fa fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection

