<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('id', 'desc')
//            ->with('news')
            ->paginate(10);

        return view('category.index', [
            'categoryList' => $category
        ]);
    }

    public function show(int $id)
    {
        return "Категория c id = $id";
    }
}
