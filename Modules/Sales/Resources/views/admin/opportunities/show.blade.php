@extends('layouts.admin')
@section('content')
@inject('accountDetailModel', 'Modules\HR\Entities\AccountDetail')

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
                        {{-- <a class="nav-link" id="v-pills-notes-tab" data-toggle="pill" href="#v-pills-notes" role="tab"  aria-controls="v-pills-notes"   aria-selected="false">Comments</a> --}}
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
                                <h6 class="card-header">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-Tasks-tab" data-toggle="pill" href="#pills-Tasks" role="tab" aria-controls="pills-Tasks" aria-selected="true">calls</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-newTasks-tab" data-toggle="pill" href="#pills-newTasks" role="tab" aria-controls="pills-newTasks" aria-selected="false">New calls</a>
                                        </li>
                                    </ul>

                                </h6>
                            <div class="card-body">
                                
                                <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-Tasks" role="tabpanel" aria-labelledby="pills-Tasks-tab">
                                  
                                        <table class=" table table-bordered table-striped table-hover datatable datatable-Task " >
                                            <thead>
                                                <tr>
                                                    <th >
                            
                                                    </th>
                                                    
                                                    <th>
                                                        {{ trans('cruds.opportunity.fields.data_contact') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.opportunity.fields.opportunity_qualification') }}
                                                    </th>
                                                
                                                    <th>
                                                        {{ trans('cruds.opportunity.fields.Contact_With') }}
                                                    </th>
                                                    <th>
                                                        {{ trans('cruds.opportunity.fields.call_by') }}
                                                    </th>
                                                    <th>
                                                        &nbsp;
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                            @if($opportunity->calls)
                                                @forelse($opportunity->calls as $key => $call)
                                                    <tr data-entry-id="{{ $call->id }}">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $call->date }}</td>
                                                        <td>{{ $call->qualification }}</td>
                                                        <td>{{ !empty($call->client)?$call->client->name:'' }}</td>
                                                        <td>{{ $call->call_by }}</td>
                                                        <td>
                                                            <a href="javascript:;"  data-id="{{ $call->id }}" data-toggle="modal" data-target="#exampleModal" 
                                                            data-call_by="{{ $call->call_by}}" 
                                                            data-date="{{ $call->date}}"
                                                            data-note="{{ $call->note}}" 
                                                            data-next_action="{{ $call->next_action}}" 
                                                            data-next_action_date="{{ $call->next_action_date}}" 
                                                            data-call="{{ $call->call}}" 
                                                            data-qualification="{{ $call->qualification}}"
                                                            data-result_id="{{ $call->result_id}}" 
                                                            data-opportunities_id="{{ $call->opportunities_id}}" 
                                                            data-client_id="{{ $call->client_id}}" ><i class="fas fa-eye"></i></a></td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="9" >
                                                            <center> {{trans('cruds.messages.no_Calls_found_in_Opportunity')}} </center>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            @else
                                                <tr>
                                                    <td colspan="9" >
                                                        {{trans('cruds.messages.no_Calls_found_in_Opportunity')}}
                                                    </td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    
                                </div>
                                <div class="tab-pane fade" id="pills-newTasks" role="tabpanel" aria-labelledby="pills-newTasks-tab">
                                   
                                        <form action="{{route('sales.admin.opportunities.calls')}}" method="post">
                                            @csrf
                                            <div class="container">

                                                <input type="hidden" name="opportunities_id" value="{{$opportunity->id}}">

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group mr-5">
                                                            <label for="exampleFormControlInput1">Call By</label>
                                                            <input type="text" name="call_by" class="form-control"
                                                                id="exampleFormControlInput1" placeholder="Call By">
                                                        </div>

                                                        <div class="form-group mr-5">
                                                            <label for="exampleFormControlInput1">Note</label>
                                                            <textarea class="form-control" name="note"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Note"></textarea>
                                                        </div>

                                                        <div class="form-group mr-5">
                                                            <label for="exampleFormControlSelect1">Result</label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                                name="result_id">
                                                                @if(!empty($results))
                                                                @foreach($results as $key=>$result)
                                                                <option value="{{$key}}">{{$result}}
                                                                </option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group mr-5">
                                                            <label for="exampleFormControlSelect1">clients</label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                                name="client_id">

                                                                @if(!empty($clients))
                                                                @foreach($clients as $keyclient=>$client)
                                                                <option value="{{$keyclient}}">
                                                                    {{$client}}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>

                                                      
                                                    </div>

                                                    <div class="col-6">

                                                        <div class="form-group mr-5">
                                                            <label for="exampleFormControlInput1"> Date</label>
                                                            <input type="date" class="form-control" name="date"
                                                                id="exampleFormControlInput1" placeholder="select date">
                                                        </div>


                                                        <div class="form-group mr-5">
                                                            <label for="exampleFormControlInput1">Next Action</label>
                                                            <textarea class="form-control" name="next_action"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Next Action"></textarea>
                                                        </div>


                                                        <div class="form-group mr-5">
                                                            <label for="exampleFormControlInput1">Next Action
                                                                Date</label>
                                                            <input type="date" class="form-control"
                                                                name="next_action_date" id="exampleFormControlInput1"
                                                                placeholder="select date">
                                                        </div>

                                                        <div class="form-group mr-5">
                                                            <label for="exampleFormControlSelect1">Qualification</label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                                name="qualification">
                                                                <option value="Qualified-Meeting">Qualified-Meeting
                                                                </option>
                                                                <option value="Qualified-Follow Up">Qualified-Follow Up
                                                                </option>
                                                                <option value="Proposal Sent">Proposal Sent</option>
                                                                <option value="Qualified-Survey">Qualified-Survey
                                                                </option>
                                                                <option value="Qualified-Postponed">Qualified-Postponed
                                                                </option>
                                                                <option value="Un-Qualified">Un-Qualified</option>
                                                                <option value="other">other</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-12">

                                                        <div class="form-group mr-5" style="padding-top: 30px">
                                                            <button type="submit" class="btn btn-info"><i></i>Save
                                                                Changes</button>
                                                        </div>

                                                    </div>
                                               </div> 
                                           </div>

                                        </form>
                                  
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                    <div class="tab-pane fade" id="v-pills-bugs" role="tabpanel" aria-labelledby="v-pills-bugs-tab">
                        <div class="card">
                            <h6 class="card-header">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-meeting-tab" data-toggle="pill" href="#pills-meeting" role="tab" aria-controls="pills-Tasks" aria-selected="true">Meeting</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-meetingnew-tab" data-toggle="pill" href="#pills-meetingnew" role="tab" aria-controls="pills-newTasks" aria-selected="false">New Meeting</a>
                                    </li>
                                </ul>

                            </h6>
                        <div class="card-body">
                            
                            <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-meeting" role="tabpanel" aria-labelledby="pills-meeting-tab">
                                <table class=" table table-bordered table-striped table-hover datatable datatable-meetingss ">
                                <thead>
                                    <tr>
                                       
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            {{ trans('cruds.opportunity.fields.user') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.opportunity.fields.name') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.opportunity.fields.attendees') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.opportunity.fields.start_date') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.opportunity.fields.end_date') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.opportunity.fields.location') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.opportunity.fields.description') }}
                                        </th>
                                        <th>
                                         action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($opportunity->meetings)
                                    @forelse($opportunity->meetings as $key => $meetingMinute)
                                    <tr data-entry-id="{{ $meetingMinute->id }}">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                       
                                        <td>
                                           
                                            {{ $meetingMinute->user->accountDetail->fullname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $meetingMinute->name ?? '' }}
                                        </td>
                                        <td>
                                            @foreach ($meetingMinute->attendees as $item)
                                           
                                            @php
                                            $userName = $accountDetailModel::where('user_id', $item)->pluck('fullname')->first();
                                            @endphp
                                            {{ $userName ?? '' }} <?php echo "</br>"; ?>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $meetingMinute->start_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $meetingMinute->end_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $meetingMinute->location ?? '' }}
                                        </td>
                                        <td>
                                            {{ $meetingMinute->description ?? '' }}
                                        </td>
                                        <td>
                                            <form action="{{ route('sales.admin.opportunities.destroymeeting', $meetingMinute->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                        </td>
                                    </tr>
                                 
                                    @empty
                                        <tr>
                                            <td colspan="8" >
                                                <center> {{trans('cruds.messages.no_Meetings_found_in_Opportunity')}} </center>
                                            </td>
                                        </tr>
                                    @endforelse
                                    @else
                                        <tr>
                                            <td colspan="8" >
                                                {{trans('cruds.messages.no_Meetings_found_in_Opportunity')}}
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pills-meetingnew" role="tabpanel" aria-labelledby="pills-meetingnew-tab">
                               
                                <form method="POST" action="{{ route("sales.admin.opportunities.storemeeting") }}" enctype="multipart/form-data">
                                    @csrf
                                    <input name="opportunities_id" value="{{ $opportunity->id }}" type="hidden">
                                    <div class="form-group">
                                        <label class="required" for="user_id">{{ trans('cruds.opportunity.fields.responsible') }}</label>
                                        <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                                            @foreach($users as $id => $user)
                                                <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('user'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('user') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.opportunity.fields.user_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="name">{{ trans('cruds.opportunity.fields.name') }}</label>
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.opportunity.fields.name_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ trans('cruds.opportunity.fields.attendees') }}</label>
                                        <select class="form-control" name="attendees[]" id="attendees" multiple="multiple">
                                            @foreach($users as $key => $label)
                                                <option value="{{ $key }}" {{ old('attendees') === (string) $key ? 'selected' : '' }} {{ $key == 0 ? 'disabled' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('attendees'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('attendees') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.opportunity.fields.attendees_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="start_date">{{ trans('cruds.opportunity.fields.start_date') }}</label>
                                        <input class="form-control datetime {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                                        @if($errors->has('start_date'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('start_date') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.opportunity.fields.start_date_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="end_date">{{ trans('cruds.opportunity.fields.end_date') }}</label>
                                        <input class="form-control datetime {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                                        @if($errors->has('end_date'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('end_date') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.opportunity.fields.end_date_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="location">{{ trans('cruds.opportunity.fields.location') }}</label>
                                        <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', '') }}">
                                        @if($errors->has('location'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('location') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.opportunity.fields.location_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ trans('cruds.opportunity.fields.description') }}</label>
                                        <textarea class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                                        @if($errors->has('description'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('description') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.opportunity.fields.description_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger" type="submit">
                                            {{ trans('global.save') }}
                                        </button>
                                    </div>
                                </form>
                              
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
                                        @if ($opportunity->attachments)
                                        @forelse($opportunity->attachments as $key => $attach)
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
                                               <a href="{{route('sales.admin.opportunities.download.attach',$attach->id)}}" target="_blank"><i
                                                  class="fas fa-download"></i></a>
                                               <a href="{{route('sales.admin.opportunities.view.attach',$attach->id)}}" target="_blank"><i
                                                    class="fas fa-eye"></i></a>
                                                    <a href="{{route('sales.admin.opportunities.delete.attach',[$attach->id,$attach->id])}}"><i
                                                             class="fas fa-trash-alt"></i> </a>    
                                            </td>
                    
                                        </tr>
                                    
                                        @empty
                                            <tr>
                                                <td colspan="8" >
                                                    <center> {{trans('cruds.messages.no_Meetings_found_in_Opportunity')}} </center>
                                                </td>
                                            </tr>
                                        @endforelse
                                        @else
                                            <tr>
                                                <td colspan="8" >
                                                    {{trans('cruds.messages.no_Meetings_found_in_Opportunity')}}
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal -->

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show Calls</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                    <div class="modal-body">
                        @include('sales::admin.opportunities.showcalls', ['results' => $results,'clients'=>$clients])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
               
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal attachment-->

    <div class="modal fade bd-example-modal-lg" id="attachmentExample" tabindex="-1" role="dialog"
        aria-labelledby="attachmentLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attachmentLabel">Show Calls</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route("sales.admin.opportunities.storeattachment",$opportunity->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        
                        @include('sales::admin.opportunities.attachmentform',['opportunity',$opportunity])
                      
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

    @parent
    <script>

        $('#exampleModal').on('show.bs.modal', function (event) {
          
            var button = $(event.relatedTarget) // Button that triggered the modal
            var call_by = button.data('call_by') // Extract info from data-* attributes
            var date = button.data('date') // Extract info from data-* attributes
            var note = button.data('note') // Extract info from data-* attributes
            var next_action = button.data('next_action') // Extract info from data-* attributes
            var next_action_date = button.data('next_action_date') // Extract info from data-* attributes
            var call = button.data('call') // Extract info from data-* attributes
            var qualification = button.data('qualification') // Extract info from data-* attributes
            var result_id = button.data('result_id') // Extract info from data-* attributes
            var opportunities_id = button.data('opportunities_id') // Extract info from data-* attributes
            var client_id = button.data('client_id') // Extract info from data-* attributes
            var modal = $(this)
            modal.find('#call_by').val(call_by)
            modal.find('#date').val(date)
            modal.find('#note').val(note)
            modal.find('#next_action').val(next_action)
            modal.find('#next_action_date').val(next_action_date)
            modal.find('#call').val(call)
            modal.find('#qualification').val(qualification).change()
            modal.find('#result_id').val(result_id).change()
            modal.find('#opportunities_id').val(opportunities_id).change()
            modal.find('#client_id').val(client_id).change()
        });

    </script>
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
          // done
        $('.datatable-meetingss').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });
      // done
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
        // done
        $('.datatable-attachment').DataTable()
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
       
     $('#attendees').select2();
    });
</script>

   {{-- attachment --}}
   <script>
    Dropzone.options.attachmentsDropzone = {
        url: '{{ route('projectmanagement.admin.task-attachments.storeMedia') }}',
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
@endsection