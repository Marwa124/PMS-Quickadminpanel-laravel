<?php

namespace Modules\MaterialsSuppliers\Http\Repository;

use Modules\MaterialsSuppliers\Entities\Purchase;

class PurchaseRepository
{
    public function createPurchase($request) {
        $requestFilter = $request->except(['items', 'sub_total', 'taxRate_total', 'removedTax', 'AddedTax', 'supplier_id', 'user_id']);
        $supplier_id = $request->supplier_id['id'];
        $user_id = $request->user_id['user_id'];

        // dd($request->all());

        $purchase = Purchase::create($requestFilter);
        $purchase->update([
            'supplier_id' => $supplier_id,
            'user_id' => $user_id,
            'created_by' => auth()->user()->id
        ]);

        $requestItems = collect($request['items']);

        $requestItems->shift();

        $itemTransformation = $requestItems->transform(function ($item) use($purchase) {

            unset($item['activeRowAddition']);
            unset($item['taxes']);

            $purchase->items()->syncWithoutDetaching([ $item['id'] => [
                'item_name' => $item['name'],
                'item_description' => $item['description'],
                'quantity' => $item['quantity'],
                'price' => $item['total_cost_price'],
                'total' => $item['total'],
            ] ]);

            return $item;
        });

        return [$purchase, $itemTransformation];
    }
}
