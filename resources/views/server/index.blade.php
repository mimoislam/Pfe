
@extends('layouts.app')


@section('content')
@include('layouts.sidebar')
@include('layouts.navbars.navbarserver')
<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <div class="content-wrapper p-5">


    <h1>The Servers</h1>

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
                    <th>Audited</th>
                    <th>System</th>
                    <th>Status</th>
                    <th>Users</th>
        
                </tr>
            </thead>
            <tbody>
                @foreach($servers as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->ipAddress }}</td>
                        <td>
                            
                            @if(($value->audited)==1)
                            <button class="btn btn-small btn-success">
                              @else
                              <button class="btn btn-small btn-danger">
                            @endif
                        </td>
                        <td>{{ $value->system }}</td>
                        <td>@if(($value->status)=='resting')
                            <button class="btn btn-small btn-success">
                              @else
                              <button class="btn btn-small btn-danger">
                            @endif
                            
                            </td>
                        <td>
                        @if(count($value->credentials) >= 1)
        
                        
                            @php
                                $i=1
                            @endphp
                          
                         @foreach( $value->credentials as $credential)
                         
                                user  {{$i++}}
                                <hr>{{ $credential->username}} <br>
                                {{ $credential->password}}<br>
                                <hr>
                                
                            @endforeach
                        
                        @else
                               <span class="icon">-------</span>
                                
                                
                        @endif
                    </td>
                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                            <div class="d-flex align-items-start">
                            <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
        
                            <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                            <a class="btn btn-small btn-success mr-1" href="{{ URL::to('admin/servers/' . $value->id) }}">Show</a>
        
                            <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                            <a class="btn btn-small btn-info mr-1" href="{{ URL::to('admin/servers/' . $value->id . '/edit') }}">Edit</a>
                            <form  action="/admin/servers/{{$value->id}}" method="POST">
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
      </div>
      <!-- /.card-body -->
  </div>
</div>
<!-- ./wrapper -->



</div>

