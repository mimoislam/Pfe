<!DOCTYPE html>
<html>
<head>
    <title>PlayBooks</title>
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

    <h1>All the Scan Engines</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>ip Address</td>
            <td>Status</td>
            <td>Port</td>


        </tr>
        </thead>
        <tbody>
        @foreach($scanEngs as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->ipAddress }}</td>
                <td>{{ $value->status }}</td>
                <td>{{ $value->port }}</td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('admin/scanEngs/' . $value->id) }}">Show this Scan Engine</a>

                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('admin/scanEngs/' . $value->id . '/edit') }}">Edit this Scan Engine</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>




