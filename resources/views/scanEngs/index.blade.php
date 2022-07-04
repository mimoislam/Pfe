@extends('layouts.app')


@section('content')
@include('layouts.sidebar')
@include('layouts.navbars.navbarscanengine')
<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <div class="content-wrapper p-5">

    <h1>Scan Engines</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
            <th>ID</th>
            <th>ip Address</th>
            <th>Status</th>
            <th>Port</th>
            <th>Actions</th>


        </tr>
    </thead>
    <tbody>
        @foreach($scanEngs as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->ipAddress }}</td>
                <td>@if(($value->status)=='resting')
                    <button class="btn btn-small btn-success">
                      @else
                      <button class="btn btn-small btn-danger">
                    @endif
                    
                    </td>
                <td>{{ $value->port }}</td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>       
                    <div class="d-flex align-items-start">
                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                    <a class="btn btn-small btn-success mr-1" href="{{ URL::to('admin/scanEngs/' . $value->id) }}">Show</a>

                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                    <a class="btn btn-small btn-info mr-1" href="{{ URL::to('admin/scanEngs/' . $value->id . '/edit') }}">Edit</a>
                    <form  action="/admin/scanEngs/{{$value->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class=" mr-1 btn btn-small btn-danger"> Remove</button>
                        
                      </form> 
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
      <!-- /.card-body -->
    </div>
</div>
<!-- ./wrapper -->



</div>