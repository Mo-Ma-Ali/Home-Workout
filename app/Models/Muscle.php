<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Monolog\Level;

class Muscle extends Model
{
    use HasFactory;
    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
    public function levels()
    {
        return $this->belongsTo(Level::class);
    }
}
