<?php

namespace Modules\HR\Http\Controllers\Services;

use Modules\HR\Entities\AccountDetail;

class DepartmentExportServices {

    public function dataExportedConstruct($model)
    {
        $fullArray = [];
        $designationNames = [];
        foreach ($model as $key => $depart) {
            $designationsCount = $depart->departmentDesignations;
            if ($designationsCount->count() > 0) {
                foreach ($designationsCount as $key => $value) {
                    array_push($designationNames, $value->designation_name);
                }
            }

            $designationsObj = implode(',', $designationNames);
            $userAccount = AccountDetail::where('user_id', $depart->department_head_id)->first();

            $data = [
                'id'                      => $depart->id,
                'department_name'         => $depart->department_name,
                'department_head_id'      => $userAccount ? $userAccount->fullname : '',
                'department_designations' => $designationsObj,
            ];

            array_push($fullArray, $data);
        }
        return $fullArray;
    }
}
