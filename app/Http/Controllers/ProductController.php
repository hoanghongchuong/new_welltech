<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(Request $request) {
        $lang = Session::get('website_language');
        $products = Product::where('status', 1);
        $cate = $request->get('cate');
        if(!empty($cate)) {
            $category = Category::where('slug_vi', $cate)->first();
            $products->where('category_id', $category->id);
        }
        $products = $products->orderBy('id', 'desc')->paginate(12);
        $products->withQueryString();

        $categories = Category::get();
        $viewData = [
            'title' => trans('product'),
            'breadcrumbData' => [
                0 => [
                    'active' => 'active',
                    'title' => trans('product')
                ]
            ],
            'products' => $products,
            'categories' => $categories,
            'lang' => $lang,
            'cate' => $cate,
        ];
        return view('frontend.pages.product_list', $viewData);
    }

    public function detail($slug) {
        $lang = Session::get('website_language');
        $product = Product::where('slug_vi', $slug)->first();
        $setting = Setting::first();
        $viewData = [
            'title' => trans('product'),
            'breadcrumbData' => [
                0 => [
                    'link' => '/san-pham',
                    'title' => trans('product')
                ],
                1 => [
                    'active' => 'active',
                    'title' => $product['name_'.$lang]
                ]
            ],
            'product' => $product,
            'lang' => $lang,
            'setting' => $setting,
        ];
        return view('frontend.pages.product_detail', $viewData);
    }
}
