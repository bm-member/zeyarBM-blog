@extends('admin.layouts.master')

@section('title', 'User Edit')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{-- <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3"> --}}
            <a href="{{ url('admin/user') }}" class="btn btn-secondary mb-3">
                Back
            </a>
        </div>
        <div class="col-md-12">

            @include('message.danger')

            <div class="card card-body">
                <form action="{{ url("admin/user/$user->id/update") }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>User Email</label>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                    </div> 

                    <div class="row">
                    	<div class="col-md-6">
                    		<div class="form-group">
		                        <label>Password</label>
		                        <input type="password" name="password" value="" class="form-control" placeholder="Password">
		                    </div>
                    	</div>
                    	<div class="col-md-6">
                    		<div class="form-group">
		                        <label>Role</label><br>
		                        <select class="form-control" id="role" name="role">

								    <option value="admin">admin</option>
								    <option value="author">author</option>
								    <option value="guest" selected="">guest</option>
								  </select>
		                    </div>
                    	</div>
                    </div>                      
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection