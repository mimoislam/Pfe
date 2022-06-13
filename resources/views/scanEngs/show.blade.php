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
            <a class="navbar-brand" href="{{ URL::to('admin/scanEngs') }}">Scan Engines</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('admin/scanEngs') }}">View All Scan Engines</a></li>
            <li><a href="{{ URL::to('admin/scanEngs/create') }}">Create a Scan Engines</a>
        </ul>
    </nav>

    <h1>Showing Scan Engine  {{ $scanEng->id }}</h1>

    <div class="jumbotron text-center">
        <h2><strong>Ip Address:</strong>  {{ $scanEng->ipAddress }}</h2>
        <p>
            <strong>PORT:</strong> {{ $scanEng->port }}<br>
            <strong>STATUS:</strong> {{ $scanEng->status }}
        </p>
    </div>

</div>
</body>
</html>
