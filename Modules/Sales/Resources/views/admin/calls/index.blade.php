@extends('header')
@section('title','Calls')



@section('style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.semanticui.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css">


@endsection

@extends('sidebar')



@section('content')



<div class="main">
<a href="{{ route('calls.create') }}" class="btn btn-info mb-4"><i></i>Add Call</a>
    <table id="data-table" class="table table-scripted table-bordered">
        <thead>
            <tr>
                <th>#Serial</th>
                <th>CALL STATUS AFTER ASSIGN</th>
                <th>Date Contacted</th>
                <th>LEAD QUALIFICATIONS</th>
                <th>CALL BREIF & DETAILS</th>
                <th>Next Action</th>
                <th>NEXT ACTION DATE </th>
                <th>Lead Company</th>
                <th>First OR Second</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            {{--@foreach($calls as $call)--}}

            {{--<tr>--}}
                {{--<td>{{$call->result->name}}</td>--}}
                {{--<td>{{$call->date}}</td>--}}
                {{--<td>{{$call->qualification}}</td>--}}
                {{--<td>{{$call->note}}</td>--}}
                {{--<td>{{$call->next_action}}</td>--}}
                {{--<td>{{$call->next_action_date}}</td>--}}
                {{--<td>{{$call->lead->company}}</td>--}}
                {{--<td>{{$call->call}}</td>--}}
                {{--<td>--}}

                    {{--<form class="text-center" action="{{route('calls.destroy',$call->id)}}" method="post">--}}
                        {{--<a href="{{route('calls.edit',$call->id)}}"><i class="fas fa-edit"></i></a>--}}
                     {{----}}

                        {{--@method("DELETE")--}}
                        {{--@csrf--}}
                        {{--<button class="btn" type="submit"><i style="color:#cd0a0a" class="fas fa-trash"></i></button>--}}
                    {{--</form>--}}
                {{--</td>--}}
            {{--</tr>--}}
            {{--@endforeach--}}

        </tbody>

    </table>


</div>





@endsection
@section('js')


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        filter_components();
        function filter_components(){
            var table = $('#data-table').DataTable({
                "scrollX": true,
                dom: "Blfrtip",
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"],
                ],
                processing:true,
                serverSide:false,
                orderCellsTop: true,
                fixedHeader: true,
                buttons: [],

                ajax:{

                    url:"{{ route('calls.getdata') }}",
                    data:{}

                },
                order: [[ 1, 'asc' ]],
                columns:[


                    {data: 'DT_RowIndex'},
                    { data:'result'},
                    { data:'date'},
                    { data:'qualification'},
                    { data:'note'},
                    { data:'next_action'},
                    { data:'next_action_date'},
                    { data:'company'},
                    { data:'call'},
                    { data:'actions'},


                ]
            });
        }


    });

</script>




@endsection
@extends('footer')
