@include('layouts.sidebar')
@include('layouts.topnavbar')
@extends('layouts.app')


@section('content')
    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <div class="content-wrapper">

                <h1 class="m-3">Result Dashboard</h1>
                <div class="py-12 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <!-- will be used to show any messages -->
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <div  >

                        <h2><strong>AuditServer ID:</strong> {{ $result->id }}  </h2>
                        <p>

                        <td>Id Of Result</td>
                        <td>Result output </td>

                        <td>Error Message</td>
                        <td>Id Of Audit Server</td>
                        <td>Status Of Result</td>
                            <strong>Id Of Result :</strong> {{ $result->id }}<br>
                            <strong>Result output:</strong> {{ $result->result }}<br>
                            <strong>Error Message:</strong> {{ $result->error }}<br>
                            <strong>Id Of Audit Server:</strong> {{$result->auditServer->ipAddress}}<br>
                            <strong>Status Of Result :</strong>       {{ $result->status }}<br>
                            <br>
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <!-- ./wrapper -->



    </div>
