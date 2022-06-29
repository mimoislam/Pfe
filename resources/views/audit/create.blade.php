<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/admin/audit">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="description" value="description" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" value="" required autofocus />
            </div>
            <div class="mt-4" >
                <select style="width: 100%" multiple="multiple" name="servers[]" id="servers">
                    @foreach($servers as $server)
                        <option value="{{$server->id}}"  >{{$server->ipAddress}}</option>
                    @endforeach
                </select>
            </div >


            <div class="mt-4" >
                <select style="width: 100%" name="playbooks" id="playbooks">
                    @foreach($playbooks as $playbook)
                        <option value="{{$playbook->id}}"  >{{$playbook->name}} / {{$playbook->githubUrl}}</option>
                    @endforeach
                </select>
            </div >
            <div class="mt-4" >
                <select style="width: 100%"  name="scanEngs" id="scanEngs">
                    @foreach($scanEngs as $scanEng)
                        <option value="{{$scanEng->id}}"  >{{$scanEng->ipAddress}}</option>
                    @endforeach
                </select>
            </div >

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
            <div class="flex items-center justify-end mt-4">


                <x-button class="ml-3">
                    Create PlayBook
                </x-button>
            </div>
        </form>

    </x-auth-card>
</x-guest-layout>
