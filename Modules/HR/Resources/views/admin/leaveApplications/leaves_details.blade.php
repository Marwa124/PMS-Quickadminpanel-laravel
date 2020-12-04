<?php $total_token = 0; ?>
<?php $total_leave_quota = 0; ?>

  <!-- Modal -->
  <div class="modal fade" id="leavesDetails{{$userId}}" tabindex="-1" role="dialog" aria-labelledby="leavesDetails{{$userId}}Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="leavesDetails{{$userId}}Title">
            Leave Details for {{$userName}}
        </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card-body">
            @foreach ($categoryDetails as $item)
            <div class="row">
                <div class="col-md-6">{{$item['name']}}</div>
                <?php $total_token += $item['check_available']['token_leaves'];?>
                <?php $total_leave_quota += $item['check_available']['category_leave_quota'];?>
                <div class="col-md-6">
                    {{$item['check_available']['token_leaves']}}
                    /{{$item['check_available']['category_leave_quota']}}</div>

            </div>
            @endforeach
        </div>
        {{-- End Card Body --}}
        <div class="card-footer" style="background-color: #ccc;">
            <div class="row">
                <div class="col-md-6">Total:</div>
                <div class="col-md-6">
                    {{$total_token}}/{{$total_leave_quota}}
                </div>
            </div>
           </div>
      </div>
    </div>
  </div>
