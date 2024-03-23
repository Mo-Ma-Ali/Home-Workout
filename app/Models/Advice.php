<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    use HasFactory;
    protected $fillable=['message','trainer_id'];
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
