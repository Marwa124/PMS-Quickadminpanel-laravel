<div class="row">
    <div class="col-6">
      
        <div class="form-group mr-5">
            <label for="type_id">Type</label>
            <select class="form-control" id="type_id" name="type_id">
                @if(!empty($types))
                @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
                @endif

            </select>
        </div>
        <div class="form-group mr-5">
            <label for="product">Product</label>
            <input type="text" name="product" class="form-control" id="product" placeholder="Type Product">
        </div>
        <div class="form-group mr-5">
            <label for="client_name">Client Name</label>
            <input required type="text" name="client_name" class="form-control" id="client_name"
                placeholder="Type Client Name">
        </div>
        <div class="form-group mr-5">
            <label for="company">Company</label>
            <input type="text" name="company" class="form-control" id="company" placeholder="Type Company">
        </div>
        <div class="form-group mr-5">
            <label for="site_url">WWW</label>
            <input type="text" name="site_url" class="form-control" id="site_url" placeholder="Type site url">
        </div>
        <div class="form-group mr-5">
            <label for="country_code">Code</label>
            <select class="form-control" id="country_code" name="country_code">
                @if(!empty($types))
                @foreach($codes as $code)
                <option value="{{$code->code}}">{{$code->code}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="form-group mr-5">
            <label for="phone1">Phone 1</label>
            <input type="text" name="phone1" class="form-control" id="phone1" placeholder="Type First Phone no.">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mr-5">
            <label for="phone2">Phone 2</label>
            <input type="text" name="phone2" class="form-control" id="phone2" placeholder="Type Second Phone no.">
        </div>
        <div class="form-group mr-5">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Type Email">
        </div>

        <div class="form-group mr-5">
            <label for="way_of_communication">WAY OF Communication</label>
            <select class="form-control" id="way_of_communication" name="way_of_communication">

                <option value="Direct Call">Direct Call</option>
                <option value="Whatsapp">Whatsapp</option>
                <option value="SMS">SMS</option>
                <option value="E Mail">E Mail</option>
            </select>
        </div>
        <div class="form-group mr-5">
            <label for="contacted_date">Contacted Date</label>
            <input type="date" class="form-control" name="contacted_date" id="contacted_date" placeholder="select date">
        </div>
        <div class="form-group mr-5">
            <label for="notes">Note</label>
            <textarea class="form-control" name="notes" id="notes" placeholder="Note"></textarea>
        </div>
        <div class="form-group mr-5">
            <label for="next_action_date">Next Action Date</label>
            <input type="date" class="form-control" name="next_action_date" id="next_action_date"
                placeholder="select date">
        </div>
        <div class="form-group mr-5">
            <label for="priority">Priority</label>
            <select class="form-control" id="priority" name="priority">

                <option value="URGENT">URGENT</option>
                <option value="NORMAL">NORMAL</option>
                <option value="LOW">LOW</option>
                <option value="VIP">VIP</option>
            </select>
        </div>
        <div class="form-group mr-5">
            <label for="contracted">Contacted</label>
            <select class="form-control" id="contracted" name="contracted">
                <option value="Busy">Busy</option>
                <option value="Call Later">Call Later</option>
                <option value="No Answer">No Answer</option>
                <option value="Not Interested">Not Interested</option>
                <option value="Out Of Service">Out Of Service</option>
                <option value="Product Not Available">Product Not Available</option>
                <option value="Switched OFF">Switched OFF</option>
                <option value="Undefined">Undefined</option>
                <option value="Whatsapp">Whatsapp</option>
                <option value="Wrong Number">Wrong Number</option>
                <option value="YES - INTERESTED">YES - INTERESTED</option>
                <option value="YES - Not Qualified">YES - Not Qualified</option>
            </select>
        </div>
    </div>

</div>