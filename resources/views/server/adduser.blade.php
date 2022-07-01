
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

    <h1>Add User </h1>

    <!-- if there are creation errors, they will show here -->

    {{ Html::ul($errors->all()) }}

    {{ Form::open(array('url' => 'admin/credentials')) }}


    <div class="form-group">
        {{ Form::label('Username', 'username') }}
        {{ Form::text('username', Input::old(''),array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('password', 'password') }}
        {{ Form::text('password', Input::old(''), array('class' => 'form-control')) }}
    </div>

    <input type="hidden" id= "server_id" name="server_id" value="{{$server_id}}">
    


{{--    <div class="form-group">--}}
{{--        {{ Form::label('shark_level', 'shark Level') }}--}}
{{--        {{ Form::select('shark_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('shark_level'), array('class' => 'form-control')) }}--}}
{{--    </div>--}}

    {{ Form::submit('Add User', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>

