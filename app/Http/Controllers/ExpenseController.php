<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    // Display the dashboard with expense data
    public function dashboard()
    {
        $expenses = Expense::with('category')->get();
        $categories = Category::all();

        return view('dashboard', compact('expenses', 'categories'));
    }


    // Store a new expense
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:100',
            'amount'      => 'required|numeric',
            'date'        => 'required|date',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Expense::create([
            'title'       => $request->title,
            'amount'      => $request->amount,
            'date'        => $request->date,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Expense added successfully!');
    }

}
