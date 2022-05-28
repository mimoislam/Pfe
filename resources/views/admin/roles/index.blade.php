<h1>Roles Dashboard</h1>

<a href="{{route('admin.permissions.index')}}"> Permissions </a>

<a href="{{route('admin.index')}}"> Admin Panel </a>


<table>
    @foreach ($roles as $role)
    <tr>
        <td>{{$role}}</td>

    </tr>
    @endforeach>


</table>