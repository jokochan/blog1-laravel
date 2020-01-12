@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <h1>Trashed Blogs</h1>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12">
            @foreach ($trashedBlogs as $blog)
                <h2>{{ $blog->title }}</h2>    
                <p>{{ $blog->body }}</p>    
                
                <div class="btn-group">
                    {{-- restore --}}
                    <form action="{{ route('blogs.restore', $blog->id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm pull-left">
                            Restore
                        </button>
                    </form>
                    {{-- permanent delete --}}
                    <form action="{{ route('blogs.permanent-delete', $blog->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm pull-left ml-2">
                            Permanent Delete
                        </button>
                    </form>
                </div>
            @endforeach
                    
        </div>
    </div>


    

@endsection
