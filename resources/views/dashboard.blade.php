@extends('layouts.app')

@section('Dashboard')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Expenses Dashboard</h1>

        <!-- Category Filter Form -->
        <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <div class="row row-cols-2 g-4">
            <div class="d-flex">
                <div class="card flex-grow-1 pt-4" id="showTotalExpenses">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <h2>Total Expenses</h2>
                        </div>

                        <!-- Display Total Amount -->
                        <h3 class="d-flex justify-content-center align-items-center">RM {{ number_format($sum, 2) }}</h3>
                    </div>
                </div>
            </div>
            <div>
                <!-- Form to Add Expenses -->
                <form action="{{ route('expenses.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Expense</button>
                </form>
            </div>
        </div>

       <!-- List of Expenses -->
<h2>Recent Expenses</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Description</th>
            <th>Category</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($expenses as $expense)
            <tr>
                <td>{{ $expense->title }}</td>
                <td>RM{{ number_format($expense->amount, 2) }}</td>
                <td>{{ $expense->date }}</td>
                <td>{{ $expense->description }}</td>
                <td>{{ $expense->category->name }}</td>
                <td>
                    <a href="{{ route('expenses.edit', ['expense' => $expense->id]) }}" class="btn btn-warning">Edit</a>

                    <form action="{{route('expenses.delete',['expense'=>$expense->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$expenses->links()}}

    </div>
@endsection
