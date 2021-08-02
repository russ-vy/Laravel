<?php declare(strict_types=1);


namespace App\Services;


use App\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{

    public function getParsedList(string $url): array
    {
        $xml = XmlParser::load($url);
        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title',
            ],
            'link' => [
                'uses' => 'channel.link',
            ],
            'desription' => [
                'uses' => 'channel.decription',
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);
        return $data;
    }

    public function saveNewsInFile(string $url): void
    {
        $parsedList = $this->getParsedList($url);
        $serialize = json_encode($parsedList);
        $explode = explode("/", $url);
        $fileName = end($explode);

        \Storage::append('/news/' . $fileName, $serialize);
    }
}
