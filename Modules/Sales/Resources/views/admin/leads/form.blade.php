
                <div class="row">
                    <div class="col-6">
                  
                        <div class="form-group mr-5">
                            <label for="exampleFormControlSelect1">Type</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="type_id">
                                @if(!empty($types))
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                                @endif

                            </select>
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Product</label>
                            <input type="text" name="product" class="form-control" id="exampleFormControlInput1" placeholder="Type Product">
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Client Name</label>
                            <input required type="text" name="client_name" class="form-control" id="exampleFormControlInput1" placeholder="Type Client Name">
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Company</label>
                            <input type="text" name="company" class="form-control" id="exampleFormControlInput1" placeholder="Type Company">
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">WWW</label>
                            <input type="text" name="site_url" class="form-control" id="exampleFormControlInput1" placeholder="Type site url">
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlSelect1">Code</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="country_code">
                                @if(!empty($types))
                                @foreach($codes as $code)
                                <option value="{{$code->code}}">{{$code->code}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Phone 1</label>
                            <input type="text" name="phone1" class="form-control" id="exampleFormControlInput1" placeholder="Type First Phone no.">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Phone 2</label>
                            <input type="text" name="phone2" class="form-control" id="exampleFormControlInput1" placeholder="Type Second Phone no.">
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Type Email">
                        </div>

                        <div class="form-group mr-5">
                            <label for="exampleFormControlSelect1">WAY OF Communication</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="way_of_communication">

                                <option value="Direct Call">Direct Call</option>
                                <option value="Whatsapp">Whatsapp</option>
                                <option value="SMS">SMS</option>
                                <option value="E Mail">E Mail</option>
                            </select>
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Contacted Date</label>
                            <input type="date" class="form-control" name="contacted_date" id="exampleFormControlInput1" placeholder="select date">
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Note</label>
                            <textarea class="form-control" name="notes" id="exampleFormControlInput1" placeholder="Note"></textarea>
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Next Action Date</label>
                            <input type="date" class="form-control" name="next_action_date" id="exampleFormControlInput1" placeholder="select date">
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlSelect1">Priority</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="priority">

                                <option value="URGENT">URGENT</option>
                                <option value="NORMAL">NORMAL</option>
                                <option value="LOW">LOW</option>
                                <option value="VIP">VIP</option>
                            </select>
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlSelect1">Contacted</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="contracted">
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
                    <!-- <div class="form-group ml-3">
                        <button type="submit" class="btn btn-info"><i></i>Save Changes</button>
                    </div> -->
                </div>
            