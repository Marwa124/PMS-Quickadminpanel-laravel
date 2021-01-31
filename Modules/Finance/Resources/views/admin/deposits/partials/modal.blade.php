@if(count($attachments) > 0)
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter_{{$id}}">
    {{$data}}
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter_{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('cruds.deposits.fields.attachment')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($attachments)
                    <table class="table table-bordered table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>@lang('cruds.deposits.fields.name')</th>
                                <td></td>
                            </tr>
                        </thead>
                    @foreach($attachments as $attachment)
                        <tr>
                            <td>{{$attachment->name}}</td>
                            <td>
                                <a href="{{route('finance.admin.deposits.download.attach',$attachment->id)}}" target="_blank"><i
                                        class="fas fa-download"></i></a>
                                <a href="{{route('finance.admin.deposits.view.attach',$attachment->id)}}" target="_blank"><i
                                        class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif
