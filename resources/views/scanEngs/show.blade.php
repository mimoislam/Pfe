@include('layouts.sidebar')
@include('layouts.navbars.navbarscanengine')
@extends('layouts.app')


@section('content')

<div class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper p-5">
    
    <h1>Showing Scan Engine  {{ $scanEng->id }}</h1>

    <div class="jumbotron text-center">
        <h2><strong>Ip Address:</strong>  {{ $scanEng->ipAddress }}</h2>
        <p>
            <strong>PORT:</strong> {{ $scanEng->port }}<br>
            <strong>STATUS:</strong> {{ $scanEng->status }}
        </p>
    </div>

</div>
</div>



</div>
