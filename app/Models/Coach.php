<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;
    public function Advice()
    {
        return $this->hasMany(Advice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
