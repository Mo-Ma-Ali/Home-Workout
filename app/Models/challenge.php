<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class challenge extends Model
{
    protected $fillable=['exercise_id'];
    use HasFactory;
    public function exercise()
    {
        return $this->hasMany(Exercise::class);
    }
}
