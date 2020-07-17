@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Applications Received</div>

                    <div class="panel-body">

                        <div class="form-group">
                            <div class="col-md-10">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Property Name</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Property Price</th>
                                        <th scope="col">Property Type</th>
                                        <th scope="col">Property Size</th>
                                        <th scope="col">Progress</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($applications as $application)
                                    <tr>
                                        <td>{!! $application->id !!}</td>
                                        <td>{!! $application->property->name !!}</td>
                                        <td>{!! $application->client->lastname !!}</td>
                                        <td>{!! $application->property->price !!}</td>
                                        <td>{!! $application->property->type !!}</td>
                                        <td>{!! $application->property->size !!}</td>
                                        <td>{!! $application->progress->name !!}</td>
                                        <td class="text-center"><i class="fa fa-eye" aria-hidden="true"></i></td>
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
