@include('layouts.sidebar')
@include('layouts.navbars.navbarplaybooks')
@extends('layouts.app')


@section('content')


<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper p-5">


    <h1>Edit the  {{ $playbook->name }}</h1>

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



</div>
</div>

