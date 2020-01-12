@extends('layouts.app')

{{-- @include('partials.meta_dynamic') --}}

@section('content')

  <div class="container">
    <h3>{{ $user->name }}'s recent blogs</h3>
    <p>Role: {{ $user->role->name }}</p>
    <hr>
    {{-- <hr class="mt-1 mb-3"> --}}
    
    @foreach ($user->blogs as $blog)
      {{-- <h4><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h4> --}}
      <h4><a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h4>
    @endforeach

  </div>

@endsection
