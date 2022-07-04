@include('layouts.sidebar')
@include('layouts.navbars.navbarplaybooks')
@extends('layouts.app')


@section('content')


<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper p-5">


    <h1>Showing {{ $playbook->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $playbook->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $playbook->email }}<br>
            <strong>Level:</strong> {{ $playbook->shark_level }}
        </p>
    </div>

</div>
</div>


