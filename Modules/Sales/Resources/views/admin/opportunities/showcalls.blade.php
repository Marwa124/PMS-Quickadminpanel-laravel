<div class="row">
    <div class="col-6">
        <div class="form-group mr-5">
            <label for="call_by">Call By</label>
            
            <input type="text" name="call_by" class="form-control" id="call_by" disabled>
        </div>

        <div class="form-group mr-5">
            <label for="note">Note</label>
            <textarea class="form-control" name="note" id="note"  placeholder="Note" disabled></textarea>
        </div>

        <div class="form-group mr-5">
            <label for="result_id">Result</label>
            <select class="form-control" id="result_id"
                name="result_id" disabled>
                @if(!empty($results))
                @foreach($results as $key=>$result)
                <option value="{{$key}}">{{$result}}
                </option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="form-group mr-5">
            <label for="client_id">clients</label>
            <select class="form-control" id="client_id"
                name="client_id" disabled>

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
            <label for="date"> Date</label>
            <input type="date" class="form-control" name="date"
                id="date" placeholder="select date" disabled>
        </div>


        <div class="form-group mr-5">
            <label for="next_action">Next Action</label>
            <textarea class="form-control" name="next_action"
                id="next_action"
                placeholder="Next Action" disabled></textarea>
        </div>


        <div class="form-group mr-5">
            <label for="next_action_date">Next Action
                Date</label>
            <input type="date" class="form-control"
                name="next_action_date" id="next_action_date"
                placeholder="select date" disabled>
        </div>

        <div class="form-group mr-5">
            <label for="qualification">Qualification</label>
            <select class="form-control" id="qualification"
                name="qualification" disabled>
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
 
</div> 