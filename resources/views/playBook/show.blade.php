@include('layouts.sidebar')
@include('layouts.navbars.navbarplaybooks')
@extends('layouts.app')


@section('content')


<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper p-5">


    <h1>Showing {{ $playbook->name }}</h1>

    <div class=" ">
        <h2>{{ $playbook->name }}</h2>
        <p>
            <strong>Id :</strong> {{ $playbook->id }}<br>

            <strong>Description :</strong> {{ $playbook->description }}<br>
            <strong>system :</strong> {{ $playbook->system }}<br>
            <strong>GithubUrl :</strong> {{ $playbook->githubUrl }}<br>

        </p>
    </div>
        <div class="card-body p-0 ml-3 mr-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Number of expresions</th>

                </tr>
                </thead>
                <tbody>
                @foreach($playbook->regexs as $key => $value)
                    <tr>
                        <td>   <a class="btn btn-small btn-success" href="{{ URL::to('admin/regex/' . $value->id) }}">{{ $value->id }}</a></td>


                        <td>{{ $value->expretions->count() }}</td>

                        <!-- we will also add show, edit, and delete buttons -->

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

</div>



</div>

</div>
