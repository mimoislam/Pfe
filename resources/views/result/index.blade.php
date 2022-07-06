@include('layouts.sidebar')
@include('layouts.topnavbar')
@extends('layouts.app')


@section('content')
    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <div class="content-wrapper">

                <h1 class="m-3">Result Dashboard</h1>

                <!-- will be used to show any messages -->
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                <!-- /.card-header -->
                <div class="card-body p-0 ml-3 mr-5">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>Id Of Result</td>
                            <td>Result output </td>

                            <td>Error Message</td>
                            <td>Id Of Audit Server</td>
                            <td>Status Of Result</td>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $key => $value)
                            <tr>
                                <td>
                                    {{$value->id}}

                                </td>
                                <td>
                                    {{$value->result}}

                                </td>
                                <td>

                                    {{$value->module}}

                                </td>
                                <td>
                                    {{-- <a class= "btn btn-dark" style="margin-bottom: 10px" href="{{ URL::to('admin/playbooks/' . $value->playbook_id) }}"> --}}
                                    {{$value->auditServer->ipAddress}}
                                    {{-- </a> --}}
                                </td>
                                <td>
                                    {{$value->status}}
                                </td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <a class="btn btn-small btn-success" href="{{ URL::to('admin/result/' . $value->id) }}">Show this Result</a>
                                </td>
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

