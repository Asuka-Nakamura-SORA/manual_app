<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category');
    }

    public function store(Request $request)
    {
        $cotegory = new Category;
        $cotegory->name = $request->name;
        $cotegory->save();
        return redirect()->route('category.create');
    }
}
