<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

    protected $with = ['category'];

    public function teams(): BelongsTo
    {
        return $this->belongsTo(Team::class, Toss::class, 'member_id', 'id', 'id', 'team_id');
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
