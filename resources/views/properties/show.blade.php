@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(!Auth::guest())
                        @if(Auth::user()->isPropertyDeveloper())
                            <a href="/properties/create"><button class='btn btn-success btn-sm pull-right'>Create New</button></a>
                        @endif
                        @endif
                        <h5>Projects</h5>
                    </div>
                    @foreach($properties as $property)
                    <div class="panel-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4>{!! $property->name !!}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{!! Storage::url($property->image) !!}" class="img-thumbnail">
                                    </div>
                                    <p><strong>Developer:</strong> {!! $property->developer->name !!}</p>
                                    <p><strong>Name:</strong> {!! $property->name !!}</p>
                                    <p><strong>Location:</strong> {!! $property->location !!}</p>
                                    <p><strong>Address:</strong> {!! $property->address !!}</p>
                                    <p><strong>Size:</strong> {!! $property->size !!}</p>
                                    <p><strong>Type:</strong> {!! $property->type !!}</p>
                                    <p><strong>Price:</strong> KShs {!! $property->price !!}</p>
                                    <p><strong>County:</strong> {!! $property->county->name !!}</p>
                                        <div class="col-md-6 text-right">
                                            {!! Form::open(['url' => '/properties/apply/'.$property->id, 'method' => 'get' ]) !!}
                                            {!! Form::button('Apply Now', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                </div>
                                </div>
                            </div>
                    @endforeach
                    <div class="row text-center">
                        {!! $properties->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
