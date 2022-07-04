@include('layouts.sidebar')
@include('layouts.topnavbar')
@extends('layouts.app')


@section('content')
<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <div class="content-wrapper">

    <h1 class="m-3">Regex Dashboard</h1>

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
                <th>Playbook Id</th>
                <th>Number of expresions</th>

            </tr>
          </thead>
          <tbody>
            @foreach($regexs as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('admin/playbooks/' . $value->playbook_id) }}">{{ $value->playbook_id }}</a>
                    </td>

                <td>{{ $value->expretions->count() }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('admin/regex/' . $value->id) }}">Show this Regex</a>

                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('admin/regex/' . $value->id . '/edit') }}">Edit this Regex</a>

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

