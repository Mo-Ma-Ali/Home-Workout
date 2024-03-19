<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Exercise extends Model
{
    use HasFactory;



    // public function level()
    // {
    //     return $this->belongsTo(Levels::class);
    // }

    public function muscle()
    {
        return $this->belongsTo(Muscle::class);
    }
}
