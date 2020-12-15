<?php

namespace App\Imports;

use Modules\Sales\Entities\Call;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class CallsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
dd(gmdate("Y-m-d\TH:i:s\Z", $row[1]));
//        dd(strtr($row[1], '/', '-'));
//        dd(Carbon::createFromTimestamp($row[1])->format('m-d-Y'));
        dd($row);
        $add = new Call([
            'call_by'     => $row[0],
            'date'     => $row[1],
            'note'     => $row[2],
            'next_action'     => $row[3],
            'next_action_date'     => $row[4],
            'call'     => $row[5],
            'qualification'     => $row[6],
            'result_id'     => $row[7],
            'lead_id'     => $row[8],


        ]);

        $add->save();
    }
}
