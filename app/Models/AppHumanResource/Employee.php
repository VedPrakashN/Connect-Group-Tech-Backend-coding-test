<?php

namespace App\Models\AppHumanResource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'emp_no',
        'name',
        'job',
        'date_of_joining',
    ];

    protected $dates = [
        'date_of_joining'
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employee_id', 'id');
    }

}
