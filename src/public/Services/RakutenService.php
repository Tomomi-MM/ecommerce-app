<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RakutenService
{
    protected $baseUrl = 'https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706';

    public function searchItems($keyword, $options = [])
    {
        // リクエストパラメータを設定
        $params = array_merge([
            'applicationId' => env('RAKUTEN_API_KEY'),
            'keyword' => $keyword,
            'format' => 'json', // データ形式
        ], $options);

        // HTTPリクエストを送信
        $response = Http::get($this->baseUrl, $params);

        // エラーチェック
        if ($response->failed()) {
            throw new \Exception('Failed to connect to Rakuten API');
        }

        return $response->json();
    }
}
