<?php

namespace App\Services\Attendances;

use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceService
{
    public static function importAttendanceExcel()
    {
        try {

            if(request()->hasfile('excel'))
            {
                Excel::import(new AttendanceImport, request()->file('excel'));
                return response()->json(
                    ['message' => 'Imported Successfully'],
                    200
                );
            }

            return response()->json(
                ['message' => 'Please upload excel file'],
                400
            );

        } catch (\Throwable $th) {

            return response()->json(
                ['message' => $th->getMessage()],
                500
            );
        }
    }
}
