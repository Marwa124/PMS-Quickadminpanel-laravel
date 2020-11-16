@inject('salaryTemplateModel', 'Modules\Payroll\Entities\SalaryTemplate')

@foreach($accountDetails as $key => $accountDetail)
<tr data-entry-id="{{ $accountDetail->id }}">
    <td>

    </td>
    <td>
        @if($accountDetail->avatar)
            <a href="{{ str_replace('storage', 'public/storage', $accountDetail->avatar->getUrl()) }}" target="_blank">
                <img class="rounded-circle img-thumbnail d-flex m-auto"
                src="{{ str_replace('storage', 'public/storage', $accountDetail->avatar->getUrl('thumb')) }}">
            </a>
            {{-- <a href="{{ $accountDetail->avatar->getUrl() }}" target="_blank">
                <img class="rounded-circle img-thumbnail d-flex m-auto"
                src="{{ $accountDetail->avatar->getUrl('thumb') }}">
            </a> --}}
        @else
            <a href="javascript:void(0)" style="display: inline-block">
                <img class="rounded-circle img-thumbnail"
                style="display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 30%;"
                src="{{ asset('images/default.png') }}">
            </a>
        @endif
    </td>
    <td>
        {{ $accountDetail->fullname ?? '' }}
    </td>
    <td>
        {{ $accountDetail->user->email ?? '' }}
    </td>
    <td>
        {{ $accountDetail->user->role()->first()->title ?? '' }}
    </td>
    <td>
        {{ $accountDetail->mobile ?? '' }}
    </td>
    <td>
        {{ $accountDetail->joining_date ?? '' }}
    </td>
    <td>
        {{ $accountDetail->designation->designation_name ?? '' }}
    </td>
    <td>
        {{ $accountDetail->designation->department->department_name ?? '' }}
    </td>
    <td>
        <?php
            $designatonName = $accountDetail->designation;
            $salary = $designatonName ? $salaryTemplateModel::where('salary_grade', $designatonName->designation_name)->select('basic_salary')->first() : '';
        ?>
        {{  $salary ? 'EGY ' .number_format($salary->basic_salary, 0, ',', '.') : ''}}
    </td>
    <td>
        @can('account_detail_show')
            <a class="btn btn-xs btn-primary" href="{{ route('admin.account-details.show', $accountDetail->id) }}">
                {{ trans('global.view') }}
            </a>
        @endcan

        @can('account_detail_edit')
            <a class="btn btn-xs btn-info" href="{{ route('admin.account-details.edit', $accountDetail->id) }}">
                {{ trans('global.edit') }}
            </a>
        @endcan

        @can('account_detail_delete')
            <form action="{{ route('admin.account-details.destroy', $accountDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
            </form>
        @endcan

    </td>

</tr>
@endforeach

