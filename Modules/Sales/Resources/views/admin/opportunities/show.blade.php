@extends('layouts.admin')
@section('content')


<div class="card">
    

    <div class="card-body">
        <div class="flash-message">
            @if(Session::has('messages'))
            <p class="alert alert-danger">{{ Session::get('messages') }}</p>
            @endif
        </div>
        <div class="row">
            <div class="col-12 pb-1">
                <div class="col-3">
                    <button class="btn btn-default float-left ">
                        {{ trans('global.show') }} {{ trans('cruds.opportunity.title') }}
                    </button>
                </div>

            </div>
            <div class="col-3">
                <div class="card">

                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-details-tab" data-toggle="pill" href="#v-pills-details" role="tab" aria-controls="v-pills-details" aria-selected="true">{{trans('cruds.opportunity.title_singular')}} {{trans('global.details')}}</a>
                    <a class="nav-link" id="v-pills-tasks-tab" data-toggle="pill" href="#v-pills-tasks" role="tab"  aria-controls="v-pills-tasks" aria-selected="false">Call<span  class="float-right"> </span></a>
                        <a class="nav-link" id="v-pills-bugs-tab" data-toggle="pill" href="#v-pills-bugs" role="tab"   aria-controls="v-pills-bugs" aria-selected="false">Meetings<span  class="float-right"> </span></a>
                        <a class="nav-link" id="v-pills-notes-tab" data-toggle="pill" href="#v-pills-notes" role="tab"  aria-controls="v-pills-notes"   aria-selected="false">Comments</a>
                        <a class="nav-link" id="v-pills-tickets-tab" data-toggle="pill" href="#v-pills-tickets" role="tab" aria-controls="v-pills-tickets" aria-selected="false">Attachment<span  class="float-right"> </span></a>
                    
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-details" role="tabpanel"
                        aria-labelledby="v-pills-details-tab">
                        <div class="card">
                            <h5 class="card-header">
                                {{ $opportunity->name }}
                                @can('opportunity_edit')
                                <a class="float-right small" href="{{ route('sales.admin.opportunities.edit', $opportunity->id) }}">
                                    {{ trans('global.edit') }} {{ trans('cruds.opportunity.title_singular') }}
                                </a>
                                @endcan
                            </h5>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="col-sm-6 border-right ">
    
                                        <div class="pl-1 ">
    
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.opportunity.fields.name') }}:</p> <span class="col-md-6">{{ $opportunity->name }}</span> </div>
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.opportunity.fields.probability') }}: </p><span class="col-md-6">{{ $opportunity->probability }}</span> </div>
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.opportunity.fields.status') }}:</p> <span class="col-md-6">{{ $opportunity->closed_date}}</span> </div>
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.opportunity.fields.next_action') }}: </p><span class="col-md-6">{{ $opportunity->next_action }}</span> </div>
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.opportunity.fields.new_link') }}:</p> <span class="col-md-6">{{ $opportunity->new_link }}</span> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 border-right ">
    
                                        <div class="pl-1 ">
    
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.opportunity.fields.stages') }}:</p> <span class="col-md-6">{{ $opportunity->stages }}</span> </div>
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.opportunity.fields.closed_date') }}: </p><span class="col-md-6">{{ $opportunity->closed_date }}</span> </div>
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.opportunity.fields.expected_revenue') }}:</p> <span class="col-md-6">{{ $opportunity->expected_revenue}}</span> </div>
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.opportunity.fields.nextactiondate') }}:</p> <span class="col-md-6">{{ $opportunity->nextactiondate }}</span> </div>
                                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.opportunity.fields.Participants') }} : </p><span class="col-md-6"></span> </div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    {!! $opportunity->notes !!}
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-tasks" role="tabpanel" aria-labelledby="v-pills-tasks-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="horizontal">
                                    <a class="nav-link active" id="v-pills-task-tab" data-toggle="pill" href="#v-pills-task"
                                        role="tab" aria-controls="v-pills-task"
                                        aria-selected="true">{{ trans('cruds.task.title') }}</a>
                                    @can('task_create')
                                    <a class="nav-link" id="v-pills-new_task-tab" href="#" role="tab"
                                        aria-controls="v-pills-new_task" aria-selected="false">New
                                        {{ trans('cruds.task.title_singular') }}</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="v-pills-task" role="tabpanel"
                            aria-labelledby="v-pills-task-tab">
                            <div class="card">

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-bugs" role="tabpanel" aria-labelledby="v-pills-bugs-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="horizontal">
                                    <a class="nav-link active" id="v-pills-bug-tab" data-toggle="pill" href="#v-pills-bug"
                                        role="tab" aria-controls="v-pills-bug"
                                        aria-selected="true">{{ trans('cruds.bug.title') }}</a>
                                    @can('bug_create')
                                    <a class="nav-link" id="v-pills-new_bug-tab" href="#" role="tab"
                                        aria-controls="v-pills-new_bug" aria-selected="false">New
                                        {{ trans('cruds.bug.title_singular') }}</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="v-pills-bug" role="tabpanel"
                            aria-labelledby="v-pills-bug-tab">
                            <div class="card">
                                <div>
                                    <div class="card-header">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-notes" role="tabpanel" aria-labelledby="v-pills-notes-tab">
                        <div class="card">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-tickets" role="tabpanel" aria-labelledby="v-pills-tickets-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="horizontal">
                                    <a class="nav-link active" id="v-pills-ticket-tab" data-toggle="pill"
                                        href="#v-pills-ticket" role="tab" aria-controls="v-pills-ticket"
                                        aria-selected="true">{{ trans('cruds.ticket.title') }}</a>
                                    @can('ticket_create')
                                    <a class="nav-link" id="v-pills-new_ticket-tab" href="#" role="tab"
                                        aria-controls="v-pills-new_ticket" aria-selected="false">New
                                        {{ trans('cruds.ticket.title_singular') }}</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="v-pills-ticket" role="tabpanel"
                            aria-labelledby="v-pills-ticket-tab">
                            <div class="card">

                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    @parent

    {{--    For datatable of tasks--}}
    <script>

        $.extend(true, $.fn.dataTable.defaults, {
            order: [[ 0, 'desc' ]],
            responsive: true,
            pageLength: 7,
            lengthMenu: [
                [7, 25, 50, -1],
                [7, 25, 50, "All"],
            ],
        });

        $('.datatable-Milestone').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });

        $('.datatable-Task').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });

        $('.datatable-Bug').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });

        $('.datatable-Ticket').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });

        $('.datatable-Invoice').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });

    </script>

