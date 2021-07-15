<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    public function getCategories()
    {
//        return \DB::select("select id, title, description, color, created_at from {$this->table}");
        return \DB::table($this->table)
            ->select(['id', 'title', 'description', 'created_at'])
            ->get();
    }

    public function getCategoryId(int $id)
    {
        return \DB::table($this->table)
            ->find(id);
    }
}
