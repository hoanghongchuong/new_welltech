<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_vi', 'name_en','slug_vi', 'slug_en', 'parent_id', 'type'
    ];

    public function getAllCategory($type = '')
    {
        $data = $this->when(!empty($type), function($q) use ($type) {
           return $q->where('type', $type);
        });
        return $data->get();
    }

    public function getCategoryPaginate($type)
    {
        $query = $this->where('type', $type)->paginate(20);
        return $query;
    }
}
