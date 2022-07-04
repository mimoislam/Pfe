@include('layouts.sidebar')
@include('layouts.navbars.navbarplaybooks')
@extends('layouts.app')


@section('content')


<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper p-5">

    <h1>Showing Server {{ $server->id }}</h1>

    <div class="jumbotron text-center">
        <h2><strong>Ip Address:</strong> {{ $server->ipAddress }}</h2>
        <p>
            <strong>Audited:</strong> {{ $server->audited }}<br>
            <strong>System of this server :</strong> {{ $server->system }}<br>
            <strong>STATUS:</strong> {{ $server->status }}
        </p>
    </div>

</div>
</div>


