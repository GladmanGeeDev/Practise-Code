<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'city',
        'type',
        'category_id',
        'image',
        'price',
        'status',
    ];

    public function category()
{
    return $this->belongsTo(Category::class);
}
}
