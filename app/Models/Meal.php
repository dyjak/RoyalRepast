<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $fillable = [
        'restaurant_id',
        'category_id',
        'name',
        'price',
        'image_path',
        'description',
        'description2',
    ];


    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function category()
    {
        return $this->belongsTo(Meal_category::class, 'category_id');
    }

    public function orderElements()
    {
        return $this->hasMany(Order_element::class, 'meal_id');
    }
}
