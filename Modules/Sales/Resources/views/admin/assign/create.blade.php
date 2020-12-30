@extends('header')
@section('title','Assign Leads')


@section('style')
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@extends('sidebar')


@section('content')




    <div class="main" style="width:100%">
        <div>
            <form class="" action="{{route('assignPost')}}" method="post">
                @csrf
                <div class="row">

                    <div class="form-group mr-5">
                        <label for="exampleFormControlInput1">Leads</label>
                        <select class="js-example-basic-multiple" name="leads[]" multiple="multiple">
                            @foreach($leads as $lead)
                                <option value="{{$lead->id}}">{{$lead->client_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mr-5">
                        <label for="exampleFormControlInput1">User</label>
                        <select class="js-example-basic-single" name="user">
                            <option>....</option>
                            @foreach($users as $user)
                                <option value="{{$user->user_id}}">{{$user->username}}</option>
                            @endforeach
                        </select>
                    </div>


                </div>



                <div class="form-group mr-5">
                    <button type="submit" class="btn btn-info"><i></i>Save Changes</button>
                </div>
            </form>
        </div>

    </div>






@endsection
@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection

@extends('footer')
