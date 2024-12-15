@extends('layouts.app')

@section('Dashboard')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Category</h1>

        <!-- Form to Add Expenses -->
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category</label>
                <input type="text" class="form-control" id="categoryName" name="categoryName" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>



        <!-- List of Expenses -->
        <h2>Category type</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <form action="{{ route('category.delete', ['category' => $category->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
