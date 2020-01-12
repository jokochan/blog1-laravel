@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <h1>Edit categories</h1>
        </div>

        <div class="col-md-12">
            <form action="{{ route('categories.update', $category->id) }}" method="post">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    {{ Form::text('name', $category->name, ['class'=> 'form-control']) }}
                </div>
                <button type="submit" class="btn btn-primary">Edit categories</button>
            </form>
        </div>

      </div>

@endsection
