@extends('layouts.pdf_layout')
@section('title'){{$user->accountDetail->fullname ?? '' }} @endsection
@section('content')
   <div class="row" style="background-color: #6f8d9c">
       <p >{{ trans('cruds.assign_stocks.fields.assign_stock_list_for') }}    - <span > {{ $user->accountDetail->fullname ?? ''  }} ({{ $user->id ?? ''  }})</span></p>
   </div>


   <table border="1" style="margin:20px;width: 100%;">
       <tr style="background-color: #6f8d9c">
           <th>{{ trans('cruds.assign_stocks.fields.index') }}</th>
           <th>{{ trans('cruds.assign_stocks.fields.item_name') }}</th>
           <th>{{ trans('cruds.assign_stocks.fields.assign_quantity') }}</th>
           <th>{{ trans('cruds.assign_stocks.fields.assign_date') }}</th>
       </tr>
       @foreach($assigned_stocks as $stock)
           <tr>
               <td>
                   <p style="margin: 5px;">{{$loop->index+1 ?? ''}}</p>
               </td>
               <td>
                   <p style="margin: 5px;">{{ $stock->stock->name ?? '' }}</p>
               </td>
               <td>
                   <p style="margin: 5px;">{{ $stock->quantity ?? '' }}</p>
               </td>
               <td>
                   <p style="margin: 5px;">{{ $stock->assign_date ?? '' }}</p>
               </td>
           </tr>
       @endforeach
   </table>
    {{--<table>--}}
        {{--<tr>--}}
            {{--<td  >--}}
                {{--<p >{{ trans('cruds.project.fields.start_date') }} : <span >{{ $project->start_date ?? '' }}</span></p>--}}
            {{--</td>--}}
            {{--<td  >--}}
                {{--<p>{{ trans('cruds.project.fields.estimate_hours') }} : <span>{{ $project->estimate_hours ? $project->estimate_hours.' Hour' : '' }} </span></p>--}}
            {{--</td>--}}
            {{--<td  >--}}
                {{--<b>{{ trans('cruds.project.fields.client') }} Info</b>--}}
                {{--<p >{{ trans('cruds.project.fields.client') }} : <span >{{ $project->client->name ?? '' }}</span> </p>--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td  >--}}
                {{--<p >{{ trans('cruds.project.fields.end_date') }} : <span >{{ $project->end_date ?? '' }}</span></p>--}}
            {{--</td>--}}
            {{--<td  >--}}
                {{--<p >{{trans('cruds.project.fields.total_expense')}} : <span > {{$total_expense ? $total_expense.' EGP': '' }} </span></p>--}}
            {{--</td>--}}
            {{--<td  >--}}
                {{--<p >{{ trans('cruds.client.fields.address') }} : <span >{{ $project->client->address ?? '' }}</span> </p>--}}
            {{--</td>--}}

        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td  >--}}
                {{--<p >{{ trans('cruds.department.title_singular') }} {{ trans('cruds.project.fields.name') }} :  <span>{{ $project->department->department_name ?? '' }} </span></p>--}}
            {{--</td>--}}
            {{--<td  >--}}
                {{--<p >{{trans('cruds.project.fields.billable_expense')}} : <span > {{$billable_expense ? $billable_expense.' EGP': '' }} </span></p>--}}
            {{--</td>--}}
            {{--<td  >--}}
                {{--<p >{{ trans('cruds.client.fields.city') }} : <span >{{ $project->client->city ?? '' }}</span> </p>--}}
            {{--</td>--}}

        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td  >--}}
                {{--<p >{{ trans('cruds.project.fields.demo_url') }} : <span >{{ $project->demo_url ?? '' }}</span></p>--}}
            {{--</td>--}}
            {{--<td  >--}}
                {{--<p >{{trans('cruds.project.fields.non_billable_expense')}} :  <span > {{$not_billable_expense ? $not_billable_expense.' EGP': '' }} </span></p>--}}
            {{--</td>--}}

            {{--<td  >--}}
                {{--<p >{{ trans('cruds.client.fields.country') }} : <span >{{ $project->client->country ?? '' }}</span> </p>--}}
            {{--</td>--}}

        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td  >--}}
                {{--<p >{{ trans('cruds.project.fields.project_status') }} : <span >{{ $project->project_status ? trans("cruds.status.".$project->project_status)  : '' }}</span></p>--}}
            {{--</td>--}}
            {{--<td  >--}}
                {{--<p >{{trans('cruds.project.fields.billed_expense')}} :  <span > {{$paid_expense ? $paid_expense.' EGP': '' }} </span> </p>--}}
            {{--</td>--}}
            {{--<td  >--}}
                {{--<p >{{ trans('cruds.client.fields.phone') }} : <span >{{ $project->client->phone ?? '' }}</span> </p>--}}
            {{--</td>--}}

        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td  >--}}
                {{--<p >{{ trans('cruds.project.fields.calculate_progress') }} : <span > {{ $project->calculate_progress ? $project->calculate_progress.'%': ''  }}</span></p>--}}

            {{--</td>--}}
            {{--<td  >--}}
                {{--<p >{{trans('cruds.project.fields.unbilled_expense')}} : <span > {{($billable_expense - $paid_expense) ? ($billable_expense - $paid_expense).' EGP': '' }} </span> </p>--}}
            {{--</td>--}}

        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td >--}}
                {{--<p >{{ trans('cruds.project.fields.project_cost') }} :  <span>{{ $project->project_cost ?? 0 }} EGP</span></p>--}}

            {{--</td>--}}

            {{--<td >--}}
                {{--<p >{{trans('cruds.project.fields.total_bill')}} : <span >  {{$project->project_cost ? $project->project_cost.' EGP': '' }} </span></p>--}}
            {{--</td>--}}

        {{--</tr>--}}

    {{--</table>--}}

@endsection

