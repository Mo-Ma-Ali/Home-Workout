<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use League\CommonMark\Extension\CommonMark\Node\Block\ThematicBreak;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function Progress()
    {
        return $this->hasMany(Progress::class);
    }
    public function Details()
    {
        return $this->hasOne(detail::class);
    }
    public function Favorite()
    {
        return $this->belongsToMany(Exercise::class,'user_exercise');
    }
    public function coach()
    {
     return $this->hasOne(Coach::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    public function advices()
    {
        return $this->hasMany(Advice::class);
    }
    public function challenges()
    {
        return $this->belongsToMany(Challenge::class)
        ->withPivot('start_at', 'completed_at', 'done')
        ->withTimestamps();
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'code',
        'expire_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function createCode()
    {
        $this->timestamps=false;
        $this->code = rand(1000,9999);
        $this->expire_at=now()->addMinute(15);
        $this->save();
    }
}
