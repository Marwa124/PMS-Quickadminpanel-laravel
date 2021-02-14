<a href="#" data-toggle="modal" data-target="#deductionModal-{{$request->id}}"><i
        class="fas fa-money"></i></a>

<!-- Modal -->
<div class="modal fade" id="deductionModal-{{$request->id}}" tabindex="-1" role="dialog"
     aria-labelledby="deductionModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLongTitle"> {{ $request->added_by->accountDetail->fullname ?? ''}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.petty_cash.fields.reference_no') }}
                        </th>
                        <td>
                            {{ $request->reference_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petty_cash.fields.date') }}
                        </th>
                        <td>
                            {{ $request->date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petty_cash.fields.amount') }}
                        </th>
                        <td>
                            {{ $request->amount ?? '' }} EGP
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.petty_cash.fields.approved_by') }}
                        </th>
                        <td>
                            {{ $request->approve_by->accountDetail->fullname ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.petty_cash.fields.deduction_value') }}
                        </th>
                        <td>
                            <form method="POST" action="{{ route('finance.admin.petty_cash.deduction',$request->id)}}">
                                @csrf
                                <input type="number"  name="deduction_value" value="{{old('deduction_value',$request->deduction_value)}}">

                                <button type="submit" class="btn btn-secondary"> {{ trans('global.save') }}</button>

                            </form>
                        </td>
                    </tr>


                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
