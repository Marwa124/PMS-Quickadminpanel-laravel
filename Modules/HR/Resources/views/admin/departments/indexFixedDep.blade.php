@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/department.css')}}">
@endsection
@section('content')
@inject('accountDetailModel', 'Modules\HR\Entities\AccountDetail')
@inject('userModel', 'App\Models\User')
@inject('roleModel', 'App\Models\Role')
@inject('departmentModel', 'Modules\HR\Entities\Department')

    <div class="pg-orgchart">
        <div class="org-chart">
            <ul>
                <li>
                    <?php 
                        $roleMembers = $roleModel::where('title', 'Board Members')->first();
                        $roleAdmin = $roleModel::where('title', 'Admin')->first();
                        $boardMembers = $userModel::where('role_id', $roleMembers->id)->get();
                        $adminMembers = $userModel::where('role_id', $roleAdmin->id)->get();
                    ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="boardMemberDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Board Members
                        </button>
                        <div class="dropdown-menu" aria-labelledby="boardMemberDropdown">
                          {{-- <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a> --}}

                          @foreach ($boardMembers as $item)
                          <?php $accountDetail = $item->accountDetail()->first(); ?>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <div class="user">
                                    <img src="{{ $accountDetail->avatar ? $accountDetail->avatar->getUrl('thumb') : asset('images/default.png') }}"
                                        class="img-responsive" />
                                    <a class="manager" href="{{route('admin.account-details.show', $accountDetail->id)}}">{{$accountDetail->fullname}}</a>
                                </div>
                            </a>
                          @endforeach
                        </div>
                    </div> <!--End Drop Down-->
                    <ul>
                        @foreach ($departmentModel::all() as $department)
                            <li>
                                <?php 
                                    $departmentHead = $department->department_head()->first() ? $department->department_head->accountDetail()->first() : '';
                                    // dd($departmentHead);
                                ?>
                                @if ($department->department_name != 'Board Members')
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="departmentHeadDropdown{{$department->department_name}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{$department->department_name}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="departmentHeadDropdown{{$department->department_name}}">
                                            @if ($departmentHead)
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <div class="user">
                                                    <img src="{{ $departmentHead->avatar ? $departmentHead->avatar->getUrl('thumb') : asset('images/default.png') }}"
                                                        class="img-responsive" />
                                                    <div class="role">{{$departmentHead->fullname}}</div>
                                                </div>
                                            </a>
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="designationDropdown{{$department->department_name}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Designations
                                            </button>
                                            <?php 
                                                $designations = $department->departmentDesignations()->get();
                                            ?>
                                            <div class="dropdown-menu" aria-labelledby="designationDropdown{{$department->department_name}}">
                                                @foreach ($designations as $designation)
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="designationNameDropdown{{$designation->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{$designation->designation_name}}
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="designationNameDropdown{{$designation->id}}">
                                                        <?php 
                                                            $designationLeader = $designation->designationLeader()->first();
                                                        ?>
                                                        @if ($designationLeader)
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="leaderDropdown{{$designationLeader}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Designation Leader
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="leaderDropdown{{$designationLeader}}">
                                                        <?php $leaderAccount = $designationLeader->accountDetail()->first(); ?>
                                                          <a class="dropdown-item" href="javascript:void(0)">
                                                            <div class="user">
                                                                <img src="{{ $leaderAccount->avatar ? $leaderAccount->avatar->getUrl('thumb') : asset('images/default.png') }}"
                                                                    class="img-responsive" />
                                                                <div class="role">{{$leaderAccount->designation->department()->first()->department_name}}</div>
                                                                <a class="manager" href="#">{{$leaderAccount->fullname}}</a>
                                                            </div>
                                                          </a>
                                                        </div>
                                                        @endif
                                                        dskjhgfadujhgsf kjdskfjdh kjdhgfkjvhg
                                                        <h1>fdsgjkhjg</h1>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </div> <!--End Drop Down-->
                                    <!--///////////////////////////////////////////-->
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('scripts')
{{-- <script src="https://unpkg.com/@popperjs/core@2"></script> --}}
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>
<script>
    $('.dropdown-toggle').dropdown('hide');
    $('.dropdown-toggle').dropdown('toggle')
</script>
@endsection