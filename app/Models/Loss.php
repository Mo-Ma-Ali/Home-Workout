<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loss extends Model
{
    use HasFactory;
    public function Plan()
    {
        return $this->belongsToMany(Plan::class);
    }
}
