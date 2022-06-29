
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
{{--                    <a class="btn btn-small btn-success" href="{{ URL::to('admin/audit/' . $value->id) }}">Show this Audit</a>--}}
                    {{ Form::open(array('url' => 'admin/audit/' . $value->id.'/auditseccess', 'method' => 'post','files'=>'true')) }}



                    <div class="form-group">
                        {{ Form::label('file', 'File') }}
                        {{ Form::file('file', Input::old('file'), array('class' => 'form-control')) }}
                    </div>



                    {{--    <div class="form-group">--}}
                    {{--        {{ Form::label('shark_level', 'shark Level') }}--}}
                    {{--        {{ Form::select('shark_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('shark_level'), array('class' => 'form-control')) }}--}}
                    {{--    </div>--}}

                    {{ Form::submit('create success audit', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}
                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->

                    @if( $value->status!=\App\Enums\AuditStatus::WORKING)
                            <a class="btn btn-small btn-info" href="{{ URL::to('admin/audit/' . $value->id . '/edit') }}">See Result of This Audit</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </x-app-layout>




