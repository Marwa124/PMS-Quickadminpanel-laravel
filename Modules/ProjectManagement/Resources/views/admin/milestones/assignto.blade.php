@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.milestone.title_singular') }} {{ trans('global.assign_to') }} {{ trans('cruds.employee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("projectmanagement.admin.milestones.storeAssignTo") }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="milsetone_id" value="{{$milestone->id}}"/>
            @forelse($department->departmentDesignations()->get() as $designation)
                <div class="">

                    <label for="{{$designation->designation_name}}"><b>{{$designation->designation_name}}</b></label>
                    <hr class="mt-sm mb-sm"/>
                    <div >

                        @forelse($designation->accountDetails()->get() as $key => $account)

                            @php
                            $key = 0;
                            @endphp
                            @forelse($milestone->project->accountDetails as $project_account)
                                @if($project_account->id == $account->id)
                                <div class="checkbox c-checkbox col-md-6 {{$key % 2 == 1 ? 'float-right':'float-left'}}">
                                    <input type="checkbox" name="accounts[]" value="{{ $account->id}}"
                                        @forelse($milestone->accountDetails as $accountDetail)
                                            {{ $accountDetail->id == $account->id ? 'checked':''}}

                                        @empty
                                        @endforelse

                                        /> {{ $account->fullname}}<br/>
                                    <hr class="mt-sm mb-sm"/>

                                </div>
                                @php
                                    $key++;
                                @endphp
                                @endif
                            @empty
                            @endforelse

                        @empty
{{--                            <div class="form-group col-md-6">--}}

{{--                                No Sub Department available "please add sub department"--}}
{{--                            </div>--}}
                        @endforelse
                    </div>
                </div>

                <div class="clearfix"></div>
            @empty
            @endforelse

            <div class="form-group">
                <button class="btn btn-danger float-right" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
