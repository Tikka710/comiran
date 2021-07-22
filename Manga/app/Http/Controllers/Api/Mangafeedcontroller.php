<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RakutenRws_Client;
use App\Models\Manga;
use FeedReader;

class Mangafeedcontroller extends Controller
{
    public function index(Request $request)
    {
        // $feed = FeedReader::read('');
        // dd($feed);
        $keyword = 'ドラゴンボール';
        $url = "https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404?applicationId=1064175175388514312&title={$keyword}&booksGenreId=001&size=9";
        // dd($url);
        $json = file_get_contents($url);
        // dd($json);
        $json_decode = json_decode($json, true);
        // dd($json_decode);

        $res = [];

        foreach ($json_decode['Items'] as $item) {
            $title = $item['Item']['title'];
            $ImageUrl = $item['Item']['largeImageUrl'];
            $author = $item['Item']['author'];
            
            // dd($ImageUrl);
        }

        $res[] = [
            'title' => $title,
            'ImageUrl' => $ImageUrl,
            'author' => $author,
        ];

        return $res;
        // 楽天APIを扱うRakutenRws_Clientクラスのインスタンスを作成します
        // $client = new RakutenRws_Client();

        // define("RAKUTEN_APPLICATION_ID", config('app.rakuten_id'));
        // define("RAKUTEN_APPLICATION_SEACRET", config('app.rakuten_key'));

        // $client->setApplicationId(RAKUTEN_APPLICATION_ID);
        // // dd($client);

        // // $keyword = $request->input('keyword');
        // $keyword = 'ドラゴンボール';
        // // dd($title);


        // if (!empty($keyword)) {
        //     $responce = $client->execute('BooksBookSearch', array(
        //         //入力パラメーター
        //         'keyword' => $keyword,
        //     ));
        //     // dd($responce);
        // };
        // if ($responce->isOk()) {
        //     $items = array();
        //     foreach ($response as $item) {
        //         //画像サイズを変えたかったのでURLを整形します
        //         $str = str_replace("_ex=128x128", "_ex=175x175", $item['mediumImageUrls'][0]['imageUrl']);
        //         $items[] = array(
        //             'itemName' => $item['itemName'],
        //             'itemPrice' => $item['itemPrice'],
        //             'itemUrl' => $item['itemUrl'],
        //             'mediumImageUrls' => $str,
        //         );
        //     }
        // } else {
        //     echo 'Error:'.$response->getMessage();
        // }
    }
}
