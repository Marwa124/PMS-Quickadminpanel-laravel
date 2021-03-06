@extends('layouts.admin')

@section('styles')
    <style>
        input[type=range] {
            height: 35px;
            -webkit-appearance: none;
            margin: 10px 0;
            width: 100%;
        }
        input[type=range]:focus {
            outline: none;
        }
        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 10px;
            cursor: pointer;
            animate: 0.2s;
            box-shadow: 1px 1px 1px #000000;
            background: #3071A9;
            border-radius: 5px;
            border: 1px solid #000000;
        }
        input[type=range]::-webkit-slider-thumb {
            box-shadow: 1px 1px 1px #000000;
            border: 1px solid #000000;
            height: 27px;
            width: 17px;
            border-radius: 11px;
            background: #FFFFFF;
            cursor: pointer;
            -webkit-appearance: none;
            margin-top: -9.5px;
        }
        input[type=range]:focus::-webkit-slider-runnable-track {
            background: #3071A9;
        }
        input[type=range]::-moz-range-track {
            width: 100%;
            height: 10px;
            cursor: pointer;
            animate: 0.2s;
            box-shadow: 1px 1px 1px #000000;
            background: #3071A9;
            border-radius: 5px;
            border: 1px solid #000000;
        }
        input[type=range]::-moz-range-thumb {
            box-shadow: 1px 1px 1px #000000;
            border: 1px solid #000000;
            height: 27px;
            width: 17px;
            border-radius: 11px;
            background: #FFFFFF;
            cursor: pointer;
        }
        input[type=range]::-ms-track {
            width: 100%;
            height: 10px;
            cursor: pointer;
            animate: 0.2s;
            background: transparent;
            border-color: transparent;
            color: transparent;
        }
        input[type=range]::-ms-fill-lower {
            background: #3071A9;
            border: 1px solid #000000;
            border-radius: 10px;
            box-shadow: 1px 1px 1px #000000;
        }
        input[type=range]::-ms-fill-upper {
            background: #3071A9;
            border: 1px solid #000000;
            border-radius: 10px;
            box-shadow: 1px 1px 1px #000000;
        }
        input[type=range]::-ms-thumb {
            margin-top: 1px;
            box-shadow: 1px 1px 1px #000000;
            border: 1px solid #000000;
            height: 27px;
            width: 17px;
            border-radius: 11px;
            background: #FFFFFF;
            cursor: pointer;
        }
        input[type=range]:focus::-ms-fill-lower {
            background: #3071A9;
        }
        input[type=range]:focus::-ms-fill-upper {
            background: #3071A9;
        }


    </style>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.task.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("projectmanagement.admin.tasks.update", [$task->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="required" for="name_en">{{ trans('cruds.task.fields.name_en') }}</label>
                    <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', $task->name_en) }}" required>
                    @if($errors->has('name_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_en') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.name_en_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name_ar">{{ trans('cruds.task.fields.name_ar') }}</label>
                    <input class="form-control {{ $errors->has('name_ar') ? 'is-invalid' : '' }}" type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', $task->name_ar) }}" required>
                    @if($errors->has('name_ar'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_ar') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.name_ar_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="description_en">{{ trans('cruds.task.fields.description_en') }}</label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description_en" id="description_en">{{ old('description_en', $task->description_en) }}</textarea>
                    @if($errors->has('description_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description_en') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.description_en_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="description_ar">{{ trans('cruds.task.fields.description_ar') }}</label>
                    <textarea class="form-control {{ $errors->has('description_ar') ? 'is-invalid' : '' }}" name="description_ar" id="description_ar">{{ old('description_ar', $task->description_ar) }}</textarea>
                    @if($errors->has('description_ar'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description_ar') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.description_ar_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="status">{{ trans('cruds.task.fields.status') }}</label>
                    <select name="status" id="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <option value="" selected disabled>{{trans('global.pleaseSelect')}}</option>
                        <option value="not_started"         {{ $task->status == 'not_started'       ? 'selected' : (old('status') == 'not_started'      ? 'selected' : '' )}}>{{trans('cruds.status.not_started')}}</option>
                        <option value="in_progress"         {{ $task->status == 'in_progress'       ? 'selected' : (old('status') == 'in_progress'      ? 'selected' : '') }}>{{trans('cruds.status.in_progress')}}</option>
                        <option value="completed"           {{ $task->status == 'completed'         ? 'selected' : (old('status') == 'completed'        ? 'selected' : '') }}>{{trans('cruds.status.completed')}}</option>
                        <option value="deffered"            {{ $task->status == 'deffered'          ? 'selected' : (old('status') == 'deffered'         ? 'selected' : '') }}>{{trans('cruds.status.deffered')}}</option>
                        <option value="waiting_someone"     {{ $task->status == 'waiting_someone'   ? 'selected' : (old('status') == 'waiting_someone'  ? 'selected' : '') }}>{{trans('cruds.status.waiting_someone')}}</option>
                    </select>
                    @if($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.status_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="tags">{{ trans('cruds.task.fields.tag') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
                        @foreach($tags as $id => $tag)
                            <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || $task->tags->contains($id)) ? 'selected' : '' }}>{{ $tag }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('tags'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tags') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.tag_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="attachment">{{ trans('cruds.task.fields.attachment') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('attachment') ? 'is-invalid' : '' }}" id="attachment-dropzone">
                    </div>
                    @if($errors->has('attachment'))
                        <div class="invalid-feedback">
                            {{ $errors->first('attachment') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.attachment_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="start_date">{{ trans('cruds.task.fields.start_date') }}</label>
                    <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $task->start_date) }}" required>
                    @if($errors->has('start_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.start_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="due_date">{{ trans('cruds.task.fields.due_date') }}</label>
                    <input class="form-control date {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}">
                    @if($errors->has('due_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('due_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.due_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <input type="hidden" name="old_project" id="old_project" value="{{old('project_id') ?? $task->project->id }}"/>
                    <label for="project_id">{{ trans('cruds.task.fields.project') }}</label>
                    <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id" onchange="getProjectId(),getMilestoneId()" >
                        <option value="" selected disabled>Please Select</option>
                        @foreach($projects as $id => $project)
                            <option value="{{ $id }}" {{ (old('project_id') ? old('project_id') : $task->project->id ?? '') == $id ? 'selected' : '' }}>{{ $project }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project'))
                        <div class="invalid-feedback">
                            {{ $errors->first('project') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.project_helper') }}</span>
                </div>
                <div class="form-group" id="milestone_div">
                    <label for="milestone_id">{{ trans('cruds.task.fields.milestone') }}</label>
                    <input type="hidden" name="old_milestone" id="old_milestone" value="{{old('milestone_id') ?? $task->milestone->id }}"/>
                    <input type="hidden" name="milestones" id="milestones" value="{{$milestones}}"/>
                    <select class="form-control select2 {{ $errors->has('milestone') ? 'is-invalid' : '' }}" name="milestone_id" id="milestone_id" onchange="getMilestoneId()">
{{--                        @foreach($milestones as $key => $milestone)--}}
{{--                            <option value="{{ $milestone->id }}" {{ (old('milestone_id') ? old('milestone_id') : $task->milestone->id ?? '') == $milestone->id ? 'selected' : '' }}>{{ $milestone->name }}</option>--}}
{{--                        @endforeach--}}
                    </select>
                    @if($errors->has('milestone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('milestone') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.milestone_helper') }}</span>
                </div>
                <div class="form-group" id="parent_task_div">
                    <label for="parent_task_id">{{ trans('cruds.task.fields.parent_task') }}</label>
                    <input type="hidden" name="old_parent_task" id="old_parent_task" value="{{old('parent_task_id') ?? $task->parent_task_id }}"/>
                    <input type="hidden" name="tasks" id="tasks" value="{{$tasks}}"/>
                    <select class="form-control select2 {{ $errors->has('parent_task_id') ? 'is-invalid' : '' }}" name="parent_task_id" id="parent_task_id">
                        {{--                        @foreach($milestones as $key => $milestone)--}}
                        {{--                            <option value="{{ $milestone->id }}" {{ (old('milestone_id') ? old('milestone_id') : $task->milestone->id ?? '') == $milestone->id ? 'selected' : '' }}>{{ $milestone->name }}</option>--}}
                        {{--                        @endforeach--}}
                    </select>
                    @if($errors->has('parent_task_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('parent_task_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group w3-light-grey w3-xlarge" id="div_progress_input" style="display:block;">
                    <label for="calculate_progress">{{ trans('cruds.task.fields.calculate_progress') }}</label>
                    <input class="form-control w3-container w3-green {{ $errors->has('calculate_progress') ? 'is-invalid' : '' }}" type="range"
                           min="0" max="100" name="calculate_progress" id="calculate_progress" value="{{ old('calculate_progress', $task->calculate_progress) }}" onchange="displayProgressValue()">
                    <span id="progress_value" class="invisible" style="margin-left: 40%;"></span>
                    @if($errors->has('calculate_progress'))
                        <div class="invalid-feedback">
                            {{ $errors->first('calculate_progress') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.calculate_progress_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="task_hours">{{ trans('cruds.task.fields.task_hours') }}</label>
                    <input class="form-control {{ $errors->has('task_hours') ? 'is-invalid' : '' }}" type="text" name="task_hours" id="task_hours" value="{{ old('task_hours', $task->task_hours) }}">
                    @if($errors->has('task_hours'))
                        <div class="invalid-feedback">
                            {{ $errors->first('task_hours') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.task_hours_helper') }}</span>
                </div>

            </div>

            <div class="form-group">
                <label for="notes">{{ trans('cruds.task.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $task->notes) !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.notes_helper') }}</span>
            </div>

            <div class="form-group float-right">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.attachmentDropzone = {
    url: '{{ route('projectmanagement.admin.tasks.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="attachment"]').remove()
      $('form').append('<input type="hidden" name="attachment" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="attachment"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($task) && $task->attachment)
      var file = {!! json_encode($task->attachment) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="attachment" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var old_milestone = document.getElementById("old_milestone").value;
    var old_parent_task = document.getElementById("old_parent_task").value;
    $(document).ready(function () {
        var old_project = document.getElementById("old_project").value;
        // if(old_project || old_milestone){
        //     getProjectId();
        // }
        displayProgressValue();
        getProjectId();
        getMilestoneId()

  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/projectmanagement/tasks/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $task->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
    var getLocale = document.getElementById('getLocale').value;

    function getProjectId() {
        var project_id = document.getElementById("project_id").value;

        if(project_id){
            document.getElementById("milestone_div").classList.add('visible');
            document.getElementById("milestone_div").classList.remove('invisible');
            var allmilestones = document.getElementById("milestones").value;
            var milestones = JSON.parse(allmilestones);
            var innerHtml =[];
            var pleaseSelect ='{{trans('global.pleaseSelect')}}';

            innerHtml.push(`<option value="" selected disabled>${pleaseSelect}</option>`);
            for (const [key, value] of Object.entries(milestones)){
                if (project_id == value.project.id){
                    var selected = '';
                    if (value.id == old_milestone){
                        selected = 'selected';
                    }

                    var name = value.name_en;

                    if(getLocale == 'ar'){

                        var name = value.name_ar;
                    }

                    innerHtml.push(`<option value='${value.id}'  ${selected} >${name}</option>`);
                    // innerHtml.push(`<option value='${value.id}'  ${selected} >${value.name}</option>`);
                    //console.log(value.id,value.name,old_milestone);
                }
            }
            document.getElementById('milestone_id').innerHTML = innerHtml;
        }else{
            document.getElementById("milestone_div").classList.remove('visible');
            document.getElementById("milestone_div").classList.add('invisible');
        }
    }


    function getMilestoneId() {
        var milestone_id = document.getElementById("milestone_id").value;
        var task_id = '{{$task->id}}';

        if(milestone_id){
            document.getElementById("parent_task_div").classList.add('visible');
            document.getElementById("parent_task_div").classList.remove('invisible');
            var alltasks = document.getElementById("tasks").value;
            var tasks = JSON.parse(alltasks);
            var innerHtml =[];
            var pleaseSelect ='{{trans('global.pleaseSelect')}}';

            innerHtml.push(`<option value="" selected >${pleaseSelect}</option>`);
            for (const [key, value] of Object.entries(tasks)){
                if (milestone_id == value.milestone.id){
                    var selected = '';
                    if (value.id == old_parent_task){
                        selected = 'selected';
                    }
                    if (value.id != task_id){

                        var name = value.name_en;

                        if(getLocale == 'ar'){

                            var name = value.name_ar;
                        }

                        innerHtml.push(`<option value='${value.id}'  ${selected} >${name}</option>`);
                        // innerHtml.push(`<option value='${value.id}'  ${selected} >${value.name}</option>`);
                    }
                    //console.log(value.id,value.name,old_parent_task);
                }
            }
            document.getElementById('parent_task_id').innerHTML = innerHtml;
        }else{
            document.getElementById("parent_task_div").classList.remove('visible');
            document.getElementById("parent_task_div").classList.add('invisible');
        }
    }

    function displayProgressValue() {
        var value = document.getElementById("calculate_progress").value;
        document.getElementById("progress_value").classList.add('visible');
        document.getElementById("progress_value").classList.remove('invisible');
        document.getElementById("progress_value").innerHTML = "{{trans('cruds.task.fields.progress')}} "+ value + "%";
    }
</script>

@endsection
