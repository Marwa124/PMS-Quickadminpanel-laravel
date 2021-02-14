<label class="required" for="project_id">{{ trans('cruds.invoice.fields.project') }}</label>
<select class="form-control  {{ $errors->has('project_id') ? 'is-invalid' : '' }}"
        name="project_id"
        id="project_id" required>
    <option value="" selected="">{{trans('global.pleaseSelect')}}</option>
    @foreach($projects as $project)
        <option value="{{$project->id}}">{{$project->{'name_'.app()->getLocale()} ?? ''}}</option>
    @endforeach
</select>
@if($errors->has('project_id'))
    <div class="invalid-feedback">
        {{ $errors->first('project_id') }}
    </div>
@endif
<span class="help-block">{{ trans('cruds.proposal.fields.Related_To_helper') }}</span>