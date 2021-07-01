<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'newsCategory' => $this->getCategory()
        ]);
    }

    public function show(int $id)
    {
        return "Категория c id = $id";
    }
}
