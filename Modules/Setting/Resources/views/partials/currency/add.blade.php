<div class="modal fade card-custom card" id="addCurrency" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">


        <div class="modal-content card-custom card">


            <div class="modal-header card-header">
                <h4 class="modal-title"> {{ trans('settings.from_items') }}
                </h4>


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>


           <div class="modal-body ">
            <form onsubmit="return event.keyCode == 13 ? alert('enter') : true;" role="form" id="from_items_curreny" action="{{ route('admin.currency.store') }}" method="post" class=" form-groups-bordered">
                <div class="row">
                    <label class="col-lg-3 control-label">Code</label>
                    <div class="col-lg-7">
                        <input  type="text" class="form-control" placeholder="@lang('settings.please_enter_currency_code')" name="code">
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-3 control-label">Name </label>
                    <div class="col-lg-7">
                        <input  type="text" class="form-control" placeholder="@lang('settings.please_enter_currency_name')" name="name">
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-3 control-label">Symbol </label>
                    <div class="col-lg-7">
                        <input  type="text" class="form-control" placeholder="@lang('settings.please_enter_currency_symbol')" name="symbol">
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-7">
                        <button type="submit" class="btn btn-primary" formaction="{{ route('admin.currency.store') }}"> @lang('settings.save')</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('settings.close')</button>
                    </div>
                </div>
            </form>

        </div>

          
        </div>
        <!-- /.modal-content -->
    </div>
  </div>
