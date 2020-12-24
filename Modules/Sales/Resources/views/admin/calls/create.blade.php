@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.calls.title_singular') }}
    </div>

    <div class="card-body">
        <form class="d-flex justify-content-start" action="{{route('sales.admin.calls.store')}}" method="post">
            @csrf
            <div class="container">

                <input type="hidden" name="call">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Call By</label>
                            <input type="text" name="call_by" class="form-control" id="exampleFormControlInput1" placeholder="Call By">
                        </div>

                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Note</label>
                            <textarea class="form-control" name="note" id="exampleFormControlInput1" placeholder="Note"></textarea>
                        </div>

                        <div class="form-group mr-5">
                            <label for="exampleFormControlSelect1">Result</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="result_id">
                                @if(!empty($results))
                                    @foreach($results as $result)
                                        <option value="{{$result->id}}">{{$result->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlSelect1">Lead</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="lead_id">

                                @if(!empty($leads))
                                    @foreach($leads as $lead)
                                        <option value="{{$lead->id}}" {{isset($_GET['id']) && $_GET['id'] == $lead->id ? 'selected' : ''}}>{{$lead->client_name}}</option>
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
                            <input type="date" class="form-control" name="date" id="exampleFormControlInput1" placeholder="select date">
                        </div>


                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Next Action</label>
                            <textarea class="form-control" name="next_action" id="exampleFormControlInput1" placeholder="Next Action"></textarea>
                        </div>


                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Next Action Date</label>
                            <input type="date" class="form-control" name="next_action_date" id="exampleFormControlInput1" placeholder="select date">
                        </div>

                        <div class="form-group mr-5">
                            <label for="exampleFormControlSelect1">Qualification</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="qualification">
                                <option value="Qualified-Meeting">Qualified-Meeting</option>
                                <option value="Qualified-Follow Up">Qualified-Follow Up</option>
                                <option value="Proposal Sent">Proposal Sent</option>
                                <option value="Qualified-Survey">Qualified-Survey</option>
                                <option value="Qualified-Postponed">Qualified-Postponed</option>
                                <option value="Un-Qualified">Un-Qualified</option>
                                <option value="other">other</option>
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