@extends('teamlead.master')
@section('content')

    <div class="container-fluid">
        <h3 class="mt-4">teamlead</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/teamlead')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
            <div class=" table-responsive">
                <div class="card">
                    <div class="card-body bg-light">
                        <div class="row">
                        <div class="col-sm-9">
                            <table class="table table-hover table-bordered table-sm bg-white">
                                <tr>
                                    <th>Name :</th>
                                    <td>{{$teamlead->first_name.' '.$teamlead->last_name}}</td>
                                </tr>
                                <tr>
                                    <th>Rating :</th>
                                @if($teamlead->rating<400)
                                        <td class="text-secondary" >{{$teamlead->rating}}</td>
                                @elseif($teamlead->rating>399 && $teamlead->rating<800)
                                        <td class="text-success">{{$teamlead->rating}}</td>
                                @elseif($teamlead->rating>799 && $teamlead->rating<1100)
                                        <td  class="text-info">{{$teamlead->rating}}</td>
                                @elseif($teamlead->rating>1099 && $teamlead->rating<1500)
                                    <td class="text-warning">{{$teamlead->rating}}</td>
                                @elseif($teamlead->rating>1499)
                                        <td class="text-danger">{{$teamlead->rating}}</td>
                                @endif
                                </tr>
                                <tr>
                                    <th>Designation :</th>
                                    @if($teamlead->rating<400)
                                        <td class="text-secondary" >{{"teamlead"}}</td>
                                    @elseif($teamlead->rating>399 && $teamlead->rating<800)
                                        <td class="text-success">{{"Special Events Coordinator"}}</td>
                                    @elseif($teamlead->rating>799 && $teamlead->rating<1100)
                                        <td  class="text-info">{{"Senior Support Assistant"}}</td>
                                    @elseif($teamlead->rating>1099 && $teamlead->rating<1500)
                                        <td class="text-warning">{{"Senior Executive Assistant"}}</td>
                                    @elseif($teamlead->rating>1499)
                                        <td class="text-danger">{{"Secretary"}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>User Name :</th>
                                    <td>{{$teamlead->user_name}}</td>
                                </tr>
                                <tr>
                                    <th>Official ID :</th>
                                    <td>{{$teamlead->teamlead_official_id}}</td>
                                </tr>
                                <tr>
                                    <th>Department Name :</th>
                                    <td>{{$department->department_name}}</td>
                                </tr>
                                <tr>
                                    <th>Manager :</th>
                                    <td>{{$manager->manager_official_id.' , '.$manager->first_name.' '.$manager->last_name}}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$teamlead->email}}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth :</th>
                                    <td>{{$teamlead->date_of_birth}}</td>
                                </tr>
                                <tr>
                                    <th>Account Number :</th>
                                    <td>{{$teamlead->teamlead_account_number}}</td>
                                </tr>
                                <tr>
                                    <th>Salary :</th>
                                    <td>{{$teamlead->teamlead_salary}} Taka</td>
                                </tr>
                                <tr>
                                    <th>Qualifiaction :</th>
                                    <td>{{$teamlead->qualification}}</td>
                                </tr>
                                <tr>
                                    <th>Joining Date :</th>
                                    <td>{{$teamlead->created_at}}</td>
                                </tr>
                            </table> 
                        </div>
                        <div class="col-sm-3 text-center border bg-white">
                                <img height="200px" width="100%"  src="{{asset($teamlead->teamlead_image)}}" alt="">
                            <br>
                            <br>
                                <a href="{{route("edit-teamlead-profile")}}" class="btn btn-block btn-info">{{"Edit Profile"}}</a>

                            <br>
                            <div class="text-center">
                                <h5 class="text-center text-success" id="message">{{Session::get('message')}}</h5>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
