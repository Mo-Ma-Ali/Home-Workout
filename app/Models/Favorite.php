<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['user_id','exercise_id','deleted_at'];
    public function User()
    {
        return $this->belongsToMany(User::class);
    }

}
