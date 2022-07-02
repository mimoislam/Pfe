<!DOCTYPE html>
<html>
<head>
    <title>PlayBooks</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/app.css">

</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('admin/servers') }}">Servers</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('admin/servers') }}">View All Servers</a></li>
            <li><a href="{{ URL::to('admin/servers/create') }}">Create a Servers</a>
        </ul>
    </nav>

    <h1>All the Servers </h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif


    <div class="card">
        <div class="card-header border-0">
          <h3 class="card-title">Products</h3>
          <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
              <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-tool btn-sm">
              <i class="fas fa-bars"></i>
            </a>
          </div>
        </div>


        <div class="card-body table-responsive p-0">
          <table class="table table-striped table-valign-middle">
            
                <thead>
                <tr>
                    <td>ID</td>
                    <td>ip Address</td>
                    <td>Audited</td>
                    <td>System</td>
                    <td>Status</td>
                    <td>credentials</td>
        
        
                </tr>
                </thead>
                <tbody>
                @foreach($servers as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->ipAddress }}</td>
                        <td>{{ $value->audited }}</td>
                        <td>{{ $value->system }}</td>
                        <td>{{ $value->status }}</td>
                        <td>
                        @if(count($value->credentials) >= 1)
        
                        
                            @php
                                $i=1
                            @endphp
                          
                         @foreach( $value->credentials as $credential)
                         
                                user  {{$i++}}
                                <hr>{{ $credential->username}} <br>
                                {{ $credential->password}}<br>
                                <hr>
                                
                            @endforeach
                        
                        @else
                               <span class="icon">Hello</span>
                                
                                
                        @endif
                    </td>
                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                            <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
        
                            <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                            <a class="btn btn-small btn-success" href="{{ URL::to('admin/servers/' . $value->id) }}">Show this Server</a>
        
                            <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                            <a class="btn btn-small btn-info" href="{{ URL::to('admin/servers/' . $value->id . '/edit') }}">Edit this Server</a>
        
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        
        </div>
      </div>


    
</div>



</body>

</html>




