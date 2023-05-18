<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:categories'
        ]);
        $name = $request->input('name');
        $category = new Category();
        $category->name = $name;
        return $category->save();
    }

    public function index()
    {
        return Category::latest()->get();
    }

    public function show(Category $category)
    {
        return $category;
    }
}
