<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = ['topic', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
