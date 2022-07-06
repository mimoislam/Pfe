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
            <div >


                <h1>Audits Server</h1>


                <div class="card-body p-0">
                    <table class="table table-striped table-bordered mx-5">
                        <thead class="thead-dark">
                        <tr>
                            <td>ID</td>
                            <td>Scan Eng Ip Address</td>
                            <td>Status</td>
                            <td>Description</td>
                            <td>servers</td>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($scanEng->audits as $key => $value)

                            <tr>
                                <td>{{ $value->id }}</td>
                                <td> <a class="btn btn-small btn-primary" href="{{ URL::to('admin/scanEngs/' . $value->scanEng->id) }}">{{ $value->scanEng->ipAddress }}</a></td>
                                <td> {{ $value->status }}</td>
                                <td> {{ $value->description }}</td>
                                <td>
                                    <ul>
                                        @foreach($value->servers as $key => $value1)

                                            <li>
                                                <a class= "btn btn-dark" style="margin-bottom: 10px" href="{{ URL::to('admin/servers/' . $value1->id) }}">
                                                    {{$value1->ipAddress}}
                                                </a>
                                            </li>

                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <!-- /.card-body -->
            </div>

</div>
</div>



</div>
