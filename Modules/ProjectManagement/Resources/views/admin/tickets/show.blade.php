@extends('layouts.admin')

@section('styles')
    <style>
        #cke_body{
            width:100% !important;
        }

        .disabled {
            background-color: #b50000 !important;
            color: #fefefe !important;
            opacity: 0.25 !important;
            cursor: not-allowed !important;
        }
    </style>
@endsection


@section('content')

    <div >
{{--        <a style="margin: 10px;" href="{{route('projectmanagement.admin.tickets.index')}}" class="btn btn-xs btn-info"> << Ticket </a>--}}

        <!-- Input Style start -->
        <section id="input-style">
            <div class="col-md-10" style="padding: 30px">
                <div class="card">
                    <div class="row" style="font-size:16px;font-weight:bold;">
                        <div class="col-md-12">
                            <div class="card-header">Subject : {{ ucfirst($ticket->subject) }}</div>
                            @if(preg_match("/\p{Arabic}/u", $ticket->body))
                                <div class='col-md-12 mt-3 ' dir="rtl" style=" font-size: 17px;margin-left:6px;">

                                    {!! $ticket->body !!}

                                </div>
                            @else

                                <div class='col-md-12 mt-3 ' style=" font-size: 17px;margin-left:6px;">

                                    {!! $ticket->body !!}

                                </div>
                            @endif
                            <div class='col-md-6 mt-3'>
                                <button type="button" style="border-radius: 0;margin-left: 7px ;margin-top: 55px;" class="btn btn-secondary" data-toggle="modal" data-target="#info">
                                    {{ trans('cruds.ticket.fields.attachments') }}
                                </button></div>

                            <div class="modal-info mr-1 mb-1 d-inline-block">
                                {{-- Button trigger modal --}}


                                {{-- Modal --}}
                                <div class="modal fade text-left" id="info" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel130" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content" style="height:500px;width:700px;">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="modal-body">
                                                <div class="row">


{{--                                                        @forelse( as $attach)--}}
                                                    <div class="col-md-4" style="margin-bottom: 25px;">
                                                        @if($ticket->file)
                                                            <a href="{{ $ticket->file->getUrl() }}" target="_blank">
                                                                {{ trans('global.view_file') }}
                                                            </a>
                                                        @endif
{{--                                                                <a  target="_blank" href="{{ asset('uploads/tickets/'.$ticket->getFileAttribute()->file_name) }}">--}}

{{--                                                                    @if(strpos($attach,'.pdf') !== false)--}}
{{--                                                                        <img style="width:150px;height:180px;" src="{{ asset('pdf.png') }}" alt="">--}}
{{--                                                                    @elseif(strpos($attach,'.xlsx') !== false || strpos($attach,'.xls') !== false || strpos($attach,'.csv') !== false || strpos($attach,'.txt') !== false)--}}
{{--                                                                        <img style="width:150px;height:180px;" src="{{ asset('excel.png') }}" alt="">--}}

{{--                                                                    @else--}}
{{--                                                                        <img style="width:150px;height:200px;" src="{{ asset('uploads/tickets/'.$attach) }}" alt="">--}}
{{--                                                                    @endif--}}
{{--                                                                    {{$ticket->getFileAttribute()->name}}--}}
{{--                                                                </a>--}}
                                                    </div>
{{--                                                        @empty--}}
{{--                                                            No Attachments found--}}
{{--                                                        @endforelse--}}

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="col-md-6">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="card-header justify-content-end">Open Date : {{ $ticket->created_at->isoFormat('lll') }}</div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-5"></div>--}}
{{--                                <div class="col-md-7  justify-content-end">--}}
{{--                                    <table class="table table-striped mt-3" >--}}

