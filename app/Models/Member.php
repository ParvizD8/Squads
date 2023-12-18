<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $with = ['category'];

    public function scopeDivide($query, int $filters)
    {
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query
                ->where('category_id', $category)
                ->where('active', 1)           
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
