@can($viewGate)
    <a class="btn btn-xs btn-primary" href="{{ route($modalId.'admin.' . $crudRoutePart . '.show', $row->id) }}">
        {{ trans('global.view') }}
    </a>
@endcan
@can($editGate)
    <a class="btn btn-xs btn-info" href="{{ route($modalId.'admin.' . $crudRoutePart . '.edit', $row->id) }}">
        {{ trans('global.edit') }}
    </a>
@endcan
@can($deleteGate)
    <?php $deleteRestore = $deleteRestore ?? '';?>
    @if ($deleteRestore)
        <form action="{{ route($modalId.'admin.' . $crudRoutePart . '.forceDestroy', $row->id) }}" method="POST" style="display: inline-block;">
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{$row->id}}">
            <input type="hidden" name="action" value="restore">
            <input type="submit" class="btn btn-xs btn-success restore" value="Restore">
        </form>
        <form action="{{ route($modalId.'admin.' . $crudRoutePart . '.forceDestroy', $row->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{$row->id}}">
            <input type="hidden" name="action" value="force_delete">
            <input type="submit" class="btn btn-xs btn-danger forceDestroy" value="Force Delete">
        </form>
    @else
        <form action="{{ route($modalId.'admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
        </form>
    @endif
@endcan

