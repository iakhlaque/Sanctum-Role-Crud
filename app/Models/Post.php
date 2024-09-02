<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    // Mass assignable attributes
    protected $fillable = ['title', 'body', 'user_id'];

    /**
     * Define the relationship between Post and User (many-to-one).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship between Post and Comment (one-to-many).
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
