@extends('common.master')
@section('title', 'All Role')
@section('content')

<div class="page-title">
    <div class="row gutters">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('home') }}">
                            <i class="icon-area-graph"></i>
                        </a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Role Management
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            {{-- <h5 class="title">Jobs Posted</h5> --}}
            
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="daterange-container">
                <div class="date-range">
                </div>
                @can('role-create')            
                    <a href="{{ route('roles.create') }}" data-toggle="tooltip" data-placement="top" title="Create New Role"
                        class="download-reports" data-original-title="Create New Role">
                        <i class="icon-plus"></i>
                    </a>
                @endcan
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                @if ($errors->any())
                    <center>
                        <div class="alert alert-danger">
                            <button style="color: white" type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                &times;
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </center>
                @endif
                
                <div class="card-body">
                    <div class="row gutters">
                        <table class="table table-bordered">
                            <tr>
                               <th>No</th>
                               <th>Name</th>
                               <th width="280px">Action</th>
                            </tr>
                              @foreach ($roles as $key => $role)
                              <tr>
                                  <td>{{ ++$i }}</td>
                                  <td>{{ $role->name }}</td>
                                  <td>
                                      <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">Show</a>
                                      @can('role-edit')
                                          <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                      @endcan
                                      @can('role-delete')
                                          {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                          {!! Form::close() !!}
                                      @endcan
                                  </td>
                              </tr>
                              @endforeach
                          </table>
                          
                          
                          {!! $roles->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>

<script>
    function delete_method(id) {
        event.preventDefault();
        if (confirm('Are You Sure, You Want To Delete ??')) {
            document.getElementById('form' +
                id).submit();
        }
    }
</script>
<!-- Content wrapper end -->
@endsection