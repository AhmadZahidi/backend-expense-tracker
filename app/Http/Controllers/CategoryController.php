<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('category',['categories'=>$categories]);
    }

    public function store(Request $request)
{
    $request->validate([
        'categoryName' => 'required|string|max:100',
    ]);

    // Create the category
    Category::create([
        'name' => $request->categoryName,
    ]);

    return redirect()->route('category')->with('success', 'Category added successfully!');
}

}
