<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    protected $fillable=['age','weight','height','gender','user_id'];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
