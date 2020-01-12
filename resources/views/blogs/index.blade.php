@extends('layouts.app')

@include('partials.meta_static')

@section('content')

    <div class="container">

        @if(Session::has('blog_created_message'))
            <div class="alert alert-success">
                {{Session::get('blog_created_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif

        @foreach ($blogs as $blog)
            <div class="col-md-8 offset-md-2 text-center">
                {{-- <h2><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h2>     --}}
                <h2><a href={{ route('blogs.show', [$blog->slug]) }}>{{ $blog->title }}</a></h2>    

                <div class="clo-md-12">
                    @if($blog->featured_image)
                        <img src="/images/{{$blog->featured_image ? $blog->featured_image : ''}} " alt="{{ Str::limit($blog->featured_image, 20) }}" class="img-responsive featured_image" style="width:300px; height: auto;">
                    @endif
                </div>
                
                <div class="lead">
                    {!! str_limit($blog->body, 200) !!}  
                </div>

                {{-- if blog has a user --}}
                @if($blog->user)
                   {{-- Author: <a href="{{ route('users.show', $blog->user) }}">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHumans() }}  --}}
                   Author: <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHumans() }} 
                @endif
                <hr class="mb-4 mt-1">
            </div>
        @endforeach
    </div>

@endsection
