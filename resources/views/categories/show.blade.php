@extends('layouts.app')

@section('content')

    <div class="container">
      <div class="jumbotron">
        <h2>{{ $category->name }}</a></h2>
        <div class="btn-group">
          <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ route('categories.destroy', $category->id) }}" method="post">
            @method('delete')
            @csrf
              <button type="submit" class="btn btn-danger btn-sm ml-2">Delete</button>
          </form>
        </div>
      </div>
      
      <div class="col-md-12">
        @foreach ($category->blog as $blog)
          <h3><a href="{{route('blogs.show', $blog->id)}}">{{ $blog->title }}</a></h3>   
        @endforeach
      </div>
    </div>

@endsection
