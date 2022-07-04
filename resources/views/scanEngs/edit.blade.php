@include('layouts.sidebar')
@include('layouts.navbars.navbarscanengine')
@extends('layouts.app')


@section('content')


<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper p-5">




    <h1>Edit {{ $scanEng->ipAddress }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::model($scanEng, array('route' => array('admin.scanEngs.update', $scanEng->id), 'method' => 'PUT')) }}


    <div class="form-group">
        {{ Form::label('ipAddress', 'Ip Address') }}
        {{ Form::text('ipAddress', Input::old('ipAddress'), array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('port', 'Port') }}
        {{ Form::number('port', Input::old('port'), array('class' => 'form-control')) }}
    </div>



    {{--    <div class="form-group">--}}
    {{--        {{ Form::label('shark_level', 'shark Level') }}--}}
    {{--        {{ Form::select('shark_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('shark_level'), array('class' => 'form-control')) }}--}}
    {{--    </div>--}}

    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
</div>
</div>



</div>


