<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muscle extends Model
{
    use HasFactory;
    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
    public function Level()
    {
        return $this->belongsTo(Levels::class);
    }
}
