<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyApply extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $fillable = [
        'id',
        'property_id',
        'user_id',
        'property_title',
        'property_city',
        'property_type',
 
        'property_price',
        'property_image',
    
        
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

    public $timestamps = true;
}
