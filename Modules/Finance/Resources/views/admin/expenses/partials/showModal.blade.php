<a type="button" href="#" data-toggle="modal" data-target="#exampleModalCenter-{{$request->id}}">
    {{$request->title ?? ''}}
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter-{{$request->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> {{ $request->title ?? ''}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.expenses.fields.title') }}
                        </th>
                        <td>
                            {{ $request->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expenses.fields.date') }}
                        </th>
                        <td>
                            {{ $request->entry_date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expenses.fields.account_name') }}
                        </th>
                        <td>
                            {{ $request->account->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expenses.fields.amount') }}
                        </th>
                        <td>
                            {{ $request->amount ?? '' }} EGP
                        </td>
                    </tr>
                    @if($request->project_id != null)

                        <tr>
                            <th>
                                {{ trans('cruds.expenses.fields.project') }}
                            </th>
                            <td>
                                {{ $request->project->{'name_'.app()->getLocale()} ?? '' }}
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <th>
                            {{ trans('cruds.expenses.fields.status') }}
                        </th>
                        <td>
                            @if($request->status == 'non_approved')
                                <a href="{{route('finance.admin.expenses.getapproved',$request->id)}}">Non Approved</a>
                            @elseif($request->status == 'unpaid')
                                <a href="{{route('finance.admin.expenses.getpaid',$request->id)}}">Unpaid</a>
                            @else
                                {{ $request->status ?? '' }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expenses.fields.notes') }}
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
