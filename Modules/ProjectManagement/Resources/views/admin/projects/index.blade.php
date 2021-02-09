@extends('layouts.admin')
@section('content')

    <div class=" row">

        {{--    <div class="card col-sm-2 ">--}}
        {{--        <div class="card-body ">--}}
        {{--            <a class="float-left" id="all" type="button" >--}}
        {{--                All--}}
        {{--            </a>--}}
        {{--            <span class="float-right">{{$projects->count()}}</span><br>--}}
        {{--            <div class="progress" style="width: auto" >--}}
        {{--                <div class="progress-bar bg-success" role="progressbar" style="width: 100%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--    </div>--}}

        <div class="card col-sm-2 ">
            <a class="float-left" id="started" type="button">
                <div class="card-body ">
                    {{trans('cruds.status.started')}}
                    <span class="float-right">{{$projects->where('project_status','started')->count().'/'.$projects->count()}}</span><br>
                    @if($projects->count() >0)
                        <div class="progress" style="width: auto">
                            <div class="progress-bar bg-info" role="progressbar"
                                 style="width: {{$projects->where('project_status','started')->count()/$projects->count()*100}}%; "
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>
                    @endif
                </div>
            </a>
        </div>
        <div class="card col-sm-2 ">
            <a class="float-left" id="in_progress" type="button">

                <div class="card-body">

                    {{trans('cruds.status.in_progress')}}
                    <span class="float-right">{{$projects->where('project_status','in_progress')->count().'/'.$projects->count()}}</span><br>
                    @if($projects->count() >0)
                        <div class="progress" style="width: auto">
                            <div class="progress-bar bg-warning" role="progressbar"
                                 style="width: {{$projects->where('project_status','in_progress')->count()/$projects->count()*100}}%; "
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>
                    @endif
                </div>
            </a>

        </div>
        <div class="card col-sm-2 ">
            <a class="float-left" id="on_hold" type="button">
                <div class="card-body">
                    {{trans('cruds.status.on_hold')}}
                    <span class="float-right">{{$projects->where('project_status','on_hold')->count().'/'.$projects->count()}}</span><br>
                    @if($projects->count() >0)
                        <div class="progress" style="width: auto">
                            <div class="progress-bar bg-dark" role="progressbar"
                                 style="width: {{$projects->where('project_status','on_hold')->count()/$projects->count()*100}}%; "
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>
                    @endif
                </div>
            </a>
        </div>
        <div class="card col-sm-2 ">
            <a class="float-left" id="cancel" type="button">
                <div class="card-body">

                    {{trans('cruds.status.cancel')}}
                    <span class="float-right">{{$projects->where('project_status','cancel')->count().'/'.$projects->count()}}</span><br>
                    @if($projects->count() >0)
                        <div class="progress" style="width: auto">
                            <div class="progress-bar bg-danger" role="progressbar"
                                 style="width: {{$projects->where('project_status','cancel')->count()/$projects->count()*100}}%; "
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>
                    @endif
                </div>
            </a>
        </div>
        <div class="card col-sm-2 ">
            <a class="float-left" id="completed" type="button">
                <div class="card-body">

                    {{trans('cruds.status.completed')}}
                    <span class="float-right">{{$projects->where('project_status','completed')->count().'/'.$projects->count()}}</span><br>
                    @if($projects->count() >0)
                        <div class="progress" style="width: auto">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: {{$projects->where('project_status','completed')->count()/$projects->count()*100}}%; "
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>
                    @endif
                </div>
            </a>
        </div>
        <div class="card col-sm-2 " >
            <a class="float-left" id="overdue" type="button">
                <div class="card-body">

                    {{trans('cruds.status.overdue')}}
                    <span class="float-right">{{$projects->where('project_status','overdue')->count().'/'.$projects->count()}}</span><br>
                    @if($projects->count() >0)
                        <div class="progress" style="width: auto">
                            <div class="progress-bar bg-danger" role="progressbar"
                                 style="width:{{$projects->where('project_status','overdue')->count()/$projects->count()*100}}%; "
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                            </div>
                        </div>
                    @endif
                </div>
            </a>
        </div>

    </div>

    <div style="margin-bottom: 10px;" class="row">
        @can('project_create')
            <div class="col-lg-6">
                <a class="btn btn-success" href="{{ route('projectmanagement.admin.projects.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.project.title_singular') }}
                </a>
            </div>
        @endcan
        @can('project_delete')
            <div style="margin: 10px;" class="row d-flex ml-auto">
                <div class="col-lg-6 ">
                    <a class="btn btn-{{$trashed ? 'info' : 'danger'}}"
                       href="{{$trashed ? route('projectmanagement.admin.projects.index') : route('projectmanagement.admin.projects.trashed.index')}}">

                        {{ $trashed ? trans('cruds.status.active') : trans('cruds.status.trashed') }} {{ trans('cruds.project.title') }}

                    </a>

                </div>
            </div>
        @endcan
    </div>
    {{-- <div class="row">
       <div class="col-lg-3">
           <select data-column="0" class="form-control filter-select" name="" id="">
               <option value="0">Active Projects</option>
               <option value="1">Trashed Projects</option>
           </select>
       </div>
    </div> --}}
    <div class="card">
        <div class="card-header">
            <a id="all" type="button">

                {{ trans('cruds.project.title') }} {{ trans('global.list') }}
            </a>
        </div>
{{--        <input type="hidden" name="getLocale" id="getLocale" value="{{app()->getLocale()}}"/>--}}
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Project">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.client') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.milestone.title_singular') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.title_singular') }}
                        </th>
                        <th>
                            {{ trans('cruds.ticket.title_singular') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.project_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.department.title_singular') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($projects)
                        @forelse($projects as $key => $project)
                            <tr data-entry-id="{{ $project->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $project->id ?? '' }}
                                </td>
                                <td>
                                    <a href="{{ route('projectmanagement.admin.projects.show', $project->id) }}"
                                       title=" {{ trans('global.view') }}">
                                        {{ $project->{'name_'.app()->getLocale()} ?? '' }}<br>
                                    </a>
                                    <div class="progress" style="width: 150px">
                                        <div class="progress-bar {{$project->calculate_progress < 50 ? 'bg-danger':'bg-success'}}"
                                             role="progressbar"
                                             style="width: {{$project->calculate_progress}}%; display: {{$project->calculate_progress?:'none'}}"
                                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            {{$project->calculate_progress}}%
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $project->client && $project->client->name ? $project->client->name : '' }}
                                </td>
                                <td>
                                    {{ $project->start_date ?? '' }}
                                </td>
                                <td>
                                    {{ $project->end_date ?? '' }}
                                </td>

                                <td>
                                    <a href="#milestonesModal" data-toggle="modal" data-target="#milestonesModal"
                                       data-project="{{$project}}" onclick="milestonesModal('{{$project->id}}')"
                                       class="btn btn-info {{$project->milestones && $project->milestones->count()>0 ? '':'disabled'}}">
                                        {{$project->milestones && $project->milestones->count()>0 ? $project->milestones->count() : trans('cruds.milestone.fields.no_milestone')}}
                                    </a>
                                </td>
                                <td>
                                    @if($project->with_tasks || $project->tasks)
                                        <a href="#tasksModal" data-toggle="modal" data-target="#tasksModal"
                                           data-project="{{$project}}" onclick="tasksModal('{{$project->id}}')"
                                           class="btn btn-info {{$project->tasks && $project->tasks->count()>0 ? '':'disabled'}}">
                                            {{$project->tasks->count()>0 ? $project->tasks->count() : trans('cruds.task.fields.no_task')}}
                                        </a>
                                        {{--                                        <a href="{{route('projectmanagement.admin.tasks.index')}}" class="btn btn-info {{$project->tasks && $project->tasks->count()>0 ? '':'disabled'}}" >--}}
                                        {{--                                            {{$project->tasks->count()>0 ? $project->tasks->count():'No Tasks'}}--}}
                                        {{--                                        </a>--}}
                                    @else
                                        <a class="btn btn-info disabled">
                                            {{trans('cruds.task.fields.no_task')}}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="#ticketsModal" data-toggle="modal" data-target="#ticketsModal"
                                       data-project="{{$project}}" onclick="ticketsModal('{{$project->id}}')"
                                       class="btn btn-info {{$project->tickets && $project->tickets->count()>0 ? '':'disabled'}}">
                                        {{$project->tickets && $project->tickets->count()>0 ? $project->tickets->count() : trans('cruds.ticket.fields.no_ticket')}}
                                    </a>
                                </td>

                                <td>
{{--                                    {{ $project->project_status ? ucwords(str_replace('_',' ',$project->project_status)) : '' }}--}}
                                    {{ $project->project_status ? trans("cruds.status.".$project->project_status)  : '' }}
                                </td>
                                <td>
                                    {{ $project->department && $project->department->department_name ? $project->department->department_name : '' }}
                                </td>

                                <td>
                                    @if(!$trashed)
                                        @can('project_show')
                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('projectmanagement.admin.projects.show', $project->id) }}"
                                               title=" {{ trans('global.view') }}">
                                                <span class="fa fa-eye"></span>
                                            </a>
                                        @endcan
                                        @can('project_edit')
                                            <a class="btn btn-xs btn-info"
                                               href="{{ route('projectmanagement.admin.projects.edit', $project->id) }}"
                                               title="{{ trans('global.edit') }}">
                                                <span class="fa fa-pencil-square-o"></span>
                                            </a>
                                        @endcan
                                        @can('project_create')
                                            <a class="btn btn-xs btn-secondary"
                                               href="{{ route('projectmanagement.admin.projects.clone', $project->id) }}"
                                               onclick="return confirm('{{ trans('cruds.messages.sure_clone_project_milestone_tasks') }}');"
                                               title="{{ trans('global.clone') }}">
                                                <span class="fa fa-copy"></span>
                                            </a>
                                        @endcan

                                        @can('project_assign_to')

                                            <a class="btn btn-xs btn-success {{$project->department ? '' : 'disabled'}}"
                                               href="{{ route('projectmanagement.admin.projects.getAssignTo', $project->id) }}"
                                               title="{{$project->department ? '' : trans('cruds.messages.add_department_to_project')}}">
                                                {{ trans('global.assign_to') }}
                                            </a>

                                        @endcan

                                        @can('project_delete')
                                            <form action="{{ route('projectmanagement.admin.projects.destroy', $project->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                  style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger"
                                                       value="{{ trans('global.delete') }}">
                                            </form>
                                        @endcan
                                    @else
                                        @can('project_delete')
                                            <form action="{{ route('projectmanagement.admin.projects.forceDestroy', $project->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                  style="display: inline-block;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="action" value="restore">
                                                <input type="submit" class="btn btn-xs btn-success"
                                                       value="{{ trans('global.restore') }}">
                                            </form>
                                            <form action="{{ route('projectmanagement.admin.projects.forceDestroy', $project->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('{{trans('cruds.messages.milestone_tasks_in_project_force_delete')}} \n{{ trans('global.areYouSure') }}');"
                                                  style="display: inline-block;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="action" value="force_delete">
                                                <input type="submit" class="btn btn-xs btn-danger"
                                                       value="{{ trans('global.forcedelete') }}">
                                            </form>
                                        @endcan
                                    @endif

                                </td>

                            </tr>
                        @empty
                        @endforelse
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal tasks Pop up to display all tasks in project by project_id--}}

    <input type="hidden" id="projects" value="{{$projects}}">
{{--    <input type="hidden" id="status" value="{{$status}}">--}}
    <!-- Modal -->
    <div class="modal fade" id="tasksModal" tabindex="-1" role="dialog" aria-labelledby="tasksModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style=" width: max-content;">
                <div class="modal-header">
                    <h5 class="modal-title" id="tasksModalTitle">{{ trans('cruds.task.title_singular') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Task">
                            <thead>
                            <tr>
                                <th>
                                    {{ trans('cruds.task.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.task.fields.name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.task.fields.status') }}
                                </th>
                                <th width="200">
                                    {{ trans('cruds.task.fields.progress') }}
                                </th>
                                <th width="150">
                                    {{ trans('cruds.task.fields.due_date') }}
                                </th>
                            </tr>
                            </thead>
                            <tbody id="taskModelTBody">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal milestones Pop up to display all milestones in project by project_id--}}

    <!-- Modal -->
    <div class="modal fade" id="milestonesModal" tabindex="-1" role="dialog" aria-labelledby="milestonesModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style=" width: max-content;">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="milestonesModalTitle">{{ trans('cruds.milestone.title_singular') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Milestone">
                            <thead>
                            <tr>
                                <th>
                                    {{ trans('cruds.milestone.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.milestone.fields.name') }}
                                </th>
                                <th width="150">
                                    {{ trans('cruds.milestone.fields.end_date') }}
                                </th>
                            </tr>
                            </thead>
                            <tbody id="milestoneModelTBody">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal milestones Pop up to display all milestones in project by project_id--}}

    <!-- Modal -->
    <div class="modal fade" id="ticketsModal" tabindex="-1" role="dialog" aria-labelledby="ticketsModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style=" width: max-content;">
                <div class="modal-header">
                    <h5 class="modal-title" id="ticketsModalTitle">{{ trans('cruds.ticket.title_singular') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Ticket">
                            <thead>
                            <tr>
                                <th>
                                    {{ trans('cruds.ticket.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ticket.fields.subject') }}
                                </th>
                                <th width="100">
                                    {{ trans('cruds.ticket.fields.status') }}
                                </th>
                            </tr>
                            </thead>
                            <tbody id="ticketsModelTBody">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

                    @if(!$trashed)
                    @can('project_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('projectmanagement.admin.projects.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan


            @endif


            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 25,
                // scrollX : false,
            });
            let table = $('.datatable-Project:not(.ajaxTable)').DataTable({
                buttons: [dtButtons, 'colvis'],
            })

            // Hide columns
            // table.columns([3]).visible( true );
            // table.columns([3]).search( 0 ).draw(); // set a default load in datatable column (Active Users)
            // table.columns([3]).search( 0 ).draw();  // set a default load in datatable column (Active Users)


            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

            // $('.filter-select').on('change', function () {
            //     console.log("dgsdf");
            //   table
            //       .column(3)
            //       .search($(this).val())
            //       .draw()
            //   });

            // $('.datatable thead').on('input', '.search', function () {
            //     let strict = $(this).attr('strict') || false
            //     let value = strict && this.value ? "^" + this.value + "$" : this.value
            //     table
            //       .column($(this).parent().index())
            //       .search(value, strict)
            //       .draw()
            //     console.log(strict,'ffffff');
            // });

            //statistics

            $('#all').on('click', function () {
                table
                    .columns(9)
                    .search('')
                    .draw()
            })

            $('#started').on('click', function () {
                table
                    .columns(9)
                    .search('{{trans('cruds.status.started')}}')
                    .draw()
            })

            $('#in_progress').on('click', function () {
                table
                    .columns(9)
                    .search('{{trans('cruds.status.in_progress')}}')
                    .draw()
            })

            $('#on_hold').on('click', function () {
                table
                    .columns(9)
                    .search('{{trans('cruds.status.on_hold')}}')
                    .draw()
            })

            $('#cancel').on('click', function () {
                table
                    .columns(9)
                    .search('{{trans('cruds.status.cancel')}}')
                    .draw()
            })

            $('#completed').on('click', function () {
                table
                    .columns(9)
                    .search('{{trans('cruds.status.completed')}}')
                    .draw()
            })

            $('#overdue').on('click', function () {
                table
                    .columns(9)
                    .search('{{trans('cruds.status.overdue')}}')
                    .draw()
            })

        })
        var getLocale = document.getElementById('getLocale').value;

        function tasksModal(project_id) {
            var allprojects = document.getElementById('projects').value;
            var projects = JSON.parse(allprojects);
            //var allstatus = document.getElementById('status').value;
            //var status = JSON.parse(allstatus);

            var innerHtmlTasks = '';
            projects.filter(function (value, key) {
                if (value.id == project_id) {
                    const tasks = value.tasks;

                    tasks.forEach(function (value, key) {

                        var showLink = '{{route("projectmanagement.admin.tasks.show", ":id") }}';
                        showLink = showLink.replace(':id', value.id);

                        // get trans of status by status of task
                        var trans_status = '';
                        switch(value.status){

                            case 'not_started':
                                trans_status = '{{trans("cruds.status.not_started") }}';
                                break;
                            case 'in_progress':
                                trans_status = '{{trans("cruds.status.in_progress") }}';
                                break;
                            case 'completed':
                                trans_status = '{{trans("cruds.status.completed") }}';
                                break;
                            case 'deffered':
                                trans_status = '{{trans("cruds.status.deffered") }}';
                                break;
                            case 'waiting_someone':
                                trans_status = '{{trans("cruds.status.waiting_someone") }}';
                                break;
                            default :
                                trans_status = value.status;
                        }

                        {{--var xzxxcxc = '{!! json_encode(trans(":trans_status")) !!}';--}}
                        {{--var xzxxcxc = '{!!trans(":trans_status") !!}';--}}
                        {{--var status = xzxxcxc.replace(':trans_status', trans_status);--}}
                        //console.log(value.status,trans_status);

                        var name = value.name_en;

                        if(getLocale == 'ar'){

                            var name = value.name_ar;
                        }
                        innerHtmlTasks += "<tr data-entry-id='" + value.id + "'><td>" + value.id + "</td><td><a href='" + showLink + "'>" + name + "</a></td><td>" + trans_status + "</td><td><div class='progress'> <div class='progress-bar ' role='progressbar' style='width:" + value.calculate_progress + "%;  aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>" + value.calculate_progress + "%</div></div></td><td>" + value.due_date + "</td></tr>"
                        // status.forEach(function (stat, key) {
                        //     if (stat.id == value.status_id) {
                        //
                        //     }
                        // })
                    })
                    document.getElementById('taskModelTBody').innerHTML = innerHtmlTasks;
                    //console.log(value)
                }
            })
        }

        function milestonesModal(project_id) {
            var allprojects = document.getElementById('projects').value;
            var projects = JSON.parse(allprojects);
            var innerHtmlTasks = '';
            projects.filter(function (value, key) {
                if (value.id == project_id) {
                    const milestones = value.milestones;

                    milestones.forEach(function (value, key) {
                        var showLink = '{{route("projectmanagement.admin.milestones.show", ":id") }}';
                        showLink = showLink.replace(':id', value.id);

                        var name = value.name_en;

                        if(getLocale == 'ar'){

                            var name = value.name_ar;
                        }

                        innerHtmlTasks += `<tr data-entry-id='   ${value.id}  '><td>   ${value.id}  </td><td><a href=' ${showLink}'>   ${name} </a></td><td>   ${value.end_date} </td></tr>`
                        {{--innerHtmlTasks += "<tr data-entry-id='" + value.id + "'><td>" + value.id + "</td><td><a href='" + showLink + "'>" + value.name_+'{{app()->getLocale()}}' + "</a></td><td>" + value.end_date + "</td></tr>"--}}
                    })
                    document.getElementById('milestoneModelTBody').innerHTML = innerHtmlTasks;
                }
            })
        }


        function ticketsModal(project_id) {
            var allprojects = document.getElementById('projects').value;
            var projects = JSON.parse(allprojects);
            var innerHtmlTickets = '';
            projects.filter(function (value, key) {
                if (value.id == project_id) {
                    const tickets = value.tickets;

                    tickets.forEach(function (value, key) {
                        var showLink = '{{route("projectmanagement.admin.tickets.show", ":id") }}';
                        showLink = showLink.replace(':id', value.id);

                        // get trans of status by status of task
                        var trans_status = '';
                        switch(value.status){

                            case 'opened':
                                trans_status = '{{trans("cruds.status.opened") }}';
                                break;
                            case 'answered':
                                trans_status = '{{trans("cruds.status.answered") }}';
                                break;
                            case 'in_progress':
                                trans_status = '{{trans("cruds.status.in_progress") }}';
                                break;
                            case 'closed':
                                trans_status = '{{trans("cruds.status.closed") }}';
                                break;
                            case 'reopen':
                                trans_status = '{{trans("cruds.status.reopen") }}';
                                break;
                            default :
                                trans_status = value.status;
                        }

                        var subject = value.subject_en;

                        if(getLocale == 'ar'){

                            var subject = value.subject_ar;
                        }

                        innerHtmlTickets += "<tr data-entry-id='" + value.id + "'><td>" + value.id + "</td><td><a href='" + showLink + "'>" + subject + "</a></td><td>" + trans_status + "</td></tr>"
                    })
                    document.getElementById('ticketsModelTBody').innerHTML = innerHtmlTickets;
                }
            })
        }


    </script>
@endsection
