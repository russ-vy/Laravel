<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $news;
    protected array $category;

    protected function getNews(): array
    {
        $faker = Factory::create('ru_RU');

        for($i = 0; $i < 5; $i++)
        {
            $this->news[] = [
                    'title' => 'Новость ' . ($i + 1)
                    ,'description' => $faker->text(100)
            ];
        }

        return $this->news;
    }

    protected function getCategory(): array
    {
        $faker = Factory::create('ru_RU');

        for($i = 0; $i < 5; $i++)
        {
            $this->category[] = [
                'title' => 'Каткгория ' . ($i + 1)
                ,'description' => $faker->text(50)
            ];
        }

        return $this->category;
    }
}
