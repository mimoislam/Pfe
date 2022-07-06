
@extends('layouts.app')


@section('content')

@include('layouts.navbars.navbarserver')
@include('layouts.sidebar')
<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper p-5">

    <h1>Add User </h1>

    <!-- if there are creation errors, they will show here -->

    {{ Html::ul($errors->all()) }}

    {{ Form::open(array('url' => 'admin/credentials')) }}


    <div class="form-group">
        {{ Form::label('Username', 'username') }}
        {{ Form::text('username', Input::old(''),array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('password', 'password') }}
        {{ Form::text('password', Input::old(''), array('class' => 'form-control')) }}
    </div>
        <div class="form-group">
        {{ Form::label('privilege', 'Privilege') }}
        {{ Form::checkbox('privilege',TRUE)}}
    </div>

        <select name="server_id">
            @foreach ($servers as $key => $value)
                <option value="{{ $value->id }}"

                >{{ $value->ipAddress }}</option>
            @endforeach
        </select>
        <br>

{{--    <div class="form-group">--}}
{{--        {{ Form::label('shark_level', 'shark Level') }}--}}
{{--        {{ Form::select('shark_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('shark_level'), array('class' => 'form-control')) }}--}}
{{--    </div>--}}

    {{ Form::submit('Add User', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>


</div>
</div>

