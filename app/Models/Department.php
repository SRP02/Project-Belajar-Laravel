<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    // Field yang dapat diisi secara mass assignment
    protected $fillable = [
        'name', 'desc'// Nama departemen
    ];

    /**
     * Relasi ke Grades
     */
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * Relasi ke Students
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
