@extends('admin.layouts.master')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <a href="{{ url('admin/category') }}" class="btn btn-secondary mb-3">
                Back
            </a>
            <div class="card">
                <div class="card-header">
                   <h1> {{ $category->name }}</h1>
                </div>
                <div class="card-body">                
                <p>
                    {{ $category->description }}
                </p>
                </div>
                <div class="card-footer">
                    Posted by {{ $category->user->name }} on <b>{{ $category->created_at->diffForHumans() }}</b>
                </div>
            </div>
        </div>
    </div>
@endsection

