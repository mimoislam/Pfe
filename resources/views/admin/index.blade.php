<h1>Hello Admin</h1>
<a href="{{route('admin.permissions.index')}}"> Permissions </a>
<a href="{{route('admin.roles.index')}}"> Roles </a>

<table>
    @foreach ($users as $user)
    <tr>
        <td>{{$user}}</td>

    </tr>
    @endforeach>


</table>