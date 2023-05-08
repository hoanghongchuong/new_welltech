<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'category_id',
        'price',
        'name_vi',
        'name_en',
        'slug_en',
        'slug_vi',
        'image',
        'description_vi',
        'description_en',
        'content_vi',
        'content_en',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'status'
    ];

    public function getProductPaginate($keySearch = '', $category = '') {
        $query = $this->query()->with(['category']);
        $data = $query->when(!empty($keySearch), function ($q) use ($keySearch) {
            return $q->where('name_vi', 'LIKE', '%' . $keySearch . '%');
        })->when(!empty($category), function($q) use ($category) {
            return $q->where('category_id', $category);
        });
        return $data->orderBy('id', 'desc')->paginate(LIMIT);
    }

    public function detailProduct($id) {
        $data = $this->with(['productImages'])->find($id);
        return $data;
    }


    public function productImages() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
