<a type="button" href="#"  data-toggle="modal" data-target="#exampleModalCenter-{{$request->id}}">
    {{$request->from->name ?? ''}}
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter-{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> {{ $request->refrence ?? ''}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transfers.fields.from_account') }}
                        </th>
                        <td>
                            {{ $request->from_account }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfers.fields.to_account') }}
                        </th>
                        <td>
                            {{ $request->to_account ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfers.fields.amount') }}
                        </th>
                        <td>
                            {{ $request->amount ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfers.fields.payment_method') }}
                        </th>
                        <td>
                            {{ $request->payment_method->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfers.fields.date') }}
                        </th>
                        <td>
                            {!! $request->date !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfers.fields.notes') }}
                        </th>
                        <td>
                            {!! $request->notes !!}
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
