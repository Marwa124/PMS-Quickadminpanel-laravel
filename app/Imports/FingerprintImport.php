<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Modules\HR\Entities\FingerprintAttendance;

class FingerprintImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dd($row);
        return new FingerprintAttendance([
            'id' => $row[0],
            'user_id' => $row[1],
            'date' => $row[2],
            'time' => $row[3],
        ]);
    }
}
