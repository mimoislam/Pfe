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

    <h1>Showing Server {{ $server->id }}</h1>

    <div class="jumbotron text-center">
        <h2><strong>Ip Address:</strong> {{ $server->ipAddress }}</h2>
        <p>
            <strong>Audited:</strong> {{ $server->audited }}<br>
            <strong>System of this server :</strong> {{ $server->system }}<br>
            <strong>STATUS:</strong> {{ $server->status }}
        </p>
    </div>

</div>
</body>
</html>
