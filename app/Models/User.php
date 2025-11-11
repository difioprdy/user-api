<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post; //Import Post model for relationship

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //Fields we can mass assign (create/update)
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * One-to-many relationship: a user has many posts
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
