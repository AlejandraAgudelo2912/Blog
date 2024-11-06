<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body','user_id'];
    //protected $table = 'articles';//si le camniamos el nombre en la base de datos a posts a articles con nombrarla aqi sobra.

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
