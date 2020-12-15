<?php

namespace App\Imports;

use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Type;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class LeadsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {



        $add = new Lead([
            'client_name'     => $row[0],
            'company'     => $row[1],
            'email'     => $row[2],
            'phone1'     => $row[3],
            'phone2'     => $row[4],
            'notes'     => $row[5],

            ]);

        $add->save();


    }
}
