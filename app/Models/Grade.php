<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['grade_name', 'skill_competency'];

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function($query, $find) {
            return $query
                ->where('grade_name', 'LIKE', $find . '%')
                ->orWhere('skill_competency', 'LIKE', '%' . $find . '%');
        });
    }

    public function scopeRender($query, $search)
    {
        return $query
            ->search($search)
            ->paginate(5)
            ->appends([
                'search' => $search,
            ]);
    }
}
