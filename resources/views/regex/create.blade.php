@include('layouts.sidebar')
@include('layouts.navbars.navbarplaybooks')
@extends('layouts.app')


@section('content')
    <div class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <div class="content-wrapper p-5">

                <h1 >Regex Dashboard</h1>

                <!-- will be used to show any messages -->
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif


                <!-- if there are creation errors, they will show here -->
    <form action="{{ url ('admin/regex')}}" method="POST">

        @csrf



        @if ($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif



        @if (Session::has('success'))

            <div class="alert alert-success text-center">

                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                <p>{{ Session::get('success') }}</p>

            </div>

        @endif

        <select name="playbook_id" id="playbook_id">
            @foreach($playbooks as $item )
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>

        <table class="table table-bordered" id="dynamicTable">

            <tr>

                <th>Expretions</th>



                <th>Action</th>

            </tr>

            <tr>

                <td><input type="text" name="expretions[0]" placeholder="Enter your Name" class="form-control" /></td>



                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>

            </tr>

        </table>



        <button type="submit" class="btn btn-success">Save</button>

    </form>

</div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">


        var i = 0;



        $("#add").click(function(){



            ++i;



            $("#dynamicTable").append('<tr><td><input type="text" name="expretions['+i+']" placeholder="Enter your Name" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

        });



        $(document).on('click', '.remove-tr', function(){

            $(this).parents('tr').remove();

        });


    </script> <!-- ./wrapper -->




