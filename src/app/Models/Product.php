<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

public function scopeKeywordSearch($query, $keyword)
    {
    if (!empty($keyword)) {
        $query->where('name', 'like', '%' . $keyword . '%')->orWhere('price', 'like', '%' . $keyword . '%');
    }
    }
}
