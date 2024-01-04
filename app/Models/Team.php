<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Team extends Model
{
    use HasFactory;

    public function members(): HasManyThrough
    {
        return $this->hasManyThrough(Member::class, Toss::class, 'team_id', 'id', 'id', 'member_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function toss()
    {
        return $this->hasMany(Toss::class);
    }
}
