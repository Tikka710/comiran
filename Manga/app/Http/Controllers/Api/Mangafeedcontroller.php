<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RakutenRws_Client;
use App\Models\Manga;

class Mangafeedcontroller extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $isKeyword = Manga::where('title', 'like', '%'.$keyword.'%')->first();
            // dd($isKeyword);
            if (!isset($isKeyword)) {
                $RakutenUrl = "https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404?applicationId=1064175175388514312&title={$keyword}&booksGenreId=001&size=9";
                // dd($RakutenUrl);
                // if (!$RakutenUrl) {
                //     return responce()->json([
                //         'message' => 'Manga not found.'
                //     ], 404);
                // }

                $opts = [
                'http' => [
                    'method' => 'GET',
                    'header' => 'user-agent:MyUserAgent'
                ]
                ];
                $json = file_get_contents($RakutenUrl, false, stream_context_create($opts));
                // $json = file_get_contents($RakutenUrl);
                $json_decode = json_decode($json, true);
        
                $res = [];
        
                foreach ($json_decode['Items'] as $item) {
                    $title = $item['Item']['title'];
                    $ImageUrl = $item['Item']['largeImageUrl'];
                    $source_url = $item['Item']['itemUrl'];
                    
                    $res[] = [
                        'title' => $title,
                        'ImageUrl' => $ImageUrl,
                        'itemUrl' => $source_url,
                    ];
                }
                // dd($res);
    
                // return $res;
        
                foreach ($res as $i) {
                    $manga = new Manga;
                    $manga->title = $i['title'];
                    $manga->img_url = $i['ImageUrl'];
                    $manga->source_url = $i['itemUrl'];
                    $manga->save();
                };
                
                $getmanga = Manga::where('title', 'like', '%'.$keyword.'%')->get();
                // dd($getmanga);
                foreach ($getmanga as $item) {
                    $id = $item->id;
                    $title = $item->title;
                    $ImageUrl = $item->img_url;
                    $source_url = $item->source_url;
    
                    $result[] = [
                        'id' => $id,
                        'alt' => $title,
                        'src' => $ImageUrl,
                        'source_url' => $source_url
                    ];
                };
                // dd($result);
                return $result;
            } else {
                $getmanga = Manga::where('title', 'like', '%'.$keyword.'%')->get();

                foreach ($getmanga as $item) {
                    $id = $item->id;
                    $title = $item->title;
                    $ImageUrl = $item->img_url;
                    $source_url = $item->source_url;
    
                    $result[] = [
                        'id' => $id,
                        'alt' => $title,
                        'src' => $ImageUrl,
                        'source_url' => $source_url
                    ];
                };

                return $result;
            }

            

            // dd($result);
        }
    }
}
