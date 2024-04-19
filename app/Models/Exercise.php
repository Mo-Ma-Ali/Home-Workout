<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Exercise extends Model
{
    use HasFactory;
    protected $fillable = ['Level_id', 'category_id', 'name', 'description', 'date', 'video'];
    public function plan()
    {
        return $this->belongsToMany(Plan::class);
    }
    public function  UserFa()
    {
        return $this->belongsToMany(User::class);
    }
    public function challenges()
    {
        return $this->belongsToMany(Challenge::class);
    }
    public function level()
    {
        return $this->belongsTo(Levels::class);
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cate::class);
    }
}
