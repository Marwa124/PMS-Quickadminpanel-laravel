<?php

namespace Modules\HR\Http\Traits;

use Illuminate\Support\Facades\Validator;

trait DataViewer{

    public function scopeSearchPaginateOrder($query)
    {
        $request = app()->make('request');

        $v = Validator::make($request->only([
            'column', 'direction', 'per_page',
            'search_input'
        ]), [
            'column'    => 'alpha_dash|in:'.implode(',', self::$searchable),
            'direction' => 'in:asc,desc',
            'per_page'  => 'integer',
            'search_input' => 'max:255',
        ]);

        if($v->fails()){
            dd($v->messages());
        }

        return $query
            ->orderBy($request->column, $request->direction)
            ->where(function($query) use ($request){
                if ($request->search_input != '') {
                    foreach (self::$searchable as $key => $value) {
                        $query->orWhere($value,  'LIKE', '%' . $request->search_input . '%');
                    }
                }

            })
            ->paginate($request->per_page);
    }

}
