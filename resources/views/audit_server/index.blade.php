@include('layouts.sidebar')
@include('layouts.navbars.navbarplaybooks')
@extends('layouts.app')


@section('content')
    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <div class="content-wrapper p-5">

                <h1 >Audit Server Dashboard</h1>

                <!-- will be used to show any messages -->
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>status</th>
                            <th>audit id</th>
                            <th>server_id</th>
                            <th>playbook_id</th>
                            <th>ipAddress</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auditServers as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->status }}</td>
                                <td>{{ $value->audit_id }}</td>
                                <td>{{ $value->server_id }}</td>
                                <td>{{ $value->playbook_id }}</td>
                                <td>{{ $value->ipAddress }}</td>
{{--                                <td>{{ $value->regex }}</td>--}}

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>

                                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                                    <div class="d-flex align-items-start">
                                        <a class="btn btn-small btn-success mr-1" href="{{ URL::to('admin/playbooks/' . $value->id) }}">Show</a>

                                        <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                                        <a class="btn btn-small btn-info mr-1" href="{{ URL::to('admin/playbooks/' . $value->id . '/edit') }}">Edit</a>
                                        <form  action="/admin/playbooks/{{$value->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class=" mr-1 btn btn-small btn-danger"> Remove</button>

                                        </form>
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
        <!-- ./wrapper -->



    </div>

