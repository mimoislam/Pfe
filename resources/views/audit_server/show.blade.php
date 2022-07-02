<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Audit Servers') }}
        </h2>
    </x-slot>
    <div class="py-12 bg-white overflow-hidden shadow-sm sm:rounded-lg">

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div  >

        <h2><strong>AuditServer ID:</strong> {{ $auditServer->id }}  </h2>
        <p>
            <strong>Status :</strong> {{ $auditServer->status }}<br>
            <strong>Scan Eng IpAddress :</strong>
            <a class="btn btn-small btn-primary" href="{{ URL::to('admin/scanEngs/' . $auditServer->audit->scanEng->id) }}">{{ $auditServer->audit->scanEng->ipAddress}}</a>
            <br>
            <strong>Result Of Servers :</strong>
        </p>
            <table class="table table-striped table-bordered mx-5">
                <thead class="thead-dark">
                <tr>

                    <td>Id Of Result</td>
                    <td>Result output </td>

                    <td>Error Message</td>
                    <td>Id Of Audit Server</td>
                    <td>Status Of Result</td>


                </tr>
                </thead>
                <tbody>
                @foreach($auditServer->results as $key => $value)

                    <tr>
                        <td>
                            {{$value->id}}

                    </td>
                        <td>
                                {{$value->result}}

                        </td>
                        <td>

                                {{$value->module}}

                        </td>
                        <td>
                            {{-- <a class= "btn btn-dark" style="margin-bottom: 10px" href="{{ URL::to('admin/playbooks/' . $value->playbook_id) }}"> --}}
                                {{$value->auditServer->ipAddress}}
                            {{-- </a> --}}
                        </td>
                        <td>
                                {{$value->status}}
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </p>
        </div>
    </div>
</x-app-layout>