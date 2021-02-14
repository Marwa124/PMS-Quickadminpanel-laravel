@extends('layouts.admin')
@section('content')

    {{-- <a class="btn btn-default" href="{{ route('sales.admin.opportunities.index') }}">
        {{ trans('global.back_to_list') }}
    </a> --}}

    <div class="flash-message">
        @if(Session::has('messages'))
        <p class="alert alert-danger">{{ Session::get('messages') }}</p>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 clearfix">
                    <i class="fas fa-money-bill bg-primary p-3 font-2xl mr-3 float-left">
                    </i>
                    <div class="h5 text-primary mt-2 mb-0">0.00</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs">
                    Paid Amount</div>
                </div>
                <div class="card-footer px-3 py-2">
                    <a href="#" class="font-weight-bold font-xs btn-block text-muted">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 clearfix">
                    <i class="fas fa-dollar-sign bg-danger p-3 font-2xl mr-3 float-left">
                    </i>
                    <div class="h5 text-primary mt-2 mb-0">0.00</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs">
                    Due Amount</div>
                </div>
                <div class="card-footer px-3 py-2">
                    <a href="#" class="font-weight-bold font-xs btn-block text-muted">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 clearfix">
                    <i class="fas fa-dollar-sign bg-dark text-white p-3 font-2xl mr-3 float-left">
                    </i>
                    <div class="h5 text-primary mt-2 mb-0">0.00</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs">
                    Invoice Amount</div>
                </div>
                <div class="card-footer px-3 py-2">
                    <a href="#" class="font-weight-bold font-xs btn-block text-muted">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 clearfix">
                    <i class="fas fa-dollar-sign bg-dark text-white p-3 font-2xl mr-3 float-left">
                    </i>
                    <div class="h5 text-primary mt-2 mb-0">0.00</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs">Paid Percentage</div>
                </div>
                <div class="card-footer px-3 py-2">
                    <a href="#" class="font-weight-bold font-xs btn-block text-muted">View More <i
                        class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 pb-1">
            <div class="col-3">
                <span class="float-right ">
                    @can('project_create')
                    <a class="btn btn-secondary " href="#" id="clone"
                        onclick="return confirm('Are you sure to clone Project with milestone and tasks ?');"
                        title="{{ trans('global.clone') }}">
                        <span class="fa fa-copy" aria-hidden="true"></span>
                    </a>
                    @endcan
                    <a class="btn btn-danger mr-3" href="#" title="pdf">
                        <i class="fa fa-file-pdf  " aria-hidden="true"></i>

                    </a>
                </span>
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
                    <h5 class="card-header">Notes
                            <a class="float-right btn text-light btn-danger small" style="text-decoration:none;">Add new</a>
                            </h5>
                        <div class="card-body">
                            <h5>Contact Details</h5>
                            <div class="row">
                                <div class="col-6">
                                   <div class="d-flex">
                                        <p style="flex:1">name</p>
                                        <p style="flex:1">Ali</p>
                                   </div>
                                   <div class="d-flex">
                                        <p style="flex:1">contact person</p>
                                        <p style="flex:1">dsfakj</p>
                                   </div>
                                   <div class="d-flex">
                                        <p style="flex:1">Email</p>
                                        <p style="flex:1">aaaa@sssc.com</p>
                                   </div>
                                   <div class="d-flex">
                                        <p style="flex:1">City</p>
                                        <p style="flex:1">Cairo</p>
                                   </div>
                                   <div class="d-flex">
                                        <p style="flex:1">Zip Code</p>
                                        <p style="flex:1">12218</p>
                                   </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex">
                                        <p style="flex:1">Address</p>
                                        <p style="flex:1">djfsahj</p>
                                    </div>
                                    <div class="d-flex">
                                        <p style="flex:1">Phone</p>
                                        <p style="flex:1">+2212122</p>
                                   </div>
                                   <div class="d-flex">
                                        <p style="flex:1">Fax</p>
                                        <p style="flex:1">1212222</p>
                                   </div>
                                   <div class="text-center my-5">
                                    <h4>Received Amount</h4>
                                    <h4 class="text-danger">EGP 0:00</h4>

                                   </div>
                                </div>
                            </div>
                            <div>
                                <div class="progress" style="width: auto" >
                                    <div class="progress-bar {{60 >= 50 ? 'bg-success' : 'bg-danger'}}" role="progressbar" style="width: 60%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        60%
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <div class="d-flex align-items-center">
                                        <div>Invoice Amount</div>
                                        <div class="bg-primary p-1 mx-2">EGP 0.00</div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>Outstanding</div>
                                        <div class="bg-primary p-1 mx-2">EGP 0.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-tasks" role="tabpanel" aria-labelledby="v-pills-tasks-tab">
                    <div class="card">
                            <h5 class="card-header">Notes
                            <a class="float-right btn text-light btn-danger small" style="text-decoration:none;">Add new</a>
                            </h5>
                        <div class="card-body">
                            <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="horizontal">
                                <h3>table</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-bugs" role="tabpanel" aria-labelledby="v-pills-bugs-tab">
                    <div class="card">
                                <h5 class="card-header">Notes
                                <a class="float-right btn text-light btn-danger small" style="text-decoration:none;">Add new</a>
                                </h5>
                            <div class="card-body">
                                <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="horizontal">
                                    <h3>table</h3>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="tab-pane fade" id="v-pills-notes" role="tabpanel" aria-labelledby="v-pills-notes-tab">
                    <div class="card">
                                <h5 class="card-header">Notes
                                <a class="float-right btn text-light btn-danger small" style="text-decoration:none;">Add new</a>
                                </h5>
                            <div class="card-body">
                                <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="horizontal">
                                    <h3>table</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="tab-pane fade" id="v-pills-tickets" role="tabpanel" aria-labelledby="v-pills-tickets-tab">
                    <div class="card">
                                <h6 class="card-header">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-Tasks-tab" data-toggle="pill" href="#pills-Tasks" role="tab" aria-controls="pills-Tasks" aria-selected="true">Tasks</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-newTasks-tab" data-toggle="pill" href="#pills-newTasks" role="tab" aria-controls="pills-newTasks" aria-selected="false">New Tasks</a>
                                        </li>
                                    </ul>

                                </h6>
                            <div class="card-body">
                                
                                <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-Tasks" role="tabpanel" aria-labelledby="pills-Tasks-tab">
                                    Tasks Content
                                </div>
                                <div class="tab-pane fade" id="pills-newTasks" role="tabpanel" aria-labelledby="pills-newTasks-tab">New tasks content</div>
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