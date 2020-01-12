@extends('layouts.app')

@section('content')

{{-- include tinymcs --}}
@include('partials.tinymce')

    <div class="container">
        <div class="jumbotron">
            <h1>Create a new blog</h1>
        </div>

        <div class="col-md-12">
            <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                
                @include('partials.error-message')

                {{-- bila ditemukan error --}}
                {{-- @if(count($errors)) 
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li style="list-style-type: none;">{{$error}}</li>
                        @endforeach
                    </div>
                @endif --}}

                @csrf
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" class="form-control my-editor">{!! old('body') !!}</textarea>
                </div>
                <div class="form-group form-check form-check-inline">
                 @foreach($categories as $category)
                   <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
                   <label class="form-check-label pr-4">{{ $category->name }}</label>
                 @endforeach
                </div>
                <div class="form-group">
                   <label class="btn btn-default">
                    <span class="btn btn-outline btn-sm btn-info">Featured Image</span>
                    <input type="file" name="featured_image" class="form-control" hidden>
                  </label>
                </div>
                {{-- <div class="form-group">
                    <label for="featured_image">Featured Image</label>
                    <input type="file" name="featured_image" class="form-control">
                </div> --}}
                
                {{-- <div class="form-group">
                    <label for="title">Title</label>
                    {{ Form::text('title', '', ['class'=> 'form-control']) }}
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    {!! Form::textarea('body', '', ['class'=> 'form-control', 'cols'=> '30', 'rows'=>'10']) !!}
                </div>

                <div class="form-group form-check form-check-inline">
                    @foreach ($categories as $cat)
                        <input type="checkbox" name="category_id[]" value="{{$cat->id}}" class="form-check-input">
                        <label class="form-check-label pr-4">{{$cat->name}}</label>  
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="featured_image">Featured Image</label>
                    <input type="file" name="featured_image" class="form-control">
                </div> --}}

                <div>
                    <button type="submit" class="btn btn-primary mt-3">Create a new blog</button>
                </div>
            </form>
        </div>


    </div>

@endsection
