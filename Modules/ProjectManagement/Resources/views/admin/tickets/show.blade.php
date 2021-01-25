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
                            <div class="card-header">{{trans('cruds.ticket.fields.subject')}} : {{ ucfirst($ticket->subject) }} <span class="float-right">{{ trans('cruds.ticket.fields.reporter') }} : {{ $ticket->reporterBy ? ($ticket->reporterBy->name ?? '') : ''}}</span></div>
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
                                <button type="button" style="margin-left: 7px ;margin-top: 55px;" class="btn btn-secondary" data-toggle="modal" data-target="#info">
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
                            <button id="btn-replay" onclick="replayForm()" type="button"class="btn btn-primary mb-5 replay_submit" >

                                {{ trans('cruds.ticket.fields.replay') }}
                            </button>

                            <form action="{{ route('projectmanagement.admin.tickets.change_status') }}" method="post" style="display: inline;">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                <input type="hidden" name="status" value="closed">

                                <button type="submit"  class="btn btn-danger mb-5" >
                                    {{ trans('cruds.ticket.fields.close_ticket') }}
                                </button>

                            </form>
                        @else

                            <form action="{{ route('projectmanagement.admin.tickets.change_status') }}" method="post" style="display: inline;">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                <input type="hidden" name="status" value="reopen">

                                <button type="submit" class="btn btn-success mb-5" >
                                    {{ trans('cruds.ticket.fields.reopen_replay') }}

                                </button>

                            </form>
                        @endif

                        <div style="clear: both; "></div>

{{--                        <div class="replay {{$errors->any() ? 'visible': 'invisible'}}" id="replay">--}}

                        <div class="replay_ticket" id="replay_ticket" style="display: {{$errors->has('body') ? 'block': 'none'}}" >

{{--                            @if ($errors->any())--}}
{{--                                <div class="alert alert-danger col-md-5">--}}
{{--                                    <ul>--}}
{{--                                        @foreach ($errors->all() as $error)--}}
{{--                                            <li class="float-left">{{ $error }}</li><br>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            @endif--}}
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


                                <div class="col-12 ">
                                    <button type="submit" class="btn btn-primary float-right" >{{ trans('global.save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="col-md-11 ml-3">
                    @foreach($ticket->replies as $replay)
                        <div class="col-md-12 ml-1" style="margin-bottom: 40px;">
                            <div class="col-md-12">
                                <img  class="img-thumbnail rounded-circle" title="{{ $replay->user->name }}" width="5%" src="{{ $replay->user->accountDetail->avatar ? str_replace('storage', 'storage', $replay->user->accountDetail->avatar->getUrl()) : asset('images/default.png') }}" alt="{{ $replay->user->accountDetail->fullname }}">

                                {{$replay->user->name}}

                                <strong> {!! $replay->body !!}</strong>
                                <a id="add-replay" onclick="addReplay('{{$replay->id}}','{{$ticket->status}}')" type="button" class="mb-5" >
                                    <i class="fa fa-reply"></i>
                                    {{ trans('cruds.ticket.fields.replay') }}
                                </a>
                            </div>

{{--                            replies of replay--}}
                            @if(isset($replay->replay))

                                @foreach($replay->replay as $replay_of_replay)
                                    <div class="col-md-10 ml-5">
                                        <img  class="img-thumbnail rounded-circle" title="{{ $replay_of_replay->user->name }}" width="5%" src="{{ $replay_of_replay->user->accountDetail->avatar ? str_replace('storage', 'storage', $replay_of_replay->user->accountDetail->avatar->getUrl()) : asset('images/default.png') }}" alt="{{ $replay_of_replay->user->accountDetail->fullname }}">

                                        {{$replay_of_replay->user->name}}

                                        <strong> {!! $replay_of_replay->body !!}</strong>
                                    </div>
                                    <hr class="col-md-10">
                                @endforeach
                            @endif


                            <div class="replay" id="replay_{{$replay->id}}" style="display:{{$errors->has('replay_body') ? 'block': 'none'}}" >

                                <form action="{{ route('projectmanagement.admin.tickets.replay') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                    <input type="hidden" name="ticket_replay_id" value="{{ $replay->id }}">

                                    <div class="col-lg-12 col-md-12" style="padding-bottom: 20px;">

                                        <label class="form-group " for="replay_body">{{ trans('cruds.ticket.fields.replay') }}</label>
                                        <textarea class="form-control ckeditor {{ $errors->has('replay_body') ? 'is-invalid' : '' }}"  name="replay_body" id="replay_body">{!! old('replay_body')!!}</textarea>

                                    </div>

                                    <div class="col-12 pb-5">
                                        <button type="submit" id="replaySubmitBtn" class="btn btn-primary float-right" >{{ trans('global.save') }}</button>
                                    </div>
                                </form>
                            </div>


                            <hr class="col-md-11">



                        </div>


{{--                        @if(json_decode($replay->attachments))--}}
{{--                            <div class="col-md-4 mb-2 ml-2">--}}
{{--                                <button  type="button" data-toggle="modal" data-target="#replay_{{ $replay->id }}" class="btn btn-secondary" style="border-radius: 0;" >--}}
{{--                                    @lang('locale.view_attachments')--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        @endif--}}





                        <div class="modal-info mr-1 mb-1 d-inline-block">
                            <div class="modal fade text-left" id="replay_attach_{{ $replay->id }}" tabindex="-1" role="dialog"
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


                // document.getElementById("replay").classList.add('visible');
                // document.getElementById("replay").classList.remove('invisible');
                document.getElementById("replay_ticket").style.display = 'block';

                count++;
            }else {
                // document.getElementById("replay").classList.add('invisible');
                //
                // document.getElementById("replay").classList.remove('visible');
                document.getElementById("replay_ticket").style.display = 'none';
                count++;
            }

        }

         // CKEDITOR.replace('body');

        $('.replay_submit').click(function(){

            $('.replay_ticket').removeClass('hidden');
        })

        $('.replay_submit').dblclick(function(){

            $('.replay_ticket').addClass('hidden');
            $('.replay_submit').removeClass('disabled');
        })

        var i = 0;
        function addReplay(replay_id,status) {
            if(status != 'closed'){

                if (i % 2 == 0){

                    document.getElementById("replay_"+replay_id).style.display = 'block';
                    i++;
                }else {

                    document.getElementById("replay_"+replay_id).style.display = 'none';
                    i++;
                }
            }
        }

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
