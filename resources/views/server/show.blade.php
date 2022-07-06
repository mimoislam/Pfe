@include('layouts.sidebar')
@include('layouts.navbars.navbarplaybooks')
@extends('layouts.app')


@section('content')


<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper p-5">

    <h1>Showing Server {{ $server->id }}</h1>

    <div class="jumbotron text-center">
        <h2><strong>Ip Address:</strong> {{ $server->ipAddress }}</h2>
        <p>
            <strong>Audited:</strong> {{ $server->audited }}<br>
            <strong>System of this server :</strong> {{ $server->system }}<br>
            <strong>STATUS:</strong> {{ $server->status }}
        </p>
    </div>
        <div >


            <h1>The Users of this Server</h1>




            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>username</th>
                        <th>password</th>
                        <th>with privilege </th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($server->credentials as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->username }}</td>
                            <td>{{ $value->password }}</td>
                            <td>{{ $value->privilege }}</td>
                            <!-- we will also add show, edit, and delete buttons -->
                            <td>
                                <div class="d-flex align-items-start">
                                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                                    <a class="btn btn-small btn-success mr-1" href="{{ URL::to('admin/credentials/' . $value->id) }}">Show</a>

                                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                                    <a class="btn btn-small btn-info mr-1" href="{{ URL::to('admin/credentials/' . $value->id . '/edit') }}">Edit</a>
                                    {{--                                        <form  action="/admin/credentials/{{$value->id}}" method="POST">--}}
                                    {{--                                            @csrf--}}
                                    {{--                                            @method('delete')--}}
                                    {{--                                            <button type="submit" class=" mr-1 btn btn-small btn-danger"> Remove</button>--}}

                                    {{--                                        </form>--}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div >


            <h1>Audits </h1>




            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Scan Eng Ip Address</td>
                        <td>Status</td>
                        <td>Description</td>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($server->audits as $key => $value)
                        <tr>
                            <td><a class="btn btn-small btn-success mr-1" href="{{ URL::to('admin/audit/' . $value->id) }}">{{ $value->id }}</a></td>
                            <td> <a class="btn btn-small btn-primary" href="{{ URL::to('admin/scanEngs/' . $value->scanEng->id) }}">{{ $value->scanEng->ipAddress }}</a></td>
                            <td> {{ $value->status }}</td>
                            <td> {{ $value->description }}</td>
                            <!-- we will also add show, edit, and delete buttons -->
                            <td>
                                <div class="d-flex align-items-start">
                                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                                    <a class="btn btn-small btn-success mr-1" href="{{ URL::to('admin/audit/' . $value->id) }}">Show</a>

                                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
{{--                                    <a class="btn btn-small btn-info mr-1" href="{{ URL::to('admin/credentials/' . $value->id . '/edit') }}">Edit</a>--}}
                                    {{--                                        <form  action="/admin/credentials/{{$value->id}}" method="POST">--}}
                                    {{--                                            @csrf--}}
                                    {{--                                            @method('delete')--}}
                                    {{--                                            <button type="submit" class=" mr-1 btn btn-small btn-danger"> Remove</button>--}}

                                    {{--                                        </form>--}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div >


            <h1>Audits Server</h1>


            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>status</th>
                        <th>audit id</th>
                        <th>playbook_id</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($server->auditservers as $key => $value)
                        <tr>
                            <td><a class="btn btn-small btn-success mr-1" href="{{ URL::to('admin/auditserver/' . $value->id) }}">{{ $value->id }}</a></td>
                            <td>{{ $value->status }}</td>
                            <td>{{ $value->audit_id }}</td>
                            <td>{{ $value->playbook_id }}</td>
                            {{--                                <td>{{ $value->regex }}</td>--}}

                            <!-- we will also add show, edit, and delete buttons -->
                            <td>

                                <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                                <!-- we will add this later since its a little more complicated than the other two buttons -->

                                <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                                <div class="d-flex align-items-start">
                                    <a class="btn btn-small btn-success mr-1" href="{{ URL::to('admin/auditserver/' . $value->id) }}">Show</a>

                                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->

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
</div>


</div>
