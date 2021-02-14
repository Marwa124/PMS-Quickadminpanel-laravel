
<a href="#" data-toggle="modal" data-target="#exampleModalCenter-{{$request->id}}"><i
        class="fas fa-eye"></i></a>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter-{{$request->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> {{ $request->added_by->accountDetail->fullname ?? ''}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.settlement.fields.invoice_number') }}
                        </th>
                        <td>
                            {{ $request->invoice_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settlement.fields.date') }}
                        </th>
                        <td>
                            {{ $request->date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settlement.fields.amount') }}
                        </th>
                        <td>
                            {{ $request->amount ?? '' }} EGP
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.settlement.fields.description') }}
                        </th>
                        <td>
                            {!! $request->description ?? '' !!}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.settlement.fields.status') }}
                        </th>
                        <td>

                            @if ((auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') )&& $request->added_by->id != auth()->user()->id)
                            @if ($request->settlement_status == 'pending')

                            <a href="{{route('finance.admin.settlement.getapproved', $request->id) }}" title="getapproved"> {{ trans('cruds.settlement.fields.accepted')}}</a>
                            <a href="{{route('finance.admin.settlement.getrejected', $request->id) }}" title="getrejected"> {{ trans('cruds.settlement.fields.rejected')}}</a>


                            @else
                           {{trans('cruds.settlement.fields.' . $request->settlement_status)}}
                            @endif
                            @else
                            {{trans('cruds.settlement.fields.' . $request->settlement_status)}}
                            @endif



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
