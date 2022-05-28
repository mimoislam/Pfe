<h1>Permissions Dashboard </h1>
<a href="{{route('admin.roles.index')}}"> Roles </a>
<a href="{{route('admin.index')}}"> Admin Panel </a>



<table>
    @foreach ($permissions as $permission)
    <tr>
        <td>{{$permission}}</td>

    </tr>
    @endforeach>


</table>