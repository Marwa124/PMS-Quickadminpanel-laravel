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
        {{ trans('global.create') }} {{ trans('cruds.task.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("projectmanagement.admin.tasks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-6">


                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.task.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.name_helper') }}</span>
                </div>
                @if($task)
                    <div class="form-group">
                        <label for="parent_task_id">{{ trans('cruds.task.fields.parent_task') }}</label>
                        <input class="form-control" type="hidden" name="project_id" id="project_id" value="{{$task->project->id}}" >
                        <input class="form-control" type="hidden" name="milestone_id" id="milestone_id" value="{{$task->milestone->id}}" >

                        <select class="form-control select2 {{ $errors->has('parent_task_id') ? 'is-invalid' : '' }}" name="parent_task_id" id="parent_task_id">
                            @if($tasks)
                                @forelse($tasks as $id => $v_task)
                                    <option value="{{ $id }}" {{ old('parent_task_id') == $id ? 'selected' : ($task->id == $id ? 'selected' : '') }} >{{ $v_task }}</option>
                                @empty
                                @endforelse
                            @endif
                        </select>
                        @if($errors->has('parent_task_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('parent_task_id') }}
                            </div>
                        @endif
{{--                        <span class="help-block">{{ trans('cruds.task.fields.status_helper') }}</span>--}}
                    </div>
                @endif
                @if($milestone)
                        <div class="form-group">
                            <label for="parent_task_id">{{ trans('cruds.task.fields.milestone') }}</label>
                            <input class="form-control" type="hidden" name="project_id" id="project_id" value="{{$milestone->project->id}}" >
                            <select class="form-control select2 {{ $errors->has('milestone_id') ? 'is-invalid' : '' }}" name="milestone_id" id="milestone_id_task">
                                @if($milestones)
                                    @forelse($milestones as $id => $v_milestone)
                                        <option value="{{ $id }}" {{ old('milestone_id') == $id ? 'selected' : ($milestone->id == $id ? 'selected' : 'disabled') }} >{{ $v_milestone }}</option>
                                    @empty
                                    @endforelse
                                @endif
                            </select>
                            @if($errors->has('milestone_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('milestone_id') }}
                                </div>
                            @endif
{{--                            <span class="help-block">{{ trans('cruds.task.fields.status_helper') }}</span>--}}
                        </div>
                    @endif
                <div class="form-group">
                    <label for="description">{{ trans('cruds.task.fields.description') }}</label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.description_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="status">{{ trans('cruds.task.fields.status') }}</label>
                    <select name="status" id="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" required>
                        <option value="" selected disabled>{{trans('global.pleaseSelect')}}</option>
                        <option value="Not Started"         {{ (old('status') == 'Not Started'          ? 'selected' : '' )}}>{{trans('cruds.status.not_started')}}</option>
                        <option value="In Progress"         {{ (old('status') == 'In Progress'          ? 'selected' : '') }}>{{trans('cruds.status.in_progress')}}</option>
                        <option value="Completed"           {{ (old('status') == 'Completed'            ? 'selected' : '') }}>{{trans('cruds.status.completed')}}</option>
                        <option value="Deffered"            {{ (old('status') == 'Deffered'             ? 'selected' : '') }}>{{trans('cruds.status.deffered')}}</option>
                        <option value="Waiting For Someone" {{ (old('status') == 'Waiting For Someone'  ? 'selected' : '') }}>{{trans('cruds.status.waiting_someone')}}</option>
                    </select>
{{--                    <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>--}}
{{--                        @foreach($statuses as $id => $status)--}}
{{--                            <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
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
                            <option value="{{ $id }}" {{ in_array($id, old('tags', [])) ? 'selected' : '' }}>{{ $tag }}</option>
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
                    <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                    @if($errors->has('start_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.start_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="due_date">{{ trans('cruds.task.fields.due_date') }}</label>
                    <input class="form-control date {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text" name="due_date" id="due_date" value="{{ old('due_date') }}">
                    @if($errors->has('due_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('due_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.task.fields.due_date_helper') }}</span>
                </div>
    {{--            <div class="form-group">--}}
    {{--                <label for="assigned_to_id">{{ trans('cruds.task.fields.assigned_to') }}</label>--}}
    {{--                <select class="form-control select2 {{ $errors->has('assigned_to') ? 'is-invalid' : '' }}" name="assigned_to_id" id="assigned_to_id">--}}
    {{--                    @foreach($assigned_tos as $id => $assigned_to)--}}
    {{--                        <option value="{{ $id }}" {{ old('assigned_to_id') == $id ? 'selected' : '' }}>{{ $assigned_to }}</option>--}}
    {{--                    @endforeach--}}
    {{--                </select>--}}
    {{--                @if($errors->has('assigned_to'))--}}
    {{--                    <div class="invalid-feedback">--}}
    {{--                        {{ $errors->first('assigned_to') }}--}}
    {{--                    </div>--}}
    {{--                @endif--}}
    {{--                <span class="help-block">{{ trans('cruds.task.fields.assigned_to_helper') }}</span>--}}
    {{--            </div>--}}
                @if(!$task && !$milestone)
                    <div class="form-group">
                        <input type="hidden" name="old_project" id="old_project" value="{{old('project_id')}}"/>
                        <input type="hidden" name="project_task_id" id="project_task_id" value="{{ $project ? $project->id : null}}"/>
                        <label for="project_id">{{ trans('cruds.task.fields.project') }}</label>
                        <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id" onchange="getProjectId()">
                            <option value="" selected disabled>{{trans('global.pleaseSelect')}}</option>

                            @foreach($projects as $id => $v_project)
                                @if($project)
                                    <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : ($project->id == $id ? 'selected' : 'disabled') }}>{{ $v_project }}</option>
                                @else
                                    <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $v_project }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('project'))
                            <div class="invalid-feedback">
                                {{ $errors->first('project') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.task.fields.project_helper') }}</span>
                    </div>
                    <div class="form-group {{old('milestone_id') ? 'visible':'invisible'}}" id="milestone_div" >
                        <label for="milestone_id">{{ trans('cruds.task.fields.milestone') }}</label>
                        <input type="hidden" name="old_milestone" id="old_milestone" value="{{old('milestone_id')}}"/>
                        <input type="hidden" name="milestones" id="milestones" value="{{$milestones}}"/>
                        <select class="form-control select2 {{ $errors->has('milestone') ? 'is-invalid' : '' }}" name="milestone_id" id="milestone_id">

        {{--                    @foreach($milestones as $id => $milestone)--}}
        {{--                        <option value="{{ $id }}" {{ old('milestone_id') == $id ? 'selected' : '' }}>{{ $milestone }}</option>--}}
        {{--                    @endforeach--}}


                        </select>
                        @if($errors->has('milestone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('milestone') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.task.fields.milestone_helper') }}</span>
                    </div>
                @endif
                <div class="form-group w3-light-grey w3-xlarge" id="div_progress_input" style="display:block;">
                    <label for="calculate_progress">{{ trans('cruds.task.fields.calculate_progress') }}</label>
                    <input class="form-control w3-container w3-green {{ $errors->has('calculate_progress') ? 'is-invalid' : '' }}" type="range"
                           min="0" max="100" name="calculate_progress" id="calculate_progress" value="{{ old('calculate_progress', '') }}" onchange="displayProgressValue()">
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
                    <input class="form-control {{ $errors->has('task_hours') ? 'is-invalid' : '' }}" type="text" name="task_hours" id="task_hours" value="{{ old('task_hours', '') }}">
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
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes') !!}</textarea>
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
    var project_task_id = document.getElementById("project_task_id").value;
    $(document).ready(function () {
        var old_project = document.getElementById("old_project").value;
        if(old_project || old_milestone || project_task_id){
            getProjectId();
        }

        displayProgressValue();

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
                    innerHtml.push(`<option value='${value.id}'  ${selected} >${value.name}</option>`);
                    //console.log(value.id,value.name,old_milestone);
                }
            }
            document.getElementById('milestone_id').innerHTML = innerHtml;
        }else{
            document.getElementById("milestone_div").classList.remove('visible');
            document.getElementById("milestone_div").classList.add('invisible');
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
