@extends('layouts.admin')
@section('content')
<div class="main" style="width:100%">
<a href="{{ route('sales.admin.results.create') }}" class="btn btn-info mb-4"><i></i>Add Result</a>
    <table id="example">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($results as $result)

            <tr>
                <td>{{$result->name}}</td>
                <td>
                    <form action="{{route('sales.admin.results.destroy',$result->id)}}" method="post">
                        <a href="{{route('sales.admin.results.edit',$result->id)}}"><i class="fas fa-edit"></i></a>
                        @method("DELETE")
                        @csrf
                        <button class="btn" type="submit"><i class="fas fa-trash" style="color:#cd0a0a"></i></button>
                    </form>


                </td>
            </tr>
            @endforeach

        </tbody>

    </table>

</div>






@section('js')


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "ordering": false
            });
        });
    </script>



@endsection
@endsection