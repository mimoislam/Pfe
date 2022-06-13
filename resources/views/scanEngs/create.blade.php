
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

    <h1>Create a shark</h1>

    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::open(array('url' => 'admin/scanEngs')) }}


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

    {{ Form::submit('Create the Scan Engine', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>

{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="/admin/playbook">--}}
{{--            @csrf--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="name" value="name" />--}}

{{--                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4"  hidden>--}}

{{--                <x-input id="user_id" class="block mt-1 w-full"--}}
{{--                         name="user_id"--}}
{{--                         :value="Auth::user()->id"--}}

{{--                />--}}
{{--            </div>--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="githubUrl" value="GitHub Url" />--}}

{{--                <x-input id="githubUrl" class="block mt-1 w-full"--}}
{{--                         type="text"--}}
{{--                         name="githubUrl"--}}
{{--                />--}}
{{--            </div>--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="description" value="Description" />--}}

{{--                <x-input id="description" class="block mt-1 w-full"--}}
{{--                         type="text"--}}
{{--                         name="description"--}}
{{--                />--}}
{{--            </div>--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="system" value="System" />--}}

{{--                <x-input id="system" class="block mt-1 w-full"--}}
{{--                         type="text"--}}
{{--                         name="system"--}}
{{--                />--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-end mt-4">--}}


{{--                <x-button class="ml-3">--}}
{{--                    Create PlayBook--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}

{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}
