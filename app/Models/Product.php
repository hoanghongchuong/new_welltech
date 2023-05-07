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

    public function getProductPaginate($keySearch = '') {
        $query = $this->query();
        $data = $query->when(!empty($keySearch), function ($q) use ($keySearch) {
            return $q->where('name_vi', 'LIKE', '%' . $keySearch . '%');
        });
        return $data->orderBy('id', 'desc')->paginate(LIMIT);
    }

    public function detailProduct($id) {
        $data = $this->with('productImages')->find($id);
        return $data;
    }

    public function productImages() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
