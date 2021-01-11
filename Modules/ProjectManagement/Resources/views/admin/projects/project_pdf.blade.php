<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$project->name}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />--}}
    {{--<link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />--}}

    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />--}}
    {{--<link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />--}}

    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet" />--}}
    {{--<link href="{{ asset('css/custom.css') }}" rel="stylesheet" />--}}

    <style>
        @charset "UTF-8";
        @import url(https://fonts.googleapis.com/css?family=Fira+Sans:200,400,500);
        * {
            border: 0;
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
        }

        /*body {*/
        /*    height: inherit;*/
        /*    display: -webkit-box;*/
        /*    display: -ms-flexbox;*/
        /*    display: flex;*/
        /*    -webkit-box-orient: vertical;*/
        /*    -webkit-box-direction: normal;*/
        /*    -ms-flex-direction: column;*/
        /*    flex-direction: column;*/
        /*    font-family: 'Fira Sans', sans-serif;*/
        /*    -webkit-font-smoothing: antialiased;*/
        /*    -moz-osx-font-smoothing: grayscale;*/
        /*    color: #79838c;*/
        /*}*/

        /*a {*/
        /*    color: #50585f;*/
        /*    text-decoration: none;*/
        /*}*/

        a:hover {
            color: #383e44;
        }

        div.container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            max-height: 100%;
        }

        div.header {
            height: auto;
            text-align: center;
            background: slategrey;
            color: ghostwhite;
            padding: 2.3rem 1rem 2.3rem 1rem;
            position: relative;
        }

        div.header:after {
            content: '';
            position: absolute;
            bottom: -5rem;
            left: 0rem;
            height: 5.1rem;
            display: block;
            width: 100%;
            z-index: 300;
            /* FF3.6-15 */
            /* Chrome10-25,Safari5.1-6 */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(20%, white), to(rgba(255, 255, 255, 0)));
            background: linear-gradient(to bottom, white 20%, rgba(255, 255, 255, 0) 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#00ffffff',GradientType=0 );
            /* IE6-9 */
        }

        div.header h1 {
            margin-top: .8rem;
            margin-bottom: .5rem;
            font-weight: 200;
            font-size: 1.6em;
            letter-spacing: 0.1rem;
            text-transform: uppercase;
        }

        @media (min-width: 62em) {
            div.header h1 {
                font-size: 1.9em;
                letter-spacing: 0.2rem;
            }
        }

        div.header h2 {
            font-size: 1.1em;
            font-weight: 400;
            color: #cfd7de;
            max-width: 30rem;
            margin: auto;
        }

        div.item {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: auto;
            flex: auto;
            overflow-y: auto;
            padding: 0rem 1rem 0rem 1rem;
        }

        #timeline {
            position: relative;
            display: table;
            height: 100%;
            margin-left: -2rem;
            margin-right: 2rem;
            margin-top: 3rem;
            margin-bottom: 2rem;
        }

        #timeline div:after {
            content: '';
            width: 2px;
            position: absolute;
            top: -1.2rem;
            bottom: 0rem;
            left: 58px;
            z-index: 1;
            background: #C5C5C5;
        }

        #timeline h3 {
            position: -webkit-sticky;
            position: sticky;
            top: 5rem;
            color: #888;
            margin: 0;
            font-size: 1em;
            font-weight: 400;
        }

        @media (min-width: 62em) {
            #timeline h3 {
                font-size: 1.1em;
            }
        }

        #timeline section.year {
            position: relative;
        }

        #timeline section.year:first-child section {
            margin-top: -1.3em;
            padding-bottom: 0px;
        }

        #timeline section.year section {
            position: relative;
            padding-bottom: 1.25em;
            margin-bottom: 2.2em;
        }

        #timeline section.year section h4 {
            position: absolute;
            bottom: 0;
            font-size: .9em;
            font-weight: 400;
            line-height: 1.2em;
            margin: 0;
            padding: 0 0 0 89px;
            color: #C5C5C5;
        }

        @media (min-width: 62em) {
            #timeline section.year section h4 {
                font-size: 1em;
            }
        }

        #timeline section.year section ul {
            list-style-type: none;
            padding: 0 0 0 75px;
            margin: -1.35rem 0 1em;
            max-width: 32rem;
            font-size: 1em;
        }

        @media (min-width: 62em) {
            #timeline section.year section ul {
                font-size: 1.1em;
                padding: 0 0 0 81px;
            }
        }

        #timeline section.year section ul:last-child {
            margin-bottom: 0;
        }

        #timeline section.year section ul:first-of-type:after {
            content: '';
            width: 10px;
            height: 10px;
            background: #C5C5C5;
            border: 2px solid #FFFFFF;
            border-radius: 50%;
            position: absolute;
            left: 54px;
            top: 3px;
            z-index: 2;
        }

        #timeline section.year section ul li {
            margin-left: .5rem;
        }

        #timeline section.year section ul li:before {
            content: '·';
            margin-left: -.5rem;
            padding-right: .3rem;
        }

        #timeline section.year section ul li:not(:first-child) {
            margin-top: .5rem;
        }

        #timeline section.year section ul li span.price {
            color: mediumturquoise;
            font-weight: 500;
        }

        #price {
            display: inline;
        }

        svg {
            border: 3px solid white;
            border-radius: 50%;
            -webkit-box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
        }
        /*# sourceMappingURL=index.css.map */
    </style>
</head>
    <body>

    <div class="row  p-5">
        <div class="col-12 ">
            <div class="card">
        <h5 class="card-header"> {{ trans('cruds.project.title') }} {{ trans('cruds.project.fields.name') }} : {{ $project->name }}

        </h5>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="col-sm-4 border-right ">

                    <div class="pl-1 ">

                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.start_date') }} :</p> <span class="col-md-6">{{ $project->start_date }}</span> </div>
                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.end_date') }} :</p> <span class="col-md-6">{{ $project->end_date }}</span> </div>
                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.demo_url') }} :</p> <span class="col-md-6">{{ $project->demo_url }}</span> </div>
                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.project_status') }} : </p><span class="col-md-6">{{ ucwords(str_replace('_',' ',$project->project_status)) }}</span> </div>
                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.estimate_hours') }} :</p> <span class="col-md-6">{{ $project->estimate_hours ? $project->estimate_hours.' Hour' : '' }} </span> </div>
                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.department.title_singular') }} {{ trans('cruds.project.fields.name') }} :</p> <span class="col-md-6">{{ $project->department->department_name }}</span> </div>
                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.project_cost') }} :</p> <span class="col-md-6">{{ $project->project_cost?? 0 }} EGP</span> </div>

                    </div>
                </div>
                <div class="col-sm-4 border-right ">
                    <div class=" pl-1">

                        <div class="row"> <p class="font-bold col-md-8">Total Expense :</p> <span class="col-md-4"> {{$total_expense}} EGP</span> </div>
                        <div class="row"> <p class="font-bold col-md-8">Billable Expense :</p> <span class="col-md-4"> {{$billable_expense}} EGP</span> </div>
                        <div class="row"> <p class="font-bold col-md-8">Non Billable Expense :</p> <span class="col-md-4"> {{$not_billable_expense}} EGP</span> </div>
                        <div class="row"> <p class="font-bold col-md-8">Billed Expense :</p> <span class="col-md-4"> {{$paid_expense}} EGP</span> </div>
                        <div class="row"> <p class="font-bold col-md-8">Unbilled Expense :</p> <span class="col-md-4"> {{$billable_expense - $paid_expense}} EGP</span> </div>

                        <h3 class="row"> <p class="font-bold col-md-6">Total Bill :</p> <span class="col-md-6">  {{$project->project_cost}} EGP</span> </h3>
                    </div>
                </div>
                <div class="col-sm-4  ">
                    <div class=" pl-1">
                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.client') }} {{ trans('cruds.project.fields.name') }} : </p><span class="col-md-6">{{ $project->client->name }}</span> </div>
                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.client') }} {{ trans('cruds.project.fields.name') }} : </p><span class="col-md-6">{{ $project->client->name }}</span> </div>
                        @if($project->client->address)
                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.client.fields.address') }}  : </p><span class="col-md-6">{{ $project->client->address }}</span> </div>
                        @endif
                        @if($project->client->city)
                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.client.fields.city') }}  : </p><span class="col-md-6">{{ $project->client->city }}</span> </div>
                        @endif
                        @if($project->client->country)
                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.client.fields.country') }}  : </p><span class="col-md-6">{{ $project->client->country }}</span> </div>
                        @endif
                        @if($project->client->phone)
                            <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.client.fields.phone') }}  : </p><span class="col-md-6">{{ $project->client->phone }}</span> </div>
                        @endif


                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.total') }} {{ trans('cruds.milestone.title') }} : </p><span class="col-md-6">{{ $project->milestones->count() }}</span> </div>
                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.total') }} {{ trans('cruds.task.title') }} : </p><span class="col-md-6">{{ $project->tasks->count() }}</span> </div>
                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.total') }} {{ trans('cruds.bug.title') }} : </p><span class="col-md-6">{{ $project->bugs->count() }}</span> </div>
                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.total') }} {{ trans('cruds.ticket.title') }} : </p><span class="col-md-6">{{ $project->tickets->count() }}</span> </div>
                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.project.fields.total') }} {{ trans('cruds.project.fields.time_sheet') }} : </p><span class="col-md-6">{{ $project->TimeSheet->count() }}</span> </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    </body>
</html>