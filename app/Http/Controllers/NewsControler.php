<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsControler extends Controller
{
    public function index()
    {
        $news = News::orderBy('id', 'desc')
            ->with('category')
            ->paginate(10);

        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        return "Новость c id = $id";
    }
}
