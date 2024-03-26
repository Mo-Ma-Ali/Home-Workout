<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class challenge extends Model
{
    protected $fillable=[
        'Challenge_name',
        'Description',
        'end_at'
    ];
    use HasFactory;
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
        ->withPivot('start_at', 'completed_at', 'done')
        ->withTimestamps();
    }
}
