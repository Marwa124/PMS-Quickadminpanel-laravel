<?php

namespace Modules\MaterialsSuppliers\Http\Repository;

use Modules\MaterialsSuppliers\Entities\Purchase;
use Illuminate\Support\Facades\DB;
use Modules\MaterialsSuppliers\Entities\ItemPurchaseTax;
class PurchaseRepository
{
    public function createPurchase($request) {

        // dd($request->all());
        $requestFilter = $request->except(['items', 'sub_total', 'taxRate_total', 'removedTax', 'AddedTax', 'supplier_id', 'user_id']);
        $supplier_id = $request->supplier_id['id'];
        $user_id = $request->user_id['user_id'];
        DB::beginTransaction();

        try {

            $purchase = Purchase::create($requestFilter);
            $purchase->update([
                'supplier_id' => $supplier_id,
                'user_id' => $user_id,
                'created_by' => auth()->user()->id
            ]);
            $requestItems = collect($request['items']);

            $itemTransformation = $requestItems->transform(function ($item) use($purchase) {

                if (array_key_exists("id",$item)){
                    unset($item['activeRowAddition']);
                    // unset($item['taxes']);

                    $purchase->items()->syncWithoutDetaching([ $item['id'] => [
                        'item_name' => $item['name'],
                        'item_description' => $item['description'],
                        'quantity' => $item['quantity'],
                        'price' => $item['total_cost_price'],
                        'total' => $item['total'],
                    ] ]);

                    foreach($item['taxes'] as $newtax){
                        $addtaxes=new ItemPurchaseTax();
                        $addtaxes->tax_id=$newtax['id'];
                        $addtaxes->purchase_id=$purchase->id;
                        $addtaxes->item_id=$item['id'];
                        $addtaxes->save();
                    }

                    return $item;
                }
            });

            DB::commit();

            return [$purchase, $itemTransformation];

        } catch (\Exception $msg) {
            DB::rollBack();
        }
    }
}
