@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.purchase.title_singular') }}
    </div>

    <purchase-form
        :purchase-id="{{$purchase['id']}}"
        :purchase="{{ json_encode($purchase) }}"
        :supplier-purchase= "{{ json_encode($supplierPurchase) }}"
        :user-purchase= "{{ json_encode($userPurchase) }}"
        :item-purchase= "{{ json_encode($itemPurchase) }}"
        :item-tax-purchase= "{{ json_encode($itemTaxPurchase) }}"
        :lang-key={{json_encode(app()->getLocale())}}>
    </purchase-form>

</div>

@endsection
