@extends('layouts.app')


@section('content')

@include('layouts.navbars.navbarserver')
@include('layouts.sidebar')
<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper p-5">


   

    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::model($credentials, array('route' => array('admin.credentials.update', $credentials), 'method' => 'PUT')) }}


    <div class="form-group">
        {{ Form::label('username', 'username') }}
        {{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('password', 'password') }}
        {{ Form::text('password', Input::old('password'), array('class' => 'form-control')) }}
    </div>



    {{--    <div class="form-group">--}}
    {{--        {{ Form::label('shark_level', 'shark Level') }}--}}
    {{--        {{ Form::select('shark_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('shark_level'), array('class' => 'form-control')) }}--}}
    {{--    </div>--}}

    {{ Form::submit('Edit User', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

    

    </div>


</div>


</div>
</div>

