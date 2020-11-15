<?php

namespace Modules\Payroll\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class SalaryPayslipResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
