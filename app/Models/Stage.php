<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'company_name',
        'start_date',
        'end_date',
        'grade',
        'notes',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
