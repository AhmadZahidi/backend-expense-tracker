@extends('layouts.app')

@section('Dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Expenses Dashboard</h1>

    <!-- Form to Add Expenses -->
    <form action="{{ route('expenses.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Expense</button>
    </form>

    <!-- List of Expenses -->
    <h2>Recent Expenses</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td>{{ $expense->title }}</td>
                    <td>${{ number_format($expense->amount, 2) }}</td>
                    <td>{{ $expense->date }}</td>
                    <td>{{ $expense->category->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
