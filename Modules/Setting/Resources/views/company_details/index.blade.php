@extends('layouts.admin')
<style>


.row {
    margin-bottom: 15px !important;
}    

h5 {
    font-size: 14px !important;
}    

body{
    font-family: "Source Sans Pro", sans-serif;
    color: #868686 !important;
}

    .nav-pills a{
        background-color: #ffffff !important;
        color: #191818 !important;
        border-radius: 0;
        padding: 10px 15px;
        border-radius: 0 !important; 

    }
    .nav .active{
        background-color: #ec2121 !important;
        color: #ffffff !important;
    }
    i{
        margin-right:3px;
    }

    .card{
    margin-bottom: 21px;
    background-color: #fff !important;
    border: 1px solid transparent;
    }

    .card-custom{
        box-shadow: 0 3px 12px 0 rgba(0, 0, 0, 0.15) !important;
    }
    .card-header {
        border-bottom: 2px solid #ec2121 !important;
        background-color: #fff !important;
        /* padding: 10px 15px !important; */

    }

    .select2-container--default .select2-selection--single{
        height: 34px !important;
    }

</style>


@section('styles')
<script src="{{ asset('js/toast.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/toast.min.css') }}">
@endsection
@section('content')
    <div class="row">




        <div class="col-3">


            @include('setting::partials.nav')

      




        </div>
        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">

                @include('setting::tabs.company_details')


                @include('setting::tabs.company_system')
                @include('setting::tabs.email_settings')



            </div>
        </div>
    </div>


@endsection


@if(session()->has('pill'))
<script>
    console.log('here')
window.onload = (event) => {

   
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });



    var pill = '{{ session()->get('pill','company-details') }}'

    //reset all tabs
    $('.nav-pills .nav-link').attr('aria-selected',false)
    $('.nav-pills .nav-link').removeClass('active')
    $('.tab-content .tab-pane').removeClass('active').removeClass('show')

    //open the wanted tab
    $('.nav-pills .'+pill).attr('aria-selected',true)
    $('.nav-pills .'+pill).addClass('active')
    $('.tab-content .'+pill).addClass('active').addClass('show')
};




   
</script>

@endif 


