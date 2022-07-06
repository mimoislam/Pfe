
@extends('layouts.app')


@section('content')
    @include('layouts.sidebar')
    @include('layouts.navbars.navbarserver')
    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <div class="content-wrapper p-5">


                <h1>The Users of Servers</h1>

                <!-- will be used to show any messages -->
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif


                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                <a class="btn btn-small btn-success mr-1" href="{{ URL::to('admin/auditserver/' . $auditServer1->id) }}">Auditserver 1</a>
                            </th>
                            <th></th>
                            <th>
                                <a class="btn btn-small btn-success mr-1" href="{{ URL::to('admin/auditserver/' . $auditServer2->id) }}">Auditserver 2</a>
                            </th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auditServer1->results as $auditServer)
                            <tr>

                                <th>{{$auditServer->id}}</th>
                                <th>{{$auditServer->result}}</th>

                        @endforeach
                        @foreach($auditServer2->results as $auditServer)


                                <th>{{$auditServer->id}}</th>
                                 <th>{{$auditServer->result}}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- ./wrapper -->



    </div>

