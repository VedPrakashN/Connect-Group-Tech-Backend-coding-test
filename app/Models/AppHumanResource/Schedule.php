<?php

namespace App\Models\AppHumanResource;

use App\Models\AppHumanResource\Shift;
use Illuminate\Database\Eloquent\Model;
use App\Models\AppHumanResource\Employee;
use App\Models\AppHumanResource\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'localtion_id',
        'employee_id',
        'shift_id',
        'date',
    ];

    protected $dates = [
        'date'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'localtion_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id', 'id');
    }
}
