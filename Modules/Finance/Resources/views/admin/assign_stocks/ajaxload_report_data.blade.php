<div class="card">
    <div class="card-body" >


    <div class="row">
        <h3 id="user_name"></h3>

    </div>
<hr>
    <table class=" table table-bordered table-striped table-hover ajaxTable ">
        <thead>
        <tr>
            <th>

            </th>
            <th>
                {{ trans('cruds.assign_stocks.fields.item_name') }}
            </th>

            <th>
                {{ trans('cruds.assign_stocks.fields.assign_quantity') }}
            </th>
            <th>
                {{ trans('cruds.assign_stocks.fields.assign_date') }}
            </th>
            <th>

            </th>

        </tr>

        </thead>
        <tbody>

        @foreach($assigned_stocks as $key => $stock)
            <tr data-entry-id="{{ $stock->id }}">
                <td>
                    {{$loop->index+1 ?? ''}}
                </td>


                <td>
                    {{ $stock->stock->name ?? '' }}
                </td>
                <td>
                    {{ $stock->quantity ?? '' }}
                </td>
                <td>
                    {{ $stock->assign_date ?? '' }}
                </td>
                <td>
                    <form class="text-center" id="delete_form"
                          action="{{route('finance.admin.assign_stocks.destroy',$stock)}}" method="post" onsubmit="return confirm('Do you really want to delete this?');">

                        @csrf
                        @method("DELETE")
                        <button class="btn" type="submit"><i
                                style="color:#cd0a0a" class="fas fa-trash" ></i></button>
                    </form>
                </td>


            </tr>
        @endforeach

        </tbody>

    </table>



    </div>
</div>
