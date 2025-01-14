<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signaux extends Model
{
    use HasFactory;
    protected $table = 'signaux'; 

    protected $fillable = ['title', 'entry_price', 'stop_loss', 'sl', 'be', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
