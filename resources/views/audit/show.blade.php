
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Audits') }}
        </h2>
    </x-slot>
    <div class="py-12 bg-white overflow-hidden shadow-sm sm:rounded-lg">

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div  >

        <h2><strong>Audit ID:</strong> {{ $audit->id }}  </h2>
        <p>
            <strong>Description :</strong> {{ $audit->description }}<br>
            <strong>Status :</strong> {{ $audit->status }}<br>
            <strong>Scan Eng IpAddress :</strong>
            <a class="btn btn-small btn-primary" href="{{ URL::to('admin/scanEngs/' . $audit->scanEng->id) }}">{{ $audit->scanEng->ipAddress}}</a>
            <br>
            <strong>Result Of Servers :</strong>
        </p>
            <table class="table table-striped table-bordered mx-5">
                <thead class="thead-dark">
                <tr>

                    <td>Server Ip Address</td>
                    <td>Status of audit (Working = notFinished)</td>
                    <td>Playbook Executed</td>


                </tr>
                </thead>
                <tbody>
                @foreach($audit->servers as $key => $value)

                    <tr>
                        <td>
                            <a class= "btn btn-dark" style="margin-bottom: 10px" href="{{ URL::to('admin/servers/' . $value->id) }}">
                                {{$value->ipAddress}}
                            </a>
                        </td>
                        <td>
                                {{$value->status}}
                        </td>
                        <td>
                            <a class= "btn btn-dark" style="margin-bottom: 10px" href="{{ URL::to('admin/playbooks/' . $value->playbook_id) }}">
                                {{$value->id}}
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </p>
        </div>
    </div>
</x-app-layout>




