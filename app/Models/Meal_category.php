<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal_category extends Model
{
    use HasFactory;


    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
