@include('layouts.sidebar')
@include('layouts.navbars.permissionnavbar')
@extends('layouts.app')


@section('content')

<div class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    
      <div class="content-wrapper">
    
        <h1 class="m-3">Permissions Dashboard</h1>
    
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
                    <th>Peemission</th>
                    <th>Created at</th>   
                </tr>
            </thead>
            <tbody>


                @foreach ($permissions as $permission)
                <tr>
                    <td>{{$permission->id}}</td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->created_at}}</td>
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