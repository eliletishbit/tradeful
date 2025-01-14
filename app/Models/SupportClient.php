<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportClient extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message', 'resolved'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
