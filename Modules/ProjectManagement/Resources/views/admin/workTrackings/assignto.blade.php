@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.workTracking.title_singular') }} {{ trans('global.assign_to') }} {{ trans('cruds.employee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("projectmanagement.admin.work-trackings.storeAssignTo") }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="workTracking_id" value="{{$workTracking->id}}"/>

            @forelse($designations as $designation)
                <div class="">

{{--                    <label for="{{$designation->designation_name}}"><b>{{$designation->designation_name}}</b></label>--}}
{{--                    <hr class="mt-sm mb-sm"/>--}}
                    <div >
{{--                        @dd($designation->accountDetails()->get())--}}
                        @php
                            $designation_key = 0;
                        @endphp

                        @forelse($designation->accountDetails()->get() as $key => $account)

                            @if($designation_key == 0)

                                <label for="{{$designation->designation_name}}"><b>{{$designation->designation_name}}</b></label>
                                <hr class="mt-sm mb-sm"/>
                                @php
                                    $designation_key++;
                                @endphp
                            @endif
                            <div class="checkbox c-checkbox col-md-6 {{$key % 2 == 1 ? 'float-right':'float-left'}}">
                                <input type="checkbox" name="accounts[]" value="{{ $account->id}}"
                                    @forelse($workTracking->accountDetails as $accountDetail)
                                        {{ $accountDetail->id == $account->id ? 'checked':''}}

                                    @empty
                                    @endforelse

                                    /> {{ $account->fullname}}<br/>
                                <hr class="mt-sm mb-sm"/>

                            </div>

                        @empty
{{--                            <div class="form-group col-md-6">--}}
{{--                                {{trans('cruds.messages.no_accounts_in_designation')}}--}}
{{--                            </div>--}}
                        @endforelse
                    </div>
                </div>

                <div class="clearfix"></div>
            @empty
                <div class="form-group col-md-6">

                    {{trans('cruds.messages.no_designation_found')}}
                </div>
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
