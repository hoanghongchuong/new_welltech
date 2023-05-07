<?php


namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index() {
        $setting = Setting::first();
        $title = $setting->company_vi;
        $lang = Session::get('website_language');
        $equipments = Post::where('status_vi', 1)->where('type', 'equipment')->orderBy('id','desc')->get();
        $equipments->map(function ($eq) {
           $eq->img_url = $eq->image;
        });
        $posts = Post::where('status_vi', 1)->where('type', 'post')->orderBy('id','desc')->limit(3)->get();
        $posts->map(function ($post) {
            $post->img_url = $post->image;
        });


        $aboutTech = Post::where('status_vi', 1)->where('type', 'about')->orderBy('id','desc')->first();
        if($aboutTech) {
            $aboutTech->img_url = $aboutTech->image;
        }
        return view('frontend.pages.home', compact('title', 'lang', 'equipments', 'posts','aboutTech', 'setting'));
    }
    public function changeLanguage(Request $request) {
        $language = $request->language;
        Session::put('website_language', $language);
        return back();
    }



    public function news() {
        $lang = Session::get('website_language');
        $title = trans('technology_ras');
        $news = Post::where('status_vi', 1)->where('type', 'post')->orderBy('id','desc')->get();
        $news->map(function ($problem) {
            $problem->image_vi = $problem->image;
            return $problem;
        });

        $postTech = Post::where('status_vi', 1)->where('type', 'post-tech')->orderBy('id','asc')->get();

        return view('frontend.pages.technology', compact('lang', 'title', 'problems', 'solutions', 'postTech'));
    }
}
