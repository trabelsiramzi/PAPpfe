@extends('teamlead.master');
@section('content')
    <div class="container-fluid">
        <h3 class="mt-4">teamlead</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{url('/teamlead')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
        <div class="container pb-lg-5">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center text-success" id="message">{{Session::get('message')}}</h3>
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="text-primary">teamlead Info</h4>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route'=>'update-teamlead-info','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}

                            {{Form::hidden('department_id',$department->id)}}
                            {{Form::hidden('manager_id',$manager->id)}}
                            {{Form::hidden('teamlead_id',$teamlead->id)}}

                            <div class="form-group row">
                                {{Form::label('first_name','First Name',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('first_name',$teamlead->first_name,['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('first_name')? $errors->first('first_name'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('last_name','Last Name',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('last_name',$teamlead->last_name,['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('last_name')? $errors->first('last_name'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('phone_number','Phone Number',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('phone_number',$teamlead->phone_number,['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('phone_number')? $errors->first('phone_number'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('date_of_birth','Date of Birth',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('date_of_birth',$teamlead->date_of_birth, ['class' => 'form-control ','required','id' => 'date']) }}
                                    <span class="text-danger">{{$errors->has('date_of_birth')? $errors->first('date_of_birth'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('teamlead_account_number','Account Number',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::text('teamlead_account_number',$teamlead->teamlead_account_number,['class'=>'form-control','required'])}}
                                    <span class="text-danger">{{$errors->has('manager_account_number')? $errors->first('manager_account_number'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{Form::label('teamlead_image','Image',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{Form::file('teamlead_image',['accept'=>'image/*'])}}
                                    <img src="{{asset($teamlead->teamlead_image)}}" height="100px" width="100px" alt="">
                                </div>
                            </div>
                            <div class="col-sm-9 offset-3">
                                {{Form::submit('Update',['class'=>'btn btn-block btn-primary'])}}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection
