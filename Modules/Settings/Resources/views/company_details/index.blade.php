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

        


                <div class="tab-pane fade" id="v-pills-tasks" role="tabpanel" aria-labelledby="v-pills-tasks-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="horizontal">
                                <a class="nav-link active" id="v-pills-task-tab" data-toggle="pill" href="#v-pills-task"
                                   role="tab" aria-controls="v-sub_pills-task"
                                   aria-selected="true"> </a>
                          
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-task" role="tabpanel"
                         aria-labelledby="v-pills-task-tab">
                        <div class="card">
                            <div>
                                <div class="card-header">

                                    <div class="table-responsive">
                                        <table
                                            class=" table table-bordered table-striped table-hover datatable datatable-Task">
                                            <thead>
                                            <tr>

                                                <th>
                                                      
                                                </th>
                                                <th>
                                                      
                                                </th>
                                                <th>
                                                      
                                                </th>
                                                <th>
                                                      
                                                </th>
                                                <th>
                                                      
                                                </th>
                                                <th>
                                                      
                                                </th>
                                                <th>

                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                     
                                                <tr>
                                                    <td colspan="7">
                                                    </td>
                                                </tr>
                                     
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-comments" role="tabpanel" aria-labelledby="v-pills-comments-tab">
                    ...
                </div>
            </div>
        </div>
    </div>
@endsection


