<?php

namespace App\Imports;

use Modules\Sales\Entities\FinalResult;
use Maatwebsite\Excel\Concerns\ToModel;

class FinalresultssImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//        dd($row[4]);
        $add = new Finalresult([
            'ceo_comment'     => $row[0],
            'note'     => $row[1],
            'status'     => $row[2],
            'sub_status'     => $row[3],
            'lead_id'     => $row[4],

        ]);

        $add->save();
    }
}
