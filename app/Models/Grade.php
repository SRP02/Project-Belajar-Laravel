<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasFactory;

    // Field yang dapat diisi secara mass assignment
    protected $fillable = [
        'name',          // Nama grade
        'department_id', // ID departemen
    ];

    /**
     * Relasi ke Students
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    /**
     * Relasi ke Department
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
