<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function index() {
        $lang = Session::get('website_language');
        $post = Post::where('status_vi', 1)->where('type', 'about')->orderBy('id','desc')->first();
        $post->image_vi = $post->image;
        $viewData = [
            'title' => trans('about_us'),
            'breadcrumbData' => [
                0 => [
                    'active' => 'active',
                    'title' => trans('about_us')
                ]
            ],
            'post' => $post,
            'lang' => $lang,
        ];
        return view('frontend.pages.about', $viewData);
    }

    public function detail($slug) {
        $item = Post::where('slug_vi', $slug)->where('type', 'about')->first();
        $lang = Session::get('website_language');
        $title = isset($item['name_'.$lang]) ? $item['name_'.$lang] : '';
        return view("frontend.pages.detail_about", compact('item', 'title', 'lang'));
    }
}
