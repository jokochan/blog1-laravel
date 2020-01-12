@extends('layouts.app')

@section('content')
@include('partials.tinymce')

    <div class="container">
        <div class="jumbotron">
            {{-- <h1>Edit blog</h1> --}}
            <h1>Edit | {{$blog->title}}</h1>
        </div>

        <div class="col-md-12">
            <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                {{-- or --}}
                {{-- {{ method_field('patch') }} --}}
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    {{ Form::text('title', $blog->title, ['class'=> 'form-control']) }}
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    {{-- {!! Form::textarea('body', $blog->body, ['class'=> 'form-control', 'cols'=> '30', 'rows'=>'10']) !!} --}}
                    <textarea name="body" class="form-control my-editor">{{ $blog->body }} </textarea>
                </div>

                <div class="form-group form-check form-check-inline">
                    <div class="mr-3">
                        {{ $blog->category->count() ? 'Current Categories: ' : '' }}
                    </div>
                    @foreach ($blog->category as $cat)
                        <input type="checkbox" name="category_id[]" value="{{$cat->id}}" class="form-check-input" checked>
                        <label class="form-check-label pr-4">{{$cat->name}}</label>  
                    @endforeach
                </div>

                <div class="form-group form-check form-check-inline">
                    <div class="mr-3">
                        {{ $filtered->count() ? 'Unused Categories: ' : '' }}
                    </div>
                    @foreach ($filtered as $cat)
                        <input type="checkbox" name="category_id[]" value="{{$cat->id}}" class="form-check-input">
                        <label class="form-check-label pr-4">{{$cat->name}}</label>  
                    @endforeach
                </div>

                <div class="form-group">
                    <label class="btn btn-default">
                        <span class="btn btn-outline btn-sm btn-info">Featured Image</span>
                        <input type="file" name="featured_image" class="form-control" hidden>
                    </label>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Update blog</button>
                </div>
            </form>
        </div>


    </div>

@endsection
