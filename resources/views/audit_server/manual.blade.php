@include('layouts.sidebar')
@include('layouts.topnavbar')
@extends('layouts.app')


@section('content')
<div class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    
      <div class="content-wrapper">
    
        <h1 class="m-3">Audit Server Manual click</h1>
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
          <form action="{{ url ('admin/auditserver/'.$auditServer->id.'/manual')}}" method="POST" >

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
              <table class="table table-striped table-bordered ">
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
                          <td>
                            <input type="checkbox" id="inlineCheckbox1" name="checkbox[]" @if (($value->status==4)||($value->status==2))
                            checked=false
                            @endif value="{!! $value->id !!}"> 
                    </td>


                      </tr>
                  @endforeach
  
                  </tbody>
  
              </table>
              <button type="submit" class="btn btn-success">Save</button>

            </form>
          </p>
          </div>
      </div>
</div>
</div>
<!-- ./wrapper -->



</div>