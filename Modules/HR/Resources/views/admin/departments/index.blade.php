@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/department.css')}}">
@endsection
@section('content')
@inject('accountDetailModel', 'App\Models\AccountDetail')
@inject('userModel', 'App\Models\User')
@inject('roleModel', 'App\Models\Role')
@inject('departmentModel', 'Modules\HR\Entities\Department')


{{-- Board Members --}}
<div class="pg-orgchart">
    <div class="org-chart">
        <ul>
            <?php 
                $roleMembers = $roleModel::where('title', 'Board Members')->first();
                $roleAdmin = $roleModel::where('title', 'Admin')->first();
                $boardMembers = $userModel::where('role_id', $roleMembers->id)->get();
                $adminMembers = $userModel::where('role_id', $roleAdmin->id)->get();
            ?>
            @foreach ($boardMembers as $item)
            <?php $accountDetail = $item->accountDetail()->first(); ?>
            <li>
                <div class="user">
                    <img src="{{ $accountDetail->avatar ? $accountDetail->avatar->getUrl('thumb') : asset('images/default.png') }}"
                        class="img-responsive" />
                    {{-- <div class="name">Roy Lemarie</div> --}}
                    <div class="role pt-2">{{$accountDetail->user->role()->first()->title}}</div>
                    <a class="name text-danger" href="{{route('admin.account-details.show', $accountDetail->select('id')->first()->id)}}">{{$accountDetail->fullname}}</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
{{-- Board Members --}}





<div class="pg-orgchart">
    <div class="org-chart">
        <ul>
        @foreach ($departmentModel::all() as $department)
        @if ($department->department_name != 'Board Members')
            <li>
                <div class="user">
                    <div class="name">{{$department->department_name}}</div>
                </div>
                <ul>
                    <?php 
                        $departmentHead = $department->department_head()->first() ? $department->department_head->accountDetail()->first() : '';
                    ?>
                    @if ($departmentHead)
                    <li>
                        <div class="user">
                            <img src="{{ $departmentHead->avatar ? $departmentHead->avatar->getUrl('thumb') : asset('images/default.png') }}"
                                class="img-responsive" />
                            <div class="name">{{$departmentHead->designation ? $departmentHead->designation->department()->first()->department_name : ''}}</div>
                            <div class="role">{{$departmentHead->user->role()->first()->title}}</div>
                            <a class="manager" href="{{route('admin.account-details.show', $departmentHead->user()->select('id')->first()->id)}}">{{$departmentHead->fullname}}</a>
                        </div>
                        <ul>
                            <?php 
                                $designations = $department->departmentDesignations()->get();

                                $groupedLeaders = $designations->groupBy('designation_leader_id')->toArray();
                            ?>
                            @foreach ($groupedLeaders as $key => $designation)

                            @if ($key)

                            <?php $leader = $accountDetailModel->where('user_id', $key)->first(); ?>

                            <li>
                                @if ($leader)
                                <div class="user">
                                    <img src="{{ $leader->avatar ? $leader->avatar->getUrl('thumb') : asset('images/default.png') }}"
                                    class="img-responsive" />
                                    <div class="name">{{$leader->designation ? $leader->designation->department()->first()->department_name : ''}}</div>
                                    <div class="role">{{$leader->user->role()->first()->title}}</div>
                                    <a class="manager" href="{{route('admin.account-details.show', $leader->user()->select('id')->first()->id)}}">{{$leader->fullname}}</a>
                                </div>
                                <ul>
                                    <?php 
                                        $designationIds = [];
                                            foreach ($designation as $key => $des) {
                                                $designationIds[] = $des['id'] ?? '';
                                            }
                                        $usersDesignation = $accountDetailModel->whereIn('designation_id', $designationIds)->get();
                                    ?>
                                    @if ($usersDesignation)
                                    @foreach ($usersDesignation as $item)
                                    @if ($item)
                                    <li>
                                        <div class="user">
                                            <img src="{{ $item->avatar ? $item->avatar->getUrl('thumb') : asset('images/default.png') }}"
                                                class="img-responsive" />
                                            <div class="name">{{$item->designation->department()->first()->department_name}}</div>
                                            <div class="role">{{$item->user->role()->first()->title}}</div>
                                            <a class="manager" href="{{route('admin.account-details.show', $item->user()->select('id')->first()->id)}}">{{$item->fullname}}</a>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endif
                                </ul>
                                @endif
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    @else
                    {{-- <ul>
                        <li>
                            <div class="user">
                                <img src="https://s3.amazonaws.com/uifaces/faces/twitter/marcosmoralez/128.jpg"
                                    class="img-responsive" />
                                <div class="name">Roy Lemarie</div>
                                <div class="role">System Architect</div>
                                <a class="manager" href="#">Jahn Philson Doe</a>
                            </div>
                        </li>
                        <li>
                            <div class="user">
                                <img src="https://s3.amazonaws.com/uifaces/faces/twitter/jina/128.jpg"
                                    class="img-responsive" />
                                <div class="name">Eloisa Stubbolo</div>
                                <div class="role">System Architect</div>
                                <a class="manager" href="#">Jahn Philson Doe</a>
                            </div>
                        </li>
                    </ul> --}}
                    @endif
                </ul>
            </li>
        @endif
        @endforeach
        </ul>

    </div>
</div>











@endsection

@section('scripts')
@parent
{{-- <script src="https://unpkg.com/@popperjs/core@2"></script> --}}
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>
@endsection