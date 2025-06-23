<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'birth_date',
        'address',
        'city',
        'state',
        'zip_code',
        'notes',
        'active'
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function classes()
    {
        return $this->belongsToMany(ClassRoom::class, 'enrollments', 'student_id', 'class_id')
                    ->withPivot('enrollment_date', 'status', 'notes')
                    ->withTimestamps();
    }
}