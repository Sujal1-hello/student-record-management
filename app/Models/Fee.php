<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fee extends Model
{
    protected $fillable = [
        'student_id',
        'academic_year',
        'grade',
        'fee_type',
        'total_amount',
        'discount',
        'paid_amount',
        'remaining_amount',
        'payment_date',
        'payment_method',
        'payment_status',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}