<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->hasMany(Member::class);
    }

    public function team()
    {
        return $this->hasMany(Team::class);
    }
}
