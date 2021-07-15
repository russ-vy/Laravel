<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    public function getNews()
    {
//        return \DB::select("select id, title, description, color, created_at from {$this->table}");
        return \DB::table($this->table)
            ->select(['id', 'title', 'slug', 'description', 'created_at'])
            ->get();
    }

    public function getNewsId(int $id)
    {
        return \DB::table($this->table)
            ->find(id);
    }
}
