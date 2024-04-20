<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    public function Loss()
    {
        return $this->belongsToMany(Loss::class,'plan_loss');
    }
    public function exercise()
    {
        return $this->belongsToMany(Exercise::class,'plan_exercise');
    }
}
