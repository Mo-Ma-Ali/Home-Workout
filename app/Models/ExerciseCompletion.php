<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ExerciseCompletion extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','exercise_id','is_done'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function exercises()
    {
       return $this->BelongsToMany(Exercise::class);
    }
    public function Progress()
    {
        return $this->belongsTo(Progress::class);
    }
}
