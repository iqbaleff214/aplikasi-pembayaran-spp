<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'nisn';

    protected $fillable = [
        'nisn', 'nis', 'name', 'address', 'phone',
        'grade_id', 'school_fee_id',
    ];

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    public function fee(): BelongsTo
    {
        return $this->belongsTo(SchoolFee::class, 'school_fee_id', 'id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query, $find) {
            return $query
                ->where('name', 'LIKE', $find . '%')
                ->orWhere('nisn', $find)
                ->orWhere('nis', $find);
        });
    }

    public function scopeRender($query, $search)
    {
        return $query
            ->with(['grade', 'fee'])
            ->search($search)
            ->paginate(5)
            ->appends([
                'search' => $search,
            ]);
    }
}
