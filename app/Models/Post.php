<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'user_id'];
    // protected $guarded = ['id'];
    //relationship b/w post and user
    public function user()
    {
        return $this->belongTo(User::class);
    }
}
