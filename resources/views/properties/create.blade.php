@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Property</div>

                    <div class="panel-body">

                        {!! Form::open(['route' => 'save_property', 'method' => 'post', 'files' => true]) !!}

                        <div class="form-group">
                            <div class="col-md-8">
                                <div class="form-group form-horizontal">
                                    {!! Form::label( 'name','Property Name') !!}
                                    {!! Form::text('name', null, ['class'=>'form-control', 'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group form-horizontal">
                                    {!! Form::label( 'county_id','Select County') !!}
                                    {!! Form::select('county_id', $counties, null, ['class'=>'form-control', 'placeholder' => 'Please select the county where property is located']) !!}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group form-horizontal">
                                    {!! Form::label( 'location','Precise Location') !!}
                                    {!! Form::text('location', null, ['class'=>'form-control', 'required', 'placeholder' => 'e.g Naivas Outer-Ring Road']) !!}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group form-horizontal">
                                    {!! Form::label( 'address','Address') !!}
                                    {!! Form::text('address', null, ['class'=>'form-control', 'required', 'placeholder' => 'e.g 001-50308 Serem']) !!}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group form-horizontal">
                                    {!! Form::label( 'size','Size') !!}
                                    {!! Form::text('size', null, ['class'=>'form-control', 'required', 'placeholder' => 'e.g 1 Bedroom, 2 Bedroom etc...']) !!}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group form-horizontal">
                                    {!! Form::label( 'type','Type') !!}
                                    {!! Form::text('type', null, ['class'=>'form-control', 'required' , 'placeholder' => 'e.g Studio, Cottage, Apartment etc...']) !!}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group form-horizontal">
                                    {!! Form::label( 'image','Upload Image') !!}
                                    {!! Form::file('image', ['class'=>'form-control'])!!}
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
