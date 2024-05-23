<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PropertyController;

class PropertySaved extends Model
{
    use HasFactory;
    protected $table = 'propertysaved';
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
    public $timestamps = true;
}
