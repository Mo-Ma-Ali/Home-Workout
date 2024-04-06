<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $fillable=['user_id','Current_weight','age','height','gender','Calories','Time_to_reach_the_specified_weight','Target_weight'];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
