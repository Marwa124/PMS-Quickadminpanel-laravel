@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.calls.title_singular') }}
    </div>

    <div class="card-body">
            <form class="d-flex justify-content-start" action="{{route('sales.admin.calls.update',$call->id)}}" method="post">
                @csrf
                @method("PUT")
                <div class="container">

                    <input type="hidden" name="call" value="{{$call->call ?? ''}}">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mr-5">
                                <label for="exampleFormControlInput1">Call By</label>
                                <input type="text" name="call_by" value="{{$call->call_by ?? ''}}" class="form-control" id="exampleFormControlInput1" placeholder="Call By">
                            </div>

                            <div class="form-group mr-5">
                                <label for="exampleFormControlInput1">Note</label>
                                <textarea class="form-control" name="note" id="exampleFormControlInput1" placeholder="Note">{{$call->note ?? ''}}</textarea>
                            </div>

                            <div class="form-group mr-5">
                                <label for="exampleFormControlSelect1">Result</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="result_id">
                                    @if(!empty($results))
                                        @foreach($results as $result)
                                            <option value="{{$result->id}}" {{$call->result_id == $result->id ? 'selected':''}}>{{$result->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group mr-5">
                                <label for="exampleFormControlSelect1">Lead</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="lead_id">

                                    @if(!empty($leads))
                                        @foreach($leads as $lead)
                                            <option value="{{$lead->id}}" {{$call->lead_id == $lead->id ? 'selected':''}}>{{$lead->client_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>




                            <div class="form-group mr-5" style="padding-top: 30px">
                                <button type="submit" class="btn btn-info"><i></i>Save Changes</button>
                            </div>
                        </div>

                        <div class="col-6">



                            <div class="form-group mr-5">
                                <label for="exampleFormControlInput1"> Date</label>
                                <input type="date" class="form-control" name="date" value="{{$call->date ?? ''}}" id="exampleFormControlInput1" placeholder="select date">
                            </div>


                            <div class="form-group mr-5">
                                <label for="exampleFormControlInput1">Next Action</label>
                                <textarea class="form-control" name="next_action" id="exampleFormControlInput1" placeholder="Next Action">{{$call->next_action ?? ''}}</textarea>
                            </div>


                            <div class="form-group mr-5">
                                <label for="exampleFormControlInput1">Next Action Date</label>
                                <input type="date" class="form-control" value="{{$call->next_action_date ?? ''}}" name="next_action_date" id="exampleFormControlInput1" placeholder="select date">
                            </div>

                            <div class="form-group mr-5">
                                <label for="exampleFormControlSelect1">Qualification</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="qualification">
                                    <option value="Qualified-Meeting" {{$call->qualification == 'Qualified-Meeting' ? 'selected' : ''}}>Qualified-Meeting</option>
                                    <option value="Qualified-Follow Up" {{$call->qualification == 'Qualified-Follow Up' ? 'selected' : ''}}>Qualified-Follow Up</option>
                                    <option value="Proposal Sent" {{$call->qualification == 'Proposal Sent' ? 'selected' : ''}}>Proposal Sent</option>
                                    <option value="Qualified-Survey" {{$call->qualification == 'Qualified-Survey' ? 'selected' : ''}}>Qualified-Survey</option>
                                    <option value="Qualified-Postponed" {{$call->qualification == 'Qualified-Postponed' ? 'selected' : ''}}>Qualified-Postponed</option>
                                    <option value="Un-Qualified" {{$call->qualification == 'Un-Qualified' ? 'selected' : ''}}>Un-Qualified</option>
                                    <option value="other" {{$call->qualification == 'other' ? 'selected' : ''}}>other</option>

                                </select>
                            </div>




                        </div>

            </form>
 </div>
</div>

@endsection
@section('scripts')
@parent
@endsection

