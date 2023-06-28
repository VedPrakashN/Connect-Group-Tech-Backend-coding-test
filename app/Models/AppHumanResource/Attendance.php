<?php

namespace App\Models\AppHumanResource;

use Illuminate\Database\Eloquent\Model;
use App\Models\AppHumanResource\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = [
        'employee_id',
        'schedule_id',
        'check_in',
        'check_out',
        'working_hours',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }

}
