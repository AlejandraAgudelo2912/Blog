<?php

namespace App\Models;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body','publish_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'user_id');
    }
    //protected $table = 'articles';//si le camniamos el nombre en la base de datos a posts a articles con nombrarla aqi sobra.
}
