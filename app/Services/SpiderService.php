<?php


namespace App\Services;


use App\Models\Article;

class SpiderService
{
    private $url = 'https://www.qiushibaike.com/';
    private $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $this->url,
            'timeout'  => 5
        ]);
    }

    public function crawling()
    {
        $response = $this->client->get("text", [
            'headers' => [
                'Host'       => 'www.qiushibaike.com',
                'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36'
            ]
        ]);

        $html = $response->getBody()->getContents();

        $pattern = '/<img src="\/\/(p.*)" alt="(.*)">/';
        preg_match_all($pattern, $html, $users_array);
        $pattern2 = '/<span>(\n)+(.*)(\n)+<\/span>/';
        preg_match_all($pattern2, $html, $articles_array);
        $avatar_url_array = $users_array[1];
        $user_nickname_array = $users_array[2];
        $article_array = $articles_array[2];

        while (count($article_array) !== count($avatar_url_array)) {
            array_pop($avatar_url_array);
            array_pop($user_nickname_array);
        }

        try {
            foreach ($article_array as $key => $item) {
                Article::query()->create([
                    'name'    => $user_nickname_array[$key],
                    'avatar'  => $avatar_url_array[$key],
                    'content' => $article_array[$key],
                ]);
            }
        } catch (\Exception $exception) {
            EmailService::send('error', $exception->getMessage());
            return;
        }

//        EmailService::send();

    }

}