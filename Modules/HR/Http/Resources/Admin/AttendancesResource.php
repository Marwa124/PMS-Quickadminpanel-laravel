<?php

namespace Modules\HR\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class attendancesResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
