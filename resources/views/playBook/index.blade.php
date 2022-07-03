@include('layouts.sidebar')
@include('layouts.topnavbar')
@extends('layouts.app')


@section('content')
<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <div class="content-wrapper">

    <h1 class="m-3">Playbooks Dashboard</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <!-- /.card-header -->
    <div class="card-body p-0 ml-3 mr-5">
        <table class="table table-striped">
          <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>System</th>
                <th>GitHub Url</th>
                <th>Creator</th>
            </tr>
          </thead>
          <tbody>
            @foreach($playbooks as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->system }}</td>
                <td>{{ $value->githubUrl }}</td>
                <td>{{ $value->user->name }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('admin/playbooks/' . $value->id) }}">Show this shark</a>

                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('admin/playbooks/' . $value->id . '/edit') }}">Edit this shark</a>

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