{{--    For editor in texteara notes--}}
    <script>
        $(document).ready(function () {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '/admin/projectmanagement/projects/ckmedia', true);
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
                                        data.append('crud_id',0);
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


    </script>

{{--    For Calendar --}}

    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href") // activated tab

        });



     


        function showEditTime(timer_id) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementById("v-pills-time_sheet-tab");

                tabcontent.classList.remove('active');
                tabcontent.classList.remove('show');
            // tabcontent.style.display = "none";
            document.getElementById('v-pills-time_sheet').classList.remove('active');
            document.getElementById('v-pills-time_sheet').classList.remove('show');
            document.getElementById('v-pills-time_sheet').style.display = "none" ;


            document.getElementById('v-pills-new_time_sheet-tab').classList.add('active');
            document.getElementById('v-pills-new_time_sheet-tab').classList.add('show');

            document.getElementById('v-pills-new_time_sheet').classList.add('active');
            document.getElementById('v-pills-new_time_sheet').classList.add('show');
            document.getElementById('v-pills-new_time_sheet').style.display = "block";

            var alltimesheets = document.getElementById('timesheets').value;
            var timesheets = JSON.parse(alltimesheets);
            timesheets.filter(function(value,key){

                //var time = $(this).data('id');
                if(timer_id == value.id){

                    $('textarea[name="reason"]').val(value.reason);
                    $('input[name="timesheet_id"]').val(value.id);

                    // start time and start date
                    let start_timestamp = value.start_time
                    var start = new Date(start_timestamp * 1000);
                    var months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
                    var year = start.getFullYear();
                    var month = months[start.getMonth()];
                    //var month = start.getMonth()+1;
                    var date = start.getDate();
                    var hour = start.getHours();
                    var min = start.getMinutes();

                    if(min.toString().length==1){
                        min = '0'+min;
                    }
                    if(hour.toString().length==1){
                        hour = '0'+hour;
                    }
                    if(date.toString().length==1){
                        date = '0'+date;
                    }

                    var time = hour + ':' + min ;
                    var dateValue = year + '-' + month + '-' + date;

                    $('input[name="start_time"]').val(time);
                    $('input[name="start_date"]').val(dateValue);

                    // start time and start date
                    let end_timestamp = value.end_time

                    var end = new Date(end_timestamp * 1000);
                    //var months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
                    var year = end.getFullYear();
                    var month = months[end.getMonth()];
                    //var month = end.getMonth()+1;
                    var date = end.getDate();
                    var hour = end.getHours();
                    var min = end.getMinutes();

                    if(min.toString().length==1){
                        min = '0'+min;
                    }
                    if(hour.toString().length==1){
                        hour = '0'+hour;
                    }
                    if(date.toString().length==1){
                        date = '0'+date;
                    }
                    var time = hour + ':' + min ;
                    var dateValue = year + '-' + month + '-' + date;

                    $('input[name="end_time"]').val(time);
                    $('input[name="end_date"]').val(dateValue);
                }
            })

        }

        //session flash message timeout after 5 sec
        $("document").ready(function(){
            setTimeout(function(){
                $(".flash-message").remove();
            }, 5000 ); // 5 secs

        });

    </script>
@endsection