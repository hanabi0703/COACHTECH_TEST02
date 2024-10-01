<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'image', 'description'];

public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%')->orWhere('price', 'like', '%' . $keyword . '%');
        }
    }

    public function seasons(): BelongsToMany
    {
        return $this->belongsToMany(Season::class)->withTimestamps()->withPivot('season_id');
    }
}
