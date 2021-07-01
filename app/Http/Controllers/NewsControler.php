<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsControler extends Controller
{
    public function index()
    {
        return view('news.index', [
            'newsList' => $this->getNews()
        ]);
    }

    public function show(int $id)
    {
        return "Новость c id = $id";
    }
}
