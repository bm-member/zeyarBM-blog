@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <a href="{{ url('admin/user/create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus-circle"></i> New User
                </a>
            </div>
            <div class="card">
                <div class="card-header">

                    <h3 class="card-title">User</h3>
            
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 350px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
            
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Total Post</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>                                
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{count($user->posts)}}</td>
                                <td>
                                    <a href="{{url('admin/'.$user->id.'/profile')}}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="{{url('admin/user/'.$user->id.'/edit')}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{url('admin/user/'.$user->id.'/delete')}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>   
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

@endsection