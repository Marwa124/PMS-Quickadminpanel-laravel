@if(count($attachments) > 0)
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    {{$data}}
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('cruds.transfers.fields.attachment')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($attachments)
                    <table class="table table-bordered table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>@lang('cruds.transfers.fields.name')</th>
                                <td></td>
                            </tr>
                        </thead>
                    @foreach($attachments as $attachment)
                        <tr  class="delete-media-{{$attachment->id}}">
                            <td>{{$attachment->name}}</td>
                            <td>
                              <a href="#"  onclick="delete_media({{$attachment->id}})"><i
                                        class="fas fa-trash-alt"></i> </a>
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
