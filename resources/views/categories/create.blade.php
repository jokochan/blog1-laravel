@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <h1>Create categories</h1>
        </div>

        <div class="col-md-12">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    {{ Form::text('name', '', ['class'=> 'form-control']) }}
                </div>
                <button type="submit" class="btn btn-primary">Create a new categories</button>
            </form>
        </div>

      </div>

@endsection
