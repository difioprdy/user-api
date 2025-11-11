<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; //imported for relationship (Post belongs to User)

class Post extends Model
{
    use HasFactory;

    //Fields we can mass assign
    protected $fillable = ['user_id','title','body'];

    /**
     * Inverse relationship: a post belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
