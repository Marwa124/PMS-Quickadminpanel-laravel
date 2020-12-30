@extends('header')
@section('title','Add FinalResult')


@extends('sidebar')



@section('content')



<div class="main" style="width:100%">
    <div>
        <form class="d-flex justify-content-start" action="{{route('finalresults.store')}}" method="post">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mr-5">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="status">

                                <option value="Pending">Pending</option>
                                <option value="Lost">Lost</option>
                                <option value="Won">Won</option>
                            </select>
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">CEO Comment</label>
                            <textarea class="form-control" name="ceo_comment" id="exampleFormControlInput1" placeholder="CEO Comment"></textarea>
                        </div>
                        <div class="form-group mr-5">
                            <label for="exampleFormControlInput1">Note</label>
                            <textarea class="form-control" name="note" id="exampleFormControlInput1" placeholder="Note"></textarea>
                        </div>

                    </div>
                    <div class="col-6">


                        <div class="form-group mr-5">
                            <label for="exampleFormControlSelect1">Sub-Status</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="sub_status">
                                <option value="in progress">in progress</option>
                                <option value="meeting">meeting</option>
                                <option value="Un Successful">Un Successful</option>
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