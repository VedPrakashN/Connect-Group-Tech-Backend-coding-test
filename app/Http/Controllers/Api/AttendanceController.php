<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Attendances\AttendanceService;
use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\AppHumanResource\Attendance;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee:id,emp_no,name')
            ->with('schedule:id,shift_id','schedule.shift:id,name,start_time,end_time')
            ->get();
        return response()->json(
            ['attendances' => $attendances],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'excel' => 'required|file|mimes:xlsx,csv'
        ]);

        if($validator->fails()){

            return response()->json(
                ['errors' => $validator->messages()],
                422
            );
        }

        AttendanceService::importAttendanceExcel();

    }
}
