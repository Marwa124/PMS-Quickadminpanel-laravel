<div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> {{ trans('global.create') }} {{ trans('cruds.customerGroup.title_singular') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" action="#" id="form2">
                    @csrf
                    <div class="form-group">
                        <label class="required" for="type">{{ trans('cruds.customerGroup.fields.type') }}</label>
                        <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text"
                            name="type" id="type" value="{{ old('type', '') }}" required>

                    </div>
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.customerGroup.fields.name') }}</label>
                        <input class="form-control" type="text" name="namecustomgroup" id="namecustomgroup"
                            value="{{ old('name', '') }}" required>

                    </div>
                    <div class="form-group">
                        <label for="description">{{ trans('cruds.customerGroup.fields.description') }}</label>
                        <textarea class="form-control" name="descriptioncustomgroup"
                            id="descriptioncustomgroup"></textarea>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="customgroupsubmit">
                    {{ trans('global.save') }}</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
</div>