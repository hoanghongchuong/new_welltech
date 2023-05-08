<?php


namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Product;
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
        $products = Product::where('status', 1)->orderBy('id', 'desc')->limit(20)->get();
        $products->map(function ($eq) {
            $eq->img_url = $eq->image;
        });
        $aboutTech = Post::where('status_vi', 1)->where('type', 'about')->orderBy('id','desc')->first();
        if($aboutTech) {
            $aboutTech->img_url = $aboutTech->image;
        }
        return view('frontend.pages.home', compact('title', 'lang', 'equipments', 'posts','aboutTech', 'setting', 'products'));
    }
    public function changeLanguage(Request $request) {
        $language = $request->language;
        Session::put('website_language', $language);
        return back();
    }

}
