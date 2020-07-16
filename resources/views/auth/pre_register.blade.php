@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">Registration</div>

                    @foreach($categories as $category)
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">{!! $category->name !!}</div>
                                    @if($category->slug == 'client')
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fa fa-home"></i> Own a Home</h5>
                                            <p class="card-text">This account is for those that would like to enlist for
                                                property ownership</p>
                                            <a href="/register" class="btn btn-success btn-sm">Create Individual Account</a>
                                        </div>
                                    @endif
                                    @if($category->slug == 'property_developer')
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fa fa-building"></i> Build with Us</h5>
                                            <p class="card-text">Are you a property developer? Partner with us!</p>
                                            <a href="/register_dev" class="btn btn-success btn-sm">Create Developer Account</a>
                                        </div>
                                    @endif
                                    @if($category->slug == 'financial_institution')
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fa fa-money"></i> Finance Home Owners</h5>
                                            <p class="card-text">Are you a financial institution? Partner with us to finance dreams!</p>
                                            <a href="/register_financier" class="btn btn-success btn-sm">Create Developer Account</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
@endsection
