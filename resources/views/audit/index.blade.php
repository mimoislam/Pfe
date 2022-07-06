@include('layouts.sidebar')
@include('layouts.topnavbar')
@extends('layouts.app')


@section('content')
<div class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <div class="content-wrapper">

        <h1 class="m-3">Audit Dashboard</h1>
        <div class="py-12 bg-white overflow-hidden shadow-sm sm:rounded-lg">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered mx-5">
        <thead class="thead-dark">
        <tr>
            <td>ID</td>
            <td>Scan Eng Ip Address</td>
            <td>Status</td>
            <td>Description</td>
            <td>servers</td>


        </tr>
        </thead>
        <tbody>
        @foreach($audits as $key => $value)

            <tr>
                <td>{{ $value->id }}</td>
                <td> <a class="btn btn-small btn-primary" href="{{ URL::to('admin/scanEngs/' . $value->scanEng->id) }}">{{ $value->scanEng->ipAddress }}</a></td>
                <td> {{ $value->status }}</td>
                <td> {{ $value->description }}</td>
                <td>
                    <ul>
                    @foreach($value->servers as $key => $value1)

                            <li>
                                <a class= "btn btn-dark" style="margin-bottom: 10px" href="{{ URL::to('admin/servers/' . $value1->id) }}">
                                    {{$value1->ipAddress}}
                                </a>
                            </li>

                    @endforeach
                    </ul>
                    </td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->

                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                <a class="btn btn-small btn-success mr-1" href="{{ URL::to('admin/audit/' . $value->id) }}">Show</a>
                    @if( $value->status!=\App\Enums\AuditStatus::WORKING)
                            <a class="btn btn-small btn-info" href="{{ URL::to('admin/audit/' . $value->id . '/edit') }}">See Result of This Audit</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
<!-- ./wrapper -->



</div>