{{--                                        <tr>--}}
{{--                                            <td>Module</td>--}}
{{--                                            <td>--}}
{{--                                                @if($ticket->category)--}}
{{--                                                    {{ App::isLocale('en') ? ucfirst($ticket->category->name_en) :  ucfirst($ticket->category->name_ar) }}--}}
{{--                                                @else--}}
{{--                                                    No Module--}}
{{--                                                @endif--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        --}}{{--                            <tr><td>Module</td><td>{{ ucfirst($ticket->module) }}</td></tr>--}}
{{--                                        <tr><td>Email</td><td>{{ $ticket->email }}</td></tr>--}}
{{--                                        <tr><td>Status</td><td>{{ $ticket->status }}</td></tr>--}}
{{--                                    </table>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                    <div class="card-body">
                        @if($ticket->status != 'closed')
                            <button id="btn-replay" onclick="replayForm()" type="button" style="border-radius: 0;" class="btn btn-primary mb-5 replay_submit" >

                                {{ trans('cruds.ticket.fields.replay') }}
                            </button>

                            <form action="{{ route('projectmanagement.admin.tickets.change_status') }}" method="post" style="display: inline;">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                <input type="hidden" name="status" value="closed">

                                <button type="submit" style="border-radius: 0;" class="btn btn-danger mb-5" >
                                    {{ trans('cruds.ticket.fields.close_ticket') }}
                                </button>

                            </form>
                        @else

                            <form action="{{ route('projectmanagement.admin.tickets.change_status') }}" method="post" style="display: inline;">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                <input type="hidden" name="status" value="reopen">

                                <button type="submit" style="border-radius: 0;" class="btn btn-success mb-5" >
                                    {{ trans('cruds.ticket.fields.reopen_replay') }}

                                </button>

                            </form>
                        @endif

                        <div style="clear: both; padding: 20px;"></div>

                        <div class="replay {{$errors->any() ? 'visible': 'invisible'}}" id="replay">

                            @if ($errors->any())
                                <div class="alert alert-danger col-md-5">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="float-right">{{ $error }}</li><br>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div style="clear: both; "></div>

                            <form action="{{ route('projectmanagement.admin.tickets.replay') }}" method="post" class="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                                <div class="col-lg-12 col-md-12" style="padding-bottom: 20px;">

                                    <label class="form-group " for="body">{{ trans('cruds.ticket.fields.replay') }}</label>
                                    <textarea class="form-control ckeditor {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body">{!! old('body')!!}</textarea>

                                </div>
{{--                                <div class="col-lg-4 col-md-12 mt-5" style="">--}}
{{--                                    <fieldset class="form-group">--}}
{{--                                        <div class="custom-file">--}}
{{--                                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="files[]" multiple>--}}
{{--                                            <label class="custom-file-label" for="inputGroupFile01">Attachment file</label>--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                </div>--}}


                                <div class="col-12 d-flex flex-sm-row flex-column  mt-1">
                                    <button type="submit" style="border-radius: 0;" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">{{ trans('global.save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>







                    @foreach($ticket->replies as $replay)
                        <div class="col-md-12" style="margin-bottom: 40px;margin-top:30px;">
                            <p style=";
                            /*background: #3b3b3b;*/
                            /*color: white;*/
                            /*height: 45px;*/
                            /*font-size: 17px;*/
                            /*padding: 10px;*/
                            /*border-radius: 5px;*/
                            /*font-weight: 500;*/
                            width: 100px;
                            "
                            >
                            <div>
                                <img  class="img-thumbnail rounded-circle" title="{{ $replay->user->name }}" width="5%" src="{{ $replay->user->accountDetail->avatar ? str_replace('storage', 'storage', $replay->user->accountDetail->avatar->getUrl()) : asset('images/default.png') }}" alt="{{ $replay->user->accountDetail->fullname }}">

                                {{$replay->user->name}}
                                <strong> {!! $replay->body !!}</strong>
                            </div>
{{--                                @if($replay->sender == 'tec')--}}
{{--                                    From Technical To You  Posted on : {{ $replay->created_at->isoformat('lll') }}--}}
{{--                                @else--}}
{{--                                    From You To Technical  Posted on : {{ $replay->created_at->isoformat('lll') }}--}}

{{--                                @endif--}}
                            </p>

                            <div style="
                       margin-left: 10px;
                       font-size: 17px;
                       font-family: cursive;
                      ">

                                {!! $replay->body !!}
                            </div>




                        </div>


{{--                        @if(json_decode($replay->attachments))--}}
{{--                            <div class="col-md-4 mb-2 ml-2">--}}
{{--                                <button  type="button" data-toggle="modal" data-target="#replay_{{ $replay->id }}" class="btn btn-secondary" style="border-radius: 0;" >--}}
{{--                                    @lang('locale.view_attachments')--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        @endif--}}





                        <div class="modal-info mr-1 mb-1 d-inline-block">
                             Button trigger modal


                             Modal
                            <div class="modal fade text-left" id="replay_{{ $replay->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel130" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content" style="height:500px;width:700px;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="modal-body">
                                            <div class="row">
{{--                                                @forelse(json_decode($replay->attachments) as $attach)--}}


{{--                                                    <div class="col-md-4">--}}
{{--                                                        <a  target="_blank" href="{{ asset('uploads/tickets/'.$attach) }}">--}}

{{--                                                            @if(strpos($attach,'.pdf') !== false)--}}
{{--                                                                <img style="width:150px;height:180px;" src="{{ asset('pdf.png') }}" alt="">--}}
{{--                                                            @elseif(strpos($attach,'.xlsx') !== false || strpos($attach,'.xls') !== false || strpos($attach,'.csv') !== false || strpos($attach,'.txt') !== false)--}}
{{--                                                                <img style="width:150px;height:180px;" src="{{ asset('excel.png') }}" alt="">--}}

{{--                                                            @else--}}
{{--                                                                <img style="width:150px;height:200px;" src="{{ asset('uploads/tickets/'.$attach) }}" alt="">--}}
{{--                                                            @endif--}}
{{--                                                        </a>--}}

{{--                                                    </div>--}}
{{--                                                @empty--}}
{{--                                                    No Attachments found--}}
{{--                                                @endforelse--}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach



                </div>


            </div>


        </section>
        <!-- Input Style end -->
    </div>
@endsection
@section('scripts')
    <script>

        var count = 0;
        function replayForm() {
            if (count % 2 == 0){


                document.getElementById("replay").classList.add('visible');
                document.getElementById("replay").classList.remove('invisible');

                count++;
            }else {
                document.getElementById("replay").classList.add('invisible');

                document.getElementById("replay").classList.remove('visible');
                count++;
            }


        }


         // CKEDITOR.replace('body');

        $('.replay_submit').click(function(){

            $('.replay').removeClass('hidden');
            //$('.replay_submit').addClass('disabled');
            //$('.replay_submit').style('disabled');
            //document.querySelector('.replay_submit').disabled = 'true';

        })

        $('.replay_submit').dblclick(function(){

            $('.replay').addClass('hidden');
            $('.replay_submit').removeClass('disabled');

        })





    </script>

@endsection

@section('content123')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ticket.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('projectmanagement.admin.tickets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.id') }}
                        </th>
                        <td>
                            {{ $ticket->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.project') }}
                        </th>
                        <td>
                            {{ $ticket->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.ticket_code') }}
                        </th>
                        <td>
                            {{ $ticket->ticket_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.email') }}
                        </th>
                        <td>
                            {{ $ticket->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.subject') }}
                        </th>
                        <td>
                            {{ $ticket->subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.body') }}
                        </th>
                        <td>
                            {!! $ticket->body !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.status') }}
                        </th>
                        <td>
                            {{ $ticket->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.department') }}
                        </th>
                        <td>
                            {{ $ticket->department->department_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.reporter') }}
                        </th>
                        <td>
                            {{ $ticket->reporter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.priority') }}
                        </th>
                        <td>
                            {{ $ticket->priority }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.file') }}
                        </th>
                        <td>
                            @if($ticket->file)
                                <a href="{{ $ticket->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.comment') }}
                        </th>
                        <td>
                            {!! $ticket->comment !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.last_reply') }}
                        </th>
                        <td>
                            {{ $ticket->last_reply }}
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.ticket.fields.permissions') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            @foreach($ticket->permissions as $key => $permissions)--}}
{{--                                <span class="label label-info">{{ $permissions->title }}</span>--}}
{{--                            @endforeach--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('projectmanagement.admin.tickets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
