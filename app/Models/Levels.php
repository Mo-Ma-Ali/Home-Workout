<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    protected $fillable = [
        'level'
    ];
    use HasFactory;
    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
    public function WorkoutCompletion()
    {
        return $this->hasMany(WorkoutCompletion::class);
    }
}
