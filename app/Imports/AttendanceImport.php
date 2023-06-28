<?php

namespace App\Imports;

// use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use App\Models\AppHumanResource\Attendance;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttendanceImport implements ToCollection, WithHeadingRow
{
    use Importable;
    /**
    * @param Collection $collection
    */

    public function collection(Collection $collection)
    {
        foreach($collection as $row){
            $data1 = trim($row['employee_id']);
            $data2 = trim($row['schedule_id']);
            $data3 = trim($row['check_in']);
            $data4 = trim($row['check_out']);
            $data5 = trim($row['total_working_hours']);

            $attendances = collect($data1,$data2,$data3,$data4,$data5);
            if($attendances->filter()->isNotEmpty())
            {
                Attendance::create([
                    'employee_id'  => $row['employee_id'],
                    'schedule_id' => $row['schedule_id'],
                    'check_in' => date('H:i:s', strtotime($row['check_in'])),
                    'check_out' => date('H:i:s', strtotime($row['check_out'])),
                    'working_hours' => $row['total_working_hours']
                ]);
            }
        }
    }
}
