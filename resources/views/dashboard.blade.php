@extends('common.master')
@section('title', 'Dashboard')
@section('content')
<div class="row container">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
        <div class="card top-bdr bdr-red">
            <center>
                <div class="card-header">
                    <div class="card-title">Total Books</div>
                </div>
                <div class="card-body pb-0">
                    <h1>
                        {{ $data['books'] }}
                    </h1>
                </div>
            </center>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
        <div class="card top-bdr bdr-green">
            <center>
                <div class="card-header">
                    <div class="card-title">Total Subscription</div>
                </div>
                <div class="card-body pb-0">
                    <h1>
                        {{ $data['subscription'] }}
                    </h1>
                </div>
            </center>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
        <div class="card top-bdr bdr-yellow">
            <center>
                <div class="card-header">
                    <div class="card-title">Total Users</div>
                </div>
                <div class="card-body pb-0">
                    <h1>
                        {{ $data['users'] }}
                    </h1>
                </div>
            </center>
        </div>
    </div>    
</div>
@endsection