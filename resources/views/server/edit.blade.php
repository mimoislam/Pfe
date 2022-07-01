<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('admin/servers') }}">Servers</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('admin/servers') }}">View All Servers</a></li>
            <li><a href="{{ URL::to('admin/servers/create') }}">Create a Servers</a>
        </ul>
    </nav>

    <h1>Edit {{ $server->ipAddress }}</h1>

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

    {{ Form::submit('Edit the Server', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

    <div>
       
        <h1>Users</h1><a class="btn btn-small btn-info"  href="{{ URL::to('admin/credentials/create/'.$server->id) }}">Add</a>
  
        @if(count($server->credentials) >= 1)
            
        <table class=" table  table-bordered">
            <tr>
                <td>Username</td>
                <td>Password</td>
                <td>Actions</td>

            </tr>
            @foreach( $server->credentials as $credential)

            <tr>
                    <td>{{ $credential->username}}  </td>
                  
                    <td>{{ $credential->password}}</td>
                  <td> 
                      
                    <a class="btn btn-small btn-success" href="{{ URL::to('admin/credentials/'.$credential->id.'/edit') }}">Update</a>
                    
                    <form  action="/admin/credentials/{{$credential->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"> Remove</button>
                        
                      </form> 
                    
                    
                    </td>
            </tr>     
                    
                @endforeach

            
        </table>
            
    <h5>Total of users:  {{count($server->credentials)}}</h5>
    @else
            no Users <br>
            
            
    @endif


    </div>


</div>
</body>
</html>
