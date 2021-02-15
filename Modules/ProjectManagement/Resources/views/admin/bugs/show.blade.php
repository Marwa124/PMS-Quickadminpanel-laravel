@extends('layouts.admin')
@section('styles')
    <style>
        @charset "UTF-8";
        @import url(https://fonts.googleapis.com/css?family=Fira+Sans:200,400,500);
        * {
            border: 0;
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
        }

        /*body {*/
        /*    height: inherit;*/
        /*    display: -webkit-box;*/
        /*    display: -ms-flexbox;*/
        /*    display: flex;*/
        /*    -webkit-box-orient: vertical;*/
        /*    -webkit-box-direction: normal;*/
        /*    -ms-flex-direction: column;*/
        /*    flex-direction: column;*/
        /*    font-family: 'Fira Sans', sans-serif;*/
        /*    -webkit-font-smoothing: antialiased;*/
        /*    -moz-osx-font-smoothing: grayscale;*/
        /*    color: #79838c;*/
        /*}*/

        /*a {*/
        /*    color: #50585f;*/
        /*    text-decoration: none;*/
        /*}*/

        a:hover {
            color: #383e44;
        }

        div.container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            max-height: 100%;
        }

        div.header {
            height: auto;
            text-align: center;
            background: slategrey;
            color: ghostwhite;
            padding: 2.3rem 1rem 2.3rem 1rem;
            position: relative;
        }

        div.header:after {
            content: '';
            position: absolute;
            bottom: -5rem;
            left: 0rem;
            height: 5.1rem;
            display: block;
            width: 100%;
            z-index: 300;
            /* FF3.6-15 */
            /* Chrome10-25,Safari5.1-6 */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(20%, white), to(rgba(255, 255, 255, 0)));
            background: linear-gradient(to bottom, white 20%, rgba(255, 255, 255, 0) 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#00ffffff',GradientType=0 );
            /* IE6-9 */
        }

        div.header h1 {
            margin-top: .8rem;
            margin-bottom: .5rem;
            font-weight: 200;
            font-size: 1.6em;
            letter-spacing: 0.1rem;
            text-transform: uppercase;
        }

        @media (min-width: 62em) {
            div.header h1 {
                font-size: 1.9em;
                letter-spacing: 0.2rem;
            }
        }

        div.header h2 {
            font-size: 1.1em;
            font-weight: 400;
            color: #cfd7de;
            max-width: 30rem;
            margin: auto;
        }

        div.item {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
            overflow-y: auto;
            padding: 0rem 1rem 0rem 1rem;
        }

        #timeline {
            position: relative;
            display: table;
            height: 100%;
            margin-left: -2rem;
            margin-right: 2rem;
            margin-top: 3rem;
            margin-bottom: 2rem;
        }

        #timeline div:after {
            content: '';
            width: 2px;
            position: absolute;
            top: -1.2rem;
            bottom: 0rem;
            left: 58px;
            z-index: 1;
            background: #C5C5C5;
        }

        #timeline h3 {
            position: -webkit-sticky;
            position: sticky;
            top: 5rem;
            color: #888;
            margin: 0;
            font-size: 1em;
            font-weight: 400;
        }

        @media (min-width: 62em) {
            #timeline h3 {
                font-size: 1.1em;
            }
        }

        #timeline section.year {
            position: relative;
        }

        #timeline section.year:first-child section {
            margin-top: -1.3em;
            padding-bottom: 0px;
        }

        #timeline section.year section {
            position: relative;
            padding-bottom: 1.25em;
            margin-bottom: 2.2em;
        }

        #timeline section.year section h4 {
            position: absolute;
            bottom: 0;
            font-size: .9em;
            font-weight: 400;
            line-height: 1.2em;
            margin: 0;
            padding: 0 0 0 89px;
            color: #C5C5C5;
        }

        @media (min-width: 62em) {
            #timeline section.year section h4 {
                font-size: 1em;
            }
        }

        #timeline section.year section ul {
            list-style-type: none;
            padding: 0 0 0 75px;
            margin: -1.35rem 0 1em;
            max-width: 32rem;
            font-size: 1em;
        }

        @media (min-width: 62em) {
            #timeline section.year section ul {
                font-size: 1.1em;
                padding: 0 0 0 81px;
            }
        }

        #timeline section.year section ul:last-child {
            margin-bottom: 0;
        }

        #timeline section.year section ul:first-of-type:after {
            content: '';
            width: 10px;
            height: 10px;
            background: #C5C5C5;
            border: 2px solid #FFFFFF;
            border-radius: 50%;
            position: absolute;
            left: 54px;
            top: 3px;
            z-index: 2;
        }

        #timeline section.year section ul li {
            margin-left: .5rem;
        }

        #timeline section.year section ul li:before {
            content: '·';
            margin-left: -.5rem;
            padding-right: .3rem;
        }

        #timeline section.year section ul li:not(:first-child) {
            margin-top: .5rem;
        }

        #timeline section.year section ul li span.price {
            color: mediumturquoise;
            font-weight: 500;
        }

        #price {
            display: inline;
        }

        svg {
            border: 3px solid white;
            border-radius: 50%;
            -webkit-box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
        }
        /*# sourceMappingURL=index.css.map */
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card">

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-details-tab" data-toggle="pill" href="#v-pills-details" role="tab" aria-controls="v-pills-details" aria-selected="true">{{ trans('cruds.bug.title') }} {{trans('global.details')}}</a>
                    <a class="nav-link" id="v-pills-comments-tab"       data-toggle="pill" href="#v-pills-comments" role="tab" aria-controls="v-pills-comments" aria-selected="false">{{ trans('cruds.comment.title') }}<span class="float-right">   {{$bug->comments_with_replies && $bug->comments_with_replies()->count() > 0 ? $bug->comments_with_replies()->count() : ''}}</span></a>
                    <a class="nav-link" id="v-pills-notes-tab" data-toggle="pill" href="#v-pills-notes" role="tab" aria-controls="v-pills-notes" aria-selected="false">{{ trans('cruds.bug.fields.notes') }}</a>
                    <a class="nav-link" id="v-pills-activities-tab" data-toggle="pill" href="#v-pills-activities" role="tab" aria-controls="v-pills-activities" aria-selected="false">{{ trans('cruds.activities.title') }}<span class="float-right">{{$bug->activities()->count() > 0 ? $bug->activities()->count() : ''}}</span></a>
                    <a class="nav-link" id="v-pills-attachment-tab"     data-toggle="pill" href="#v-pills-attachment" role="tab" aria-controls="v-pills-attachment" aria-selected="false">{{ trans('cruds.project.fields.attachment') }}<span  class="float-right"> </span></a>
                </div>
            </div>
        </div>
        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-details" role="tabpanel" aria-labelledby="v-pills-details-tab">
                    <div class="card">
                        <h5 class="card-header">{{ $bug->{'name_'.app()->getLocale()} ?? '' }}
                            @can('task_edit')
                                <a class="float-right small" href="{{ route('projectmanagement.admin.bugs.edit', $bug->id) }}">
                                    {{ trans('global.edit') }}  {{ trans('cruds.bug.title_singular') }}
                                </a>
                            @endcan
                        </h5>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="col-sm-4 border-right ">

                                    <div class="pl-1 ">
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.bug.fields.name') }} :</p> <span class="col-md-6">{{ $bug->{'name_'.app()->getLocale()} ?? '' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.bug.fields.issue_no') }} : </p><span class="col-md-6">{{ $bug->issue_no ?? '' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.title') }} {{ trans('cruds.project.fields.name') }}  : </p><span class="col-md-6">{{ $bug->project ? $bug->project->{'name_'.app()->getLocale()} : '' }}</span> </div>
                                    {{--                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.task.title') }} {{ trans('cruds.task.fields.name') }}  : </p><span class="col-md-6">{{ $bug->task->name }}</span> </div>--}}
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.bug.fields.status') }} : </p><span class="col-md-6 "><span class="bg-success p-1">{{$bug->status ? trans("cruds.status.".$bug->status)  : '' }}</span></span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.bug.fields.priority') }} :</p> <span class="col-md-6 "><span class="bg-info p-1"> {{ $bug->priority ? trans("cruds.status.".$bug->priority)  : '' }}</span></span> </div>
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.bug.fields.severity') }} :</p> <span class="col-md-6"><span class="bg-danger p-1">{{ $bug->severity ? trans("cruds.status.".$bug->severity)  : '' }}</span></span> </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 border-right ">
                                    <div class=" pl-1">
                                        <div class="row"> <p class="font-bold col-md-5">{{ trans('cruds.bug.fields.reporter') }} :</p> <span class="col-md-6">{{ $bug->reporterBy && $bug->reporterBy->name ? $bug->reporterBy->name : '' }}</span> </div>
                                        <div class="row"> <p class="font-bold col-md-5">{{ trans('global.assign_to') }} :</p> <span class="col-md-6">
                                                @if($bug->accountDetails)
                                                    @forelse($bug->accountDetails as $account)
                                                        <img class="img-thumbnail rounded-circle" title="{{ $account->fullname ?? ''  }}" width="30%" src="{{ $account->avatar ? str_replace('storage', 'storage', $account->avatar->getUrl()) : asset('images/default.png') }}" alt="{{ $account->fullname ?? ''  }}">
                                                    @empty
                                                        {{trans('not_assign_anyone')}}
                                                    @endforelse
                                                @else
                                                    {{trans('not_assign_anyone')}}
                                                @endif
                                            </span> </div>

                                    </div>
                                </div>
                                <div class="col-sm-4  ">
                                    <div class=" pl-1">
                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.bug.fields.reproducibility') }} :</p> <span class="col-md-6">{!! $bug->reproducibility ?? ''  !!}</span> </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-notes" role="tabpanel" aria-labelledby="v-pills-notes-tab">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route("projectmanagement.admin.bugs.update_note", $bug->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="notes">{{ trans('cruds.task.fields.notes') }}</label>
                                    <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $bug->notes) !!}</textarea>
                                    @if($errors->has('notes'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('notes') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.task.fields.notes_helper') }}</span>
                                </div>
                                <input type="hidden" name="bug_id" value="{{$bug->id}}" />
                                <div class="form-group col-md-12">
                                    <button class="btn btn-danger float-right" type="submit">
                                        {{ trans('global.update') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-activities" role="tabpanel" aria-labelledby="v-pills-activities-tab">
                    <div class="card">
                        <div class="card-header">
                                {{ trans('cruds.activities.title') }}
                        </div>

                        <div class="tab-pane fade show active" id="v-pills-activity" role="tabpanel" aria-labelledby="v-pills-activity-tab">
                        @if($bug->activities()->count() > 0)
                            <div class="card-body">

                                <div class="item">
                                    <div id="timeline">
                                        <div>
                                            @forelse($bug->activities as $activity)
                                                <section class="year">
                                                    {{--                                                   time_ago in file global_helper --}}
                                                    <section>
                                                        <ul>
                                                            <small title="{{$activity->activity_date ?? ''}}">{{time_ago($activity->activity_date) ?? ''}}</small>
                                                            <li><a href="{{route('admin.users.show',$activity->user && $activity->user->id ? $activity->user->id : '')}}">{{$activity->user && $activity->user->name ? $activity->user->name : ''}}</a> {{$activity->{'activity_'.app()->getLocale()} ?? '' }} <strong> {{$activity->{'value1_'.app()->getLocale()} ?? ''}} </strong></li>
                                                        </ul>
                                                    </section>
                                                </section>
                                            @empty
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-attachment" role="tabpanel" aria-labelledby="v-pills-attachment-tab">
                    <div class="card">
                        <h6 class="card-header">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-attchment-tab" data-toggle="pill" href="#pills-attchment" role="tab" aria-controls="pills-attchment" aria-selected="true">attchment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn" id="newattach-tab" data-toggle="modal" data-target="#attachmentExample" >New attchment</a>
                                </li>
                            </ul>

                        </h6>
                    <div class="card-body">
                        
                        <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-attchment" role="tabpanel" aria-labelledby="pills-attchment-tab">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-attachment ">
                                <thead>
                                    <tr>
                                    
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            {{ trans('cruds.opportunity.fields.name') }}
                                        </th>
                                     
                                        <th>
                                            {{ trans('cruds.opportunity.fields.description') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.opportunity.fields.attachment') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($bug->attachments)
                                    @forelse($bug->attachments as $key => $attach)
                                    <tr data-entry-id="{{ $attach->id }}">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                    
                                        <td>
                                        
                                            {{ $attach->name?? '' }}
                                        </td>
                                        <td>
                                            {{ $attach->description ?? '' }}
                                        </td>
                                       
                                        <td>
                                           
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter_{{ $attach->id }}">
                                                Attachment
                                            </button>
                                            @php
                                            $attachments=$attach->getMedia('attachments');
                                            @endphp
                                            <div class="modal fade" id="exampleModalCenter_{{ $attach->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                @include('projectmanagement::admin.bugs.partials.modal',['attachments',$attachments])
                                            </div>
                                         
                                           <a class="btn btn-danger" href="{{route('projectmanagement.admin.bugs.delete.attach',[$attach->id,$attach->id])}}"><i class="fas fa-trash-alt"></i></a>    
                                        </td>
                
                                    </tr>
                                
                                    @empty
                                        <tr>
                                            <td colspan="8" >
                                                <center> {{trans('cruds.messages.no_attachment_found_in_project')}} </center>
                                            </td>
                                        </tr>
                                    @endforelse
                                    @else
                                        <tr>
                                            <td colspan="8" >
                                                {{trans('cruds.messages.no_attachment_found_in_project')}}
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-comments" role="tabpanel" aria-labelledby="v-pills-comments-tab">
                    <div class="card"  >
                        <h5 class="card-header">{{ trans('cruds.comment.title') }} </h5>
                        <div class="card-body">


                            <form action="{{ route('projectmanagement.admin.bugs.add_comment') }}" method="post" class="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="bug_id" value="{{ $bug->id }}">

                                <div class="col-lg-12 col-md-12" style="padding-bottom: 20px;">

                                    <label class="form-group " for="comment">{{ trans('cruds.comment.title_singular') }}</label>
                                    <textarea class="form-control ckeditor {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="comment">{!! old('comment')!!}</textarea>

                                </div>



                                <div class="col-12 ">
                                    <button type="submit" class="btn btn-primary float-right" >{{ trans('global.save') }}</button>
                                </div>
                            </form>
                            <hr class="col-md-11 ml-3">
                            @foreach($bug->comments as $comment)
                                <div class="col-md-12 ml-1" style="margin-bottom: 40px;">
                                    <div class="col-md-12">
                                        <img  class="img-thumbnail rounded-circle" title="{{ $comment->user && $comment->user->name ? $comment->user->name : '' }}" width="5%" src="{{ $comment->user && $comment->user->accountDetail ? str_replace('storage', 'storage', $comment->user && $comment->user->accountDetail ? $comment->user->accountDetail->avatar->getUrl() : '') : asset('images/default.png') }}" alt="{{ $comment->user && $comment->user->accountDetail && $comment->user->accountDetail->fullname ? $comment->user->accountDetail->fullname : '' }}">

                                        {{$comment->user && $comment->user->name ? $comment->user->name  : ''}}

                                        <strong> {!! $comment->comment !!}</strong>
                                        <a id="add-replay" onclick="addReplay('{{$comment->id}}')" type="button" class="mb-5" >
                                            <i class="fa fa-reply"></i>
                                            {{ trans('cruds.ticket.fields.replay') }}
                                        </a>
                                    </div>

                                    {{--                                                                replies of replay--}}
                                    @if(isset($comment->replay))

                                        @foreach($comment->replay as $comment_of_replay)
                                            <div class="col-md-10 ml-5">
                                                <img  class="img-thumbnail rounded-circle" title="{{ $comment->user && $comment->user->name ? $comment->user->name : '' }}" width="5%" src="{{ $comment->user && $comment->user->accountDetail ? str_replace('storage', 'storage', $comment->user && $comment->user->accountDetail ? $comment->user->accountDetail->avatar->getUrl() : '') : asset('images/default.png') }}" alt="{{ $comment->user && $comment->user->accountDetail && $comment->user->accountDetail->fullname ? $comment->user->accountDetail->fullname : '' }}">

                                                {{$comment_of_replay->user && $comment_of_replay->user->name ? $comment_of_replay->user->name : ''}}

                                                <strong> {!! $comment_of_replay->comment !!}</strong>
                                            </div>
                                            <hr class="col-md-10">
                                        @endforeach
                                    @endif


                                    <div class="replay" id="replay_{{$comment->id}}" style="display:{{$errors->has('replay_comment') ? 'block': 'none'}}" >

                                        <form action="{{ route('projectmanagement.admin.bugs.add_comment') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="bug_id" value="{{ $bug->id }}">
                                            <input type="hidden" name="comment_replay_id" value="{{ $comment->id }}">

                                            <div class="col-lg-12 col-md-12" style="padding-bottom: 20px;">

                                                <label class="form-group " for="replay_comment">{{ trans('cruds.ticket.fields.replay') }}</label>
                                                <textarea class="form-control ckeditor {{ $errors->has('replay_comment') ? 'is-invalid' : '' }}"  name="replay_comment" id="replay_comment">{!! old('replay_comment')!!}</textarea>

                                            </div>

                                            <div class="col-12 pb-5">
                                                <button type="submit" id="replaySubmitBtn" class="btn btn-primary float-right" >{{ trans('global.save') }}</button>
                                            </div>
                                        </form>
                                    </div>


                                    <hr class="col-md-11">



                                </div>


                                {{--                                                        @if(json_decode($comment->attachments))--}}
                                {{--                                                            <div class="col-md-4 mb-2 ml-2">--}}
                                {{--                                                                <button  type="button" data-toggle="modal" data-target="#replay_{{ $comment->id }}" class="btn btn-secondary" style="border-radius: 0;" >--}}
                                {{--                                                                    @lang('locale.view_attachments')--}}
                                {{--                                                                </button>--}}
                                {{--                                                            </div>--}}
                                {{--                                                        @endif--}}





                                <div class="modal-info mr-1 mb-1 d-inline-block">
                                    <div class="modal fade text-left" id="replay_attach_{{ $comment->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel130" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content" style="height:500px;width:700px;">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        {{--                                                                                                        @forelse(json_decode($comment->attachments) as $attach)--}}


                                                        {{--                                                                                                            <div class="col-md-4">--}}
                                                        {{--                                                                                                                <a  target="_blank" href="{{ asset('uploads/projects/'.$attach) }}">--}}

                                                        {{--                                                                                                                    @if(strpos($attach,'.pdf') !== false)--}}
                                                        {{--                                                                                                                        <img style="width:150px;height:180px;" src="{{ asset('pdf.png') }}" alt="">--}}
                                                        {{--                                                                                                                    @elseif(strpos($attach,'.xlsx') !== false || strpos($attach,'.xls') !== false || strpos($attach,'.csv') !== false || strpos($attach,'.txt') !== false)--}}
                                                        {{--                                                                                                                        <img style="width:150px;height:180px;" src="{{ asset('excel.png') }}" alt="">--}}

                                                        {{--                                                                                                                    @else--}}
                                                        {{--                                                                                                                        <img style="width:150px;height:200px;" src="{{ asset('uploads/projects/'.$attach) }}" alt="">--}}
                                                        {{--                                                                                                                    @endif--}}
                                                        {{--                                                                                                                </a>--}}

                                                        {{--                                                                                                            </div>--}}
                                                        {{--                                                                                                        @empty--}}
                                                        {{--                                                                                                            No Attachments found--}}
                                                        {{--                                                                                                        @endforelse--}}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal attachment-->

    <div class="modal fade bd-example-modal-lg" id="attachmentExample" tabindex="-1" role="dialog"
    aria-labelledby="attachmentLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attachmentLabel">Show Attachment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route("projectmanagement.admin.bugs.storeattachment",$bug->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    
                    @include('projectmanagement::admin.bugs.partials.attachmentform',['bug',$bug])
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">save</button>
                </div>
            </form>
           
        </div>
    </div>
</div>
<!-- Modal -->
@endsection

@section('scripts')

    {{--    For editor in texteara notes--}}
    <script>
        Dropzone.options.attachmentsDropzone = {
            url: '{{ route('projectmanagement.admin.task-attachments.storeMedia') }}',
            maxFilesize: 2, // MB
            maxFiles: 10,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function (file, response) {
                $('form').find('input[name="attachments"]').remove();
                $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove();
                if (file.status !== 'error') {
                    $('form').find('input[name="attachments[]"]').remove();
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                    @if(isset($transfer) && $transfer->attachments)
                var file = {!! json_encode($transfer->attachments) !!}
                        this.options.addedfile.call(this, file);
                file.previewElement.classList.add('dz-complete');
                $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">');
                this.options.maxFiles = this.options.maxFiles - 1;
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error');
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]');
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message)
                }
    
                return _results
            }
        }
    </script>
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
                                        xhr.open('POST', '/admin/projectmanagement/bugs/ckmedia', true);
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
                                        data.append('crud_id', {{ $bug->id ?? 0 }});
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

        // comment and replay on comment

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
        function addReplay(replay_id) {

            if (i % 2 == 0){

                document.getElementById("replay_"+replay_id).style.display = 'block';
                i++;
            }else {

                document.getElementById("replay_"+replay_id).style.display = 'none';
                i++;
            }

        }


    </script>

@endsection
