@extends('header')
@section('title','FinalResults')



@section('style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.semanticui.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css">


@endsection

@extends('sidebar')



@section('content')



<div class="main" style="width:100%">
    <a href="{{ route('finalresults.create') }}" class="btn btn-info mb-4"><i></i>Add FinalResult</a>
    <table id="data-table" class="table table-script w-100">
        <thead>
            <tr>
              <th>#Serial</th>
                <th>Sub-Status</th>
                <th>Won / Lost</th>
                <th>CEO / MANAGER COMMENTS</th>
                <th>Management Notes & Follow up</th>
                <th>Lead</th>

                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

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

                    url:"{{ route('finalresult.getdata') }}",
                    data:{}

                },
                order: [[ 1, 'asc' ]],
                columns:[


                    {data: 'DT_RowIndex'},
                    { data:'sub_status'},
                    { data:'status'},
                    { data:'ceo_comment'},
                    { data:'note'},
                    { data:'client_name'},
                    { data:'actions'},


                ]
            });
        }


    });

</script>




@endsection
@extends('footer')
