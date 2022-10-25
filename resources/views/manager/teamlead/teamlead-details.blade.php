@extends('manager.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">teamlead</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/manager')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">teamlead Info</li>
        </ol>
        <div class="container pb-lg-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-success">teamlead Details</h4>
                        </div> 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th class="w-25">teamlead Name :</th>
                                        <td>{{$teamlead->first_name.' '.$teamlead->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>teamlead ID :</th>
                                        <td>{{$teamlead->teamlead_official_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Department Name :</th>
                                        <td>{{$department->department_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Manage Name :</th>
                                        <td>{{$manager->first_name.' '.$manager->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Manager ID :</th>
                                        <td>{{$manager->manager_official_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{$teamlead->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number :</th>
                                        <td>{{$teamlead->phone_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth :</th>
                                        <td>{{$teamlead->date_of_birth}}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender :</th>
                                        <td>{{$teamlead->gender}}</td>
                                    </tr>
                                    <tr>
                                        <th>Doing Work :</th>
                                        <td>{{3-$teamlead->teamlead_status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Work Can Assign :</th>
                                        <td>{{$teamlead->teamlead_status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Salary Per Month :</th>
                                        <td>{{$teamlead->teamlead_salary}}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Number :</th>
                                        <td>{{$teamlead->teamlead_account_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Qualifiaction :</th>
                                        <td>{{$teamlead->qualification}}</td>
                                    </tr>
                                    <tr>
                                        <th>Registration Date :</th>
                                        <td>{{$teamlead->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th>User Name :</th>
                                        <td>{{$teamlead->user_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Password :</th>
                                        <td>{{$teamlead->password}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address :</th>
                                        <td>{{$teamlead->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>teamlead Image :</th>
                                        <td>
                                            <img src="{{asset($teamlead->teamlead_image)}}" height="100px" width="100px" alt="">
                                        </td>
                                    </tr>
                                </table>
                                <div class="float-right col-sm-2">
                                    <a href="{{route('manage-teamlead')}}" class="btn btn-block btn-success">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
