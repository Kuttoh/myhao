@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">

                    {!! Form::open(['route' => 'register_client_user', 'method' => 'post']) !!}

                    <div class="form-group">
                        <div class="col-md-8">
                            <div class="form-group form-horizontal">
                                {!! Form::label( 'gender_id','Select Gender') !!}
                                {!! Form::select('gender_id', $genders, null, ['class'=>'form-control', 'placeholder' => 'Please select gender']) !!}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group form-horizontal">
                                {!! Form::label( 'county_id','Select County') !!}
                                {!! Form::select('county_id', $counties, null, ['class'=>'form-control', 'placeholder' => 'Please select county of residence']) !!}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group form-horizontal">
                                {!! Form::label( 'firstname','First Name') !!}
                                {!! Form::text('firstname', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group form-horizontal">
                                {!! Form::label( 'lastname','Last Name') !!}
                                {!! Form::text('lastname', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group form-horizontal">
                                {!! Form::label( 'email','Email') !!}
                                {!! Form::email('email', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group form-horizontal">
                                {!! Form::label( 'phone','Phone') !!}
                                {!! Form::text('phone', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group form-horizontal">
                                {!! Form::label( 'id_or_passport','ID/Passport No') !!}
                                {!! Form::text('id_or_passport', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group form-horizontal">
                                {!! Form::label( 'password','Password') !!}
                                {!! Form::password('password', ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-8">
                            {!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
