<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'restaurant_category_id',
        'logo_path',
        'ratings',
        'email',
        'phone',
        'city',
        'postal_code',
        'street',
        'address',
    ];

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    public function couriers()
    {
        return $this->hasMany(Courier::class);
    }

    public function category()
    {
        return $this->belongsTo(Restaurant_category::class, 'restaurant_category_id');
    }
}
