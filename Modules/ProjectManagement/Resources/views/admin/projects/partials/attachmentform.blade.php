<input type="hidden" name="project_id" value="{{$project->id }}">
<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
<div class="form-group">
   <label class="required" for="name">{{ trans('cruds.taskAttachment.fields.name') }}</label>
   <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
   @if($errors->has('name'))
       <div class="invalid-feedback">
           {{ $errors->first('name') }}
       </div>
   @endif
   <span class="help-block">{{ trans('cruds.taskAttachment.fields.name_helper') }}</span>
</div>

<div class="form-group">
       <label for="attachments">{{ trans('cruds.expenses.fields.attachments') }}</label>
       <div class="needsclick  dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}"
           id="attachments-dropzone">
       </div>
       @if($errors->has('attachments'))
           <div class="invalid-feedback">
               {{ $errors->first('attachments') }}
           </div>
       @endif
</div>
<div class="form-group">
   <label for="description">{{ trans('cruds.taskAttachment.fields.description') }}</label>
   <textarea class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
   @if($errors->has('description'))
       <div class="invalid-feedback">
           {{ $errors->first('description') }}
       </div>
   @endif
   <span class="help-block">{{ trans('cruds.taskAttachment.fields.description_helper') }}</span>
</div>