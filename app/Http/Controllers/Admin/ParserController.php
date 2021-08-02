<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Jobs\NewsJob;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $service)
    {
        $urls = [
            'https://news.yandex.ru/internet.rss'
            , 'https://news.yandex.ru/cyber_sport.rss'
            , 'https://news.yandex.ru/movies.rss'
            , 'https://news.yandex.ru/cosmos.rss'
            , 'https://news.yandex.ru/culture.rss'
            , 'https://news.yandex.ru/fire.rss'
            , 'https://news.yandex.ru/championsleague.rss'
            , 'https://news.yandex.ru/music.rss'
            , 'https://news.yandex.ru/nhl.rss',
        ];

        foreach ($urls as $url) {
            dispatch(new NewsJob($url));
        }

        return "Даннные успешно скачаны";

//        dd($service->getParsedList('https://news.yandex.ru/army.rss'));
    }
}
