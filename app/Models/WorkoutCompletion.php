<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutCompletion extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'Level_id',
        'category_id',
        'is_done',
    ];

    public function level()
    {
        return $this->belongsTo(Levels::class);
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cate::class);
    }
}
