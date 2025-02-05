<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    // Field yang dapat diisi secara mass assignment
    protected $fillable = [
        'name',          // Nama siswa
        'email',         // Email siswa
        'address',       // Alamat siswa
        'grade_id',      // ID kelas siswa
        'department_id', // ID departemen siswa
    ];

    // Eager loading otomatis untuk relasi grade
    protected $with = ['grade', 'department'];

    /**
     * Relasi ke Grade
     */
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    /**
     * Relasi ke Department
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
