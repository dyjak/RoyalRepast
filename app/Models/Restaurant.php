<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;



    public function category()
    {
        return $this->belongsTo(Restaurant_category::class);
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
