
@extends('layouts.admin')
@section('content')

<div class="main" style="width:100%">
    <div >
        <form class="" action="{{route('sales.admin.results.store')}}" method="post">
            @csrf
            <div class="form-group mr-5">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" name="name" class="form-control w-50" id="exampleFormControlInput1" placeholder="Type Name">
            </div>
            <div class="form-group mr-5">
            <button   type="submit" class="btn btn-info" ><i></i>Save Changes</button>
            </div>
        </form>
    </div>

</div>





@endsection
