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
            <a class="navbar-brand" href="{{ URL::to('admin/playbooks') }}">Playbooks</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('admin/playbooks') }}">View All Playbooks</a></li>
            <li><a href="{{ URL::to('admin/playbooks/create') }}">Create a Playbook</a>
        </ul>
    </nav>

    <h1>All the sharks</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>System</td>
            <td>GitHub Url</td>
            <td>user Who Create this Playbook</td>

        </tr>
        </thead>
        <tbody>
        @foreach($playbooks as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->system }}</td>
                <td>{{ $value->githubUrl }}</td>
                <td>{{ $value->user_id }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('admin/playbooks/' . $value->id) }}">Show this shark</a>

                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('admin/playbooks/' . $value->id . '/edit') }}">Edit this shark</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>




