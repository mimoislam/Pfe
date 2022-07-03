@include('layouts.sidebar')
@include('layouts.navbars.navbarserver')
@extends('layouts.app')


@section('content')


<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper p-5">



    <h1>Edit {{ $server->ipAddress }}</h1>

     <!-- will be used to show any messages -->
     @if (Session::has('message'))
     <div class="alert alert-info">{{ Session::get('message') }}</div>
 @endif


    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::model($server, array('route' => array('admin.servers.update', $server->id), 'method' => 'PUT')) }}


    <div class="form-group">
        {{ Form::label('ipAddress', 'Ip Address') }}
        {{ Form::text('ipAddress', Input::old('ipAddress'), array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('system', 'System') }}
        {{ Form::text('system', Input::old('system'), array('class' => 'form-control')) }}
    </div>



    {{--    <div class="form-group">--}}
    {{--        {{ Form::label('shark_level', 'shark Level') }}--}}
    {{--        {{ Form::select('shark_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('shark_level'), array('class' => 'form-control')) }}--}}
    {{--    </div>--}}

    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
    

    <div>
        
            <h1 class="mt-4">Users</h1>
            <hr>
        @if(count($server->credentials) >= 1)

        <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Actions</th>

            
            </tr>
        </thead>
        <tbody>
            @foreach( $server->credentials as $credential)

            <tr>
                    <td>{{ $credential->username}}  </td>
                  
                    <td>{{ $credential->password}}</td>
                  <td> 
                    <div class="d-flex align-items-start">
                    <a class="btn btn-small btn-info mr-1" href="{{ URL::to('admin/credentials/'.$credential->id.'/edit') }}">Edit</a>
                    
                    <form  action="/admin/credentials/{{$credential->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"> Remove</button>
                        
                      </form> 
                    </div>
                    
                    </td>
            </tr>     
                    
                @endforeach
            <tr><td></td><td><a class="btn btn-small btn-info"  href="{{ URL::to('admin/credentials/create/'.$server->id) }}">Add</a></td></tr>
            </tbody>
        </table>
      </div>
            
    <h5 class="mb-5">Total of users:  {{count($server->credentials)}}</h5>
    @else
    <br> <p class="ml-5">no Users</p> <br>
            
            
    @endif


    </div>
</div>



</div>
</div>

