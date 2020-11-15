@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/department.css')}}">
@endsection
@section('content')
@inject('accountDetailModel', 'App\Models\AccountDetail')
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
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Board Members
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          {{-- <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a> --}}
                          @foreach ($boardMembers as $item)
                          <?php $accountDetail = $item->accountDetail()->first(); ?>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <div class="user">
                                    <img src="{{ $accountDetail->avatar ? $accountDetail->avatar->getUrl('thumb') : asset('images/default.png') }}"
                                        class="img-responsive" />
                                    <div class="role">{{$accountDetail->designation->department()->first()->department_name}}</div>
                                    <a class="manager" href="#">{{$accountDetail->fullname}}</a>
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
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonDep" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{$department->department_name}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonDep">
                                            @if ($departmentHead)
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <div class="user">
                                                    <img src="{{ $departmentHead->avatar ? $departmentHead->avatar->getUrl('thumb') : asset('images/default.png') }}"
                                                        class="img-responsive" />
                                                    <div class="role">{{$departmentHead->fullname}}</div>
                                                </div>
                                            </a>
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonDesignate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Designations
                                            </button>
                                            <?php 
                                                $designations = $department->departmentDesignations()->get();
                                            ?>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonDesignate">
                                                @foreach ($designations as $designation)
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonleader" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{$designation->designation_name}}
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonleader">
                                                        <?php 
                                                            $designationLeader = $designation->designationLeader()->first();
                                                        ?>
                                                        @if ($designationLeader)
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonLead" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Designation Leader
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonLead">
                                                        <?php $accountDetail = $designationLeader->accountDetail()->first(); ?>
                                                          <a class="dropdown-item" href="javascript:void(0)">
                                                            <div class="user">
                                                                <img src="{{ $accountDetail->avatar ? $accountDetail->avatar->getUrl('thumb') : asset('images/default.png') }}"
                                                                    class="img-responsive" />
                                                                <div class="role">{{$accountDetail->designation->department()->first()->department_name}}</div>
                                                                <a class="manager" href="#">{{$accountDetail->fullname}}</a>
                                                            </div>
                                                          </a>
                                                        </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                                
                                                    <?php 
                                                        $designationLeader = $designation->designationLeader()->first();
                                                    ?>
                                                    @if ($designationLeader)
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Designation Leader
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <?php $accountDetail = $designationLeader->accountDetail()->first(); ?>
                                                          <a class="dropdown-item" href="javascript:void(0)">
                                                            <div class="user">
                                                                <img src="{{ $accountDetail->avatar ? $accountDetail->avatar->getUrl('thumb') : asset('images/default.png') }}"
                                                                    class="img-responsive" />
                                                                <div class="role">{{$accountDetail->designation->department()->first()->department_name}}</div>
                                                                <a class="manager" href="#">{{$accountDetail->fullname}}</a>
                                                            </div>
                                                          </a>
                                                    </div>
                                                    @endif
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Designation Employees
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @foreach ($boardMembers as $item)
                                                        <?php $accountDetail = $item->accountDetail()->first(); ?>
                                                          <a class="dropdown-item" href="javascript:void(0)">
                                                              <div class="user">
                                                                  <img src="{{ $accountDetail->avatar ? $accountDetail->avatar->getUrl('thumb') : asset('images/default.png') }}"
                                                                      class="img-responsive" />
                                                                  <div class="role">{{$accountDetail->designation->department()->first()->department_name}}</div>
                                                                  <a class="manager" href="#">{{$accountDetail->fullname}}</a>
                                                              </div>
                                                          </a>
                                                        @endforeach
                                                    </div>
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
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>
<script>
    $('.dropdown-toggle').dropdown('hide');
    $('.dropdown-toggle').dropdown('toggle')
</script>
@endsection