@extends('layouts.app')

@include('partials.meta_dynamic')

@section('content')

{{-- @section('meta_title'){{$blog->meta_title}}@endsection
@section('meta_description'){{$blog->meta_description}}@endsection --}}

    <div class="container">

        <article>
            <div class="jumbotron">

                <div class="clo-md-12">
                    @if($blog->featured_image)
                        <img src="/images/{{$blog->featured_image ? $blog->featured_image : ''}} " alt="{{ Str::limit($blog->featured_image, 20) }}" class="img-responsive featured_image">
                    @endif
                </div>

                <div class="col-md-12">
                    <h1>{{ $blog->title }}</h1>
                </div>

                @if(Auth::user())
                    @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2 && Auth::user()->id === $blog->user_id)
                        <div class="col-md-12">
                            <div class="btn-group">
                                <a class="btn btn-info btn-sm pull-left" href="{{ route('blogs.edit', $blog->id) }}">Edit </a>
                                <form action="{{ route('blogs.delete', $blog->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm pull-left ml-2">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endif
            </div>

            <div class="col-md-12">
                {!! $blog->body !!}
                {{-- if blog has a user --}}
                @if($blog->user)
                    Author: <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHumans() }} 
                @endif
                <hr class="mb-4 mt-1">
                <strong>Categories: </strong>
                @foreach ($blog->category as $category)
                    <span><a href="{{ route('categories.show', $category->slug) }}"> {{$category->name}}</a></span>
                @endforeach

            </div>
        </article>

        <hr>

    <aside>
        <div id="disqus_thread"></div>
            <script>
                (function() {
                    var d = document, s = d.createElement('script');
                    // s.src = 'https://EXAMPLE.disqus.com/embed.js';
                    s.src = 'https://mytuts.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
    </aside>

</div>
@endsection
