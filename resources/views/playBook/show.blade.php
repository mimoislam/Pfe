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

    <h1>Showing {{ $playbook->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $playbook->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $playbook->email }}<br>
            <strong>Level:</strong> {{ $playbook->shark_level }}
        </p>
    </div>

</div>
</body>
</html>
