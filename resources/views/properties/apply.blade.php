@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Apply for Property Allocation</div>

                    <div class="panel-body">

                        {!! Form::open(['route' => 'post_apply', 'method' => 'post']) !!}
                        {!! Form::hidden('developer_property_id', $property->developer->id) !!}

                        <div class="form-group">
                            <div class="col-md-8">
                                <div class="form-group form-horizontal">
                                    {!! Form::label( 'financial_institution_id','Preferred Financial Institution') !!}
                                    {!! Form::select('financial_institution_id', $financialInstitutions, null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group form-horizontal">
                                    <p><em>Please note that an STK push will be sent to your registered phone to make payment</em></p>
                                    <p><em>Ensure you enter the correct PIN</em></p>
                                    <p><em>Applications without payments will remain pending</em></p>
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
