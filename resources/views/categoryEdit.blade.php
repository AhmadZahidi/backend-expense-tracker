@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- This makes the form send a PUT request -->

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>

</div>
@endsection
