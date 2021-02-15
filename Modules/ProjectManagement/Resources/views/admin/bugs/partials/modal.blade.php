
<!-- Modal -->

    <div class="modal-dialog modal-dialog-centered modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('cruds.expenses.fields.attachment')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($attachments)
                    <table class="table table-bordered table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>@lang('cruds.expenses.fields.name')</th>
                                <td></td>
                            </tr>
                        </thead>
                    @foreach($attachments as $attachment)
                        <tr>
                            <td>{{$attachment->name}}</td>
                            <td>
                                <a href="{{route('projectmanagement.admin.bugs.download.attach',$attachment->id)}}" target="_blank"><i class="fas fa-download"></i></a>
                                <a href="{{route('projectmanagement.admin.bugs.view.attach',$attachment->id)}}" target="_blank"><i class="fas fa-eye"></i></a>
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


