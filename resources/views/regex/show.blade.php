@include('layouts.sidebar')
@include('layouts.topnavbar')
@extends('layouts.app')


@section('content')
    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <div class="content-wrapper">

                <h1 class="m-3">Regex Dashboard</h1>
                <div class="py-12 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <!-- will be used to show any messages -->
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <div  >

                        <h2><strong>Regex ID:</strong> {{ $regex->id }}  </h2>
                        <p>
                            <strong>Playbook Id :</strong>
                            <a class="btn btn-small btn-primary" href="{{ URL::to('admin/playbooks/' . $regex->playbook_id ) }}">{{ $regex->playbook_id }}</a>
                            <br>
                            <strong>Expresions :</strong>
                        </p>
                        <table class="table table-striped table-bordered mx-5">
                            <thead class="thead-dark">
                            <tr>

                                <td>Id  Expresion</td>
                                <td>Expresion  </td>
                                <td>Step</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($regex->expretions as $key => $value)

                                <tr>
                                    <td>
                                        {{$value->id}}

                                    </td>
                                    <td>
                                        {{$value->expretion}}

                                    </td>
                                    <td>

                                        {{$value->order}}

                                    </td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./wrapper -->



    </div>
