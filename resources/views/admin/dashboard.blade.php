@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
           
            {{-- Administrator --}}
            @if(Auth::user() && Auth::user()->role_id === 1)
                <h1>Admin Dashboard</h1>
            {{-- Author --}}
            @elseif(Auth::user() && Auth::user()->role_id === 2)
                <h1>Author Dashboard</h1>
            {{-- Subscriber --}}
            @elseif(Auth::user() && Auth::user()->role_id === 3) 
                <h1>User Dashboard</h1>
            @endif
        </div>

        @if(Auth::user() && Auth::user()->role_id === 1)
            <div class="col-md-6">
                <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-sm">Create Blog</a>    
                <a href="{{ route('admin.blogs') }}" class="btn btn-success btn-sm">Publish Blog</a>    
                <a href="{{ route('blogs.trash') }}" class="btn btn-danger btn-sm">Trash Blog</a>    
                <a href="{{ route('categories.create') }}" class="btn btn-info btn-sm">Create Categories</a>    
                <a href="{{ route('users.index') }}" class="btn btn-warning btn-sm">Manage Users</a>    
            </div>
        @endif
        @if(Auth::user() && Auth::user()->role_id === 2)
            <div class="col-md-6">
                <a href="{{ route('blogs.create') }}" class="btn btn-success btn-sm">Create Blog</a>    
                <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Create Categories</a>    
            </div>
        @endif
        @if(Auth::user() && Auth::user()->role_id === 3)
            <div class="col-md-6">
                <a href="#" class="btn btn-primary btn-sm">What can I do?</a>    
            </div>
        @endif


    </div>

@endsection
