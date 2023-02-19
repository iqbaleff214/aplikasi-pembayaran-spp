<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'paid_at', 'amount', 'paid_month', 'paid_year',
        'nisn', 'user_id', 'school_fee_id',
    ];

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'nisn', 'nisn');
    }

    public function staff(): HasOne
    {
        return $this->hasOne(User::class, 'id','user_id', );
    }

    public function fee(): HasOne
    {
        return $this->hasOne(SchoolFee::class, 'id','school_fee_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query, $find) {
            return $query
                ->where('nisn', $find)
                ->orWhere('paid_month', $find)
                ->orWhere('paid_year', $find);
        });
    }

    public function scopeRender($query, $search, $key)
    {
        return $query
            ->with(['staff', 'fee', 'student'])
            ->search($search)
            ->where('nisn', $key)
            ->latest()
            ->paginate(5)
            ->appends([
                'search' => $search,
            ]);
    }
}
