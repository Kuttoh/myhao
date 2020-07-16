@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register Property Developer</div>

                    <div class="panel-body">

                        {!! Form::open(['route' => 'register_property_developer', 'method' => 'post']) !!}

                        <div class="form-group">
                            <div class="col-md-8">
                                <div class="form-group form-horizontal">
                                    {!! Form::label( 'name','Name of Developer') !!}
                                    {!! Form::text('name', null, ['class'=>'form-control', 'required']) !!}
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
                                    {!! Form::label( 'physical_address','Physical Address') !!}
                                    {!! Form::text('physical_address', null, ['class'=>'form-control', 'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group form-horizontal">
                                    {!! Form::label( 'username','Preferred Username') !!}
                                    {!! Form::text('username', null, ['class'=>'form-control', 'required']) !!}
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
