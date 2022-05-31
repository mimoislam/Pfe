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
            <a class="navbar-brand" href="{{ URL::to('admin/playbooks') }}">Playbooks</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('admin/playbooks') }}">View All Playbooks</a></li>
            <li><a href="{{ URL::to('admin/playbooks/create') }}">Create a Playbook</a>
        </ul>
    </nav>

    <h1>Edit {{ $playbook->name }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::model($playbook, array('route' => array('admin.playbooks.update', $playbook->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>



    <div class="form-group">
        {{ Form::label('system', 'System') }}
        {{ Form::text('system',null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('githubUrl', 'Github Url') }}
        {{ Form::text('githubUrl', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Playbook!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>
