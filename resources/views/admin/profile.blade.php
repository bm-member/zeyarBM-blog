@extends('admin.layouts.master')

@section('title')
    {{ $user->name }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <a href="{{ url('admin') }}" class="btn btn-secondary mb-3">
                Back
            </a>
            <div class="card">
                <div class="card-header">                    
                </div>
                <div class="card-body">
                	<div class="text-center">
                	<img src="{{ asset($user->image ) }}" alt=""  style="width: 200px;">                		
                	</div>
                <p class="text-center">                	
                	{{ $user->name }}<br>
                    {{ $user->email }}<br>                	
                    <b> {{ $user->role }} </b>
                </p>
                </div>
                <div class="card-footer">
                    Created at <b>{{ $user->created_at->diffForHumans() }}</b>
                </div>
            </div>
        </div>
    </div>
@endsection

