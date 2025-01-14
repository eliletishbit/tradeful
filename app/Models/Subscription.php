<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // Relation avec les utilisateurs
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
