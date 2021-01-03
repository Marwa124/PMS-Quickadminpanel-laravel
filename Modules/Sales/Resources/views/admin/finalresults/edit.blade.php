@extends('header')
@section('title','Edit FinalResult')


@extends('sidebar')



@section('content')



    <div class="main" style="width:100%">
        <div>
            <form class="d-flex justify-content-start" action="{{route('finalresults.update',$finalresult->id)}}" method="post">
                @csrf
                @method('PUT')

                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mr-5">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="status">

                                    <option value="Pending" {{$finalresult->status == 'Pending' ? 'selected' : ''}}>Pending</option>
                                    <option value="Lost" {{$finalresult->status == 'Lost' ? 'selected' : ''}}>Lost</option>
                                    <option value="Won" {{$finalresult->status == 'Won' ? 'selected' : ''}}>Won</option>
                                </select>
                            </div>
                            <div class="form-group mr-5">
                                <label for="exampleFormControlInput1">CEO Comment</label>
                                <textarea class="form-control" name="ceo_comment" id="exampleFormControlInput1" placeholder="CEO Comment">{{ $finalresult->ceo_comment }}</textarea>
                            </div>
                            <div class="form-group mr-5">
                                <label for="exampleFormControlInput1">Note</label>
                                <textarea class="form-control" name="note" id="exampleFormControlInput1" placeholder="Note">{{ $finalresult->note }}</textarea>
                            </div>

                        </div>
                        <div class="col-6">


                            <div class="form-group mr-5">
                                <label for="exampleFormControlSelect1">Sub-Status</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="sub_status">
                                    <option value="in progress" {{$finalresult->sub_status == 'in progress' ? 'selected' : ''}}>in progress</option>
                                    <option value="meeting" {{$finalresult->sub_status == 'meeting' ? 'selected' : ''}}>meeting</option>
                                    <option value="Un Successful" {{$finalresult->sub_status == 'Un Successful' ? 'selected' : ''}}>Un Successful</option>


                                </select>
                            </div>
                            <div class="form-group mr-5">
                                <label for="exampleFormControlSelect1">Lead</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="lead_id">

                                    @if(!empty($leads))
                                        @foreach($leads as $lead)
                                            <option value="{{$lead->id}}" {{$lead->id == $finalresult->lead_id ? 'selected' : ''}}>{{$lead->client_name}}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-4 ml-3">
                            <button type="submit" class="btn btn-info"><i></i>Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>





@endsection
@extends('footer')