@extends('layouts.app')

@section('content')

    <div class="container">

        @foreach ($categories as $cat)
            <h2><a href="{{ route('categories.show', $cat->slug) }}">{{ $cat->name }}</a></h2>            
        @endforeach

    </div>

@endsection
