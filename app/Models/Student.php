<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Student extends Model
{
    protected $fillable = [
    'student_id',
    'roll_no',
    'name',
    'email',
    'phone',
    'date_of_birth',
    'gender',
    'course',
    'semester',
    'grade',
    'section',
    'academic_year',
    'father_name',
    'father_phone',
    'father_occupation',
    'mother_name',
    'mother_phone',
    'mother_occupation',
    'guardian_name',
    'guardian_phone',
    'guardian_relation',
];  

public function fees(): HasMany
{
    return $this->hasMany(Fee::class);
}

}