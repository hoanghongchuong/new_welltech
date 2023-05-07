<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewController extends Controller
{
    public function news()
    {
        $lang = Session::get('website_language');
        $news = Post::where('status_vi', 1)->where('type', 'post')->orderBy('id', 'desc')->get();
        $news->map(function ($problem) {
            $problem->image_vi = $problem->image;
            return $problem;
        });


        $viewData = [
            'title' => trans('news'),
            'breadcrumbData' => [
                0 => [
                    'active' => 'active',
                    'title' => trans('news')
                ]
            ],
            'news' => $news,
            'lang' => $lang,
        ];
        return view('frontend.pages.news', $viewData);
    }

    public function detail($slug)
    {
        $lang = Session::get('website_language');
        $news = Post::where('status_vi', 1)->where('type', 'post')->where('slug_vi', $slug)->first();
        $news->image_vi = $news->image;
        $viewData = [
            'title' => $news['name_ '. $lang],
            'breadcrumbData' => [
                0 => [
                    'link' => '',
                    'title' => trans('news')
                ],
                1 => [
                    'link' => '',
                    'title' => $news['name_'.$lang]
                ]
            ],
            'news' => $news,
            'lang' => $lang,
        ];
        return view('frontend.pages.news_detail', $viewData);
    }
}
