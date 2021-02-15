@extends('layouts.admin')

@inject('fingerprintModel', 'Modules\HR\Entities\FingerprintAttendance')
@section('content')
<div class="content">
    <!-- Dashboard Reports -->
    <div class="">
        <div class="row">
            <div class="col-sm-6 col-xl-4">
                <div class="h-100">
                    <h5 class="font-weight-bold mb-3">Income Vs Expense</h5>
                    <div class="report-card">
                        <div class="report-card__section border-right border-bottom">
                            <div class="report-card__section__img">
                                <img src="{{asset('images/icon-large.png')}}" alt="">
                            </div>
                            <div class="report-card__section__info">
                                <h5>EGP 0.00</h5>
                                <h6 class="mb-0">Income Today</h6>
                                <small>
                                    <a href="">more info</a>
                                </small>
                            </div>
                        </div>
                        <div class="report-card__section border-bottom">
                            <div class="report-card__section__img">
                                <img src="{{asset('images/Icon awesome-minus@2x.png')}}" alt="">
                            </div>
                            <div class="report-card__section__info">
                                <h5>EGP 0.00</h5>
                                <h6 class="mb-0">Expense Today</h6>
                                <small>
                                    <a href="">more info</a>
                                </small>
                            </div>
                        </div>
                        <div class="report-card__section border-right">
                            <div class="report-card__section__img">
                                <img src="{{asset('images/icon-large.png')}}" alt="">
                            </div>
                            <div class="report-card__section__info">
                                <h5>EGP 0.00</h5>
                                <h6 class="mb-0">Total Income</h6>
                                <small>
                                    <a href="">more info</a>
                                </small>
                            </div>
                        </div>
                        <div class="report-card__section">
                            <div class="report-card__section__img">
                                <img src="{{asset('images/Icon awesome-minus@2x.png')}}" alt="">
                            </div>
                            <div class="report-card__section__info">
                                <h5>EGP 0.00</h5>
                                <h6 class="mb-0">Total Expense</h6>
                                <small>
                                    <a href="">more info</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="h-100">
                        <h5 class="font-weight-bold mb-3">Finance</h5>
                        <div class="report-card">
                            <div class="report-card__section border-right border-bottom">
                                <div class="report-card__section__img">
                                    <img src="{{asset('images/Icon awesome-shopping-cart@2x.png')}}" alt="">
                                </div>
                                <div class="report-card__section__info">
                                    <h5>EGP 0.00</h5>
                                    <h6 class="mb-0">Income Today</h6>
                                    <small>
                                        <a href="">more info</a>
                                    </small>
                                </div>
                            </div>
                            <div class="report-card__section border-bottom">
                                <div class="report-card__section__img">
                                    <img src="{{asset('images/Icon simple-cashapp@2x.png')}}" alt="">
                                </div>
                                <div class="report-card__section__info">
                                    <h5>EGP 0.00</h5>
                                    <h6 class="mb-0">Income Today</h6>
                                    <small>
                                        <a href="">more info</a>
                                    </small>
                                </div>
                            </div>
                            <div class="report-card__section border-right">
                                <div class="report-card__section__img">
                                    <img src="{{asset('images/Icon awesome-money-bill-alt@2x.png')}}" alt="">
                                </div>
                                <div class="report-card__section__info">
                                    <h5>EGP 0.00</h5>
                                    <h6 class="mb-0">Income Today</h6>
                                    <small>
                                        <a href="">more info</a>
                                    </small>
                                </div>
                            </div>
                            <div class="report-card__section">
                                <div class="report-card__section__img">
                                    <img src="{{asset('images/Icon awesome-dollar-sign@2x.png')}}" alt="">
                                </div>
                                <div class="report-card__section__info">
                                    <h5>EGP 0.00</h5>
                                    <h6 class="mb-0">Income Today</h6>
                                    <small>
                                        <a href="">more info</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="h-100">
                    <h5 class="font-weight-bold mb-3">Project Management</h5>
                    <div class="report-card">
                        <div class="report-card__section border-right border-bottom">
                            <div class="report-card__section__img">
                                <img src="{{asset('images/Group 2974@2x.png')}}" alt="">
                            </div>
                            <div class="report-card__section__info">
                                <h5>EGP 0.00</h5>
                                <h6 class="mb-0">Income Today</h6>
                                <small>
                                    <a href="">more info</a>
                                </small>
                            </div>
                        </div>
                        <div class="report-card__section border-bottom">
                            <div class="report-card__section__img">
                                <img src="{{asset('images/Icon awesome-ticket-alt@2x.png')}}" alt="">
                            </div>
                            <div class="report-card__section__info">
                                <h5>EGP 0.00</h5>
                                <h6 class="mb-0">Income Today</h6>
                                <small>
                                    <a href="">more info</a>
                                </small>
                            </div>
                        </div>
                        <div class="report-card__section border-right">
                            <div class="report-card__section__img">
                                <img src="{{asset('images/Icon awesome-bug@2x.png')}}" alt="">
                            </div>
                            <div class="report-card__section__info">
                                <h5>EGP 0.00</h5>
                                <h6 class="mb-0">Income Today</h6>
                                <small>
                                    <a href="">more info</a>
                                </small>
                            </div>
                        </div>
                        <div class="report-card__section">
                            <div class="report-card__section__img">
                                <img src="{{asset('images/shuttle@2x.png')}}" alt="">
                            </div>
                            <div class="report-card__section__info">
                                <h5>EGP 0.00</h5>
                                <h6 class="mb-0">Income Today</h6>
                                <small>
                                    <a href="">more info</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-xl-6 mb-4">
            <div class="d-flex justify-content-between mb-2">
                <h4>All Tasks</h4>
                <a class="d-block" href="">View All</a>
            </div>
            <div class="dashboard__card" id="scrollbar-style">
                <div class="dashboard__card__section">
                    <div class="d-flex justify-content-between">
                        <div class="font-weight-bold">Mostafa Gamal</div>
                        <div class="font-weight-bold">Deadline</div>
                    </div>
                    <div style="background-color: rgb(181, 181, 181);border-radius: 7px;height: 25px;position: relative;">
                        <small class="bg-success my-2"
                            style="display: block;text-align: center;border-radius: 7px;width: 50%;padding: 3px 12px;color: rgb(255, 255, 255);height: 100%;">
                        </small>
                            <div style="
                                position: absolute;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                bottom: 0;
                                width: 100%;
                                height: 100%;
                                text-align: center;">
                                <div class="text-light"> In Progress</div>
                            </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="font-weight-bold">PMS Website Design</div>
                        <div class="font-weight-bold">15-11-2020</div>
                    </div>
                </div>
                <div class="dashboard__card__section">
                    <div class="d-flex justify-content-between">
                        <div class="font-weight-bold">Mostafa Gamal</div>
                        <div class="font-weight-bold">Deadline</div>
                    </div>
                    <div style="background-color: rgb(181, 181, 181);border-radius: 7px;height: 25px;position: relative;">
                        <small class="bg-main my-2"
                            style="display: block;text-align: center;border-radius: 7px;width: 100%;padding: 3px 12px;color: rgb(255, 255, 255);height: 100%;">
                        </small>
                            <div style="
                                position: absolute;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                bottom: 0;
                                width: 100%;
                                height: 100%;
                                text-align: center;">
                                <div class="text-light">Done</div>
                            </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="font-weight-bold">PMS Website Design</div>
                        <div class="font-weight-bold">15-11-2020</div>
                    </div>
                </div>
                <div class="dashboard__card__section">
                    <div class="d-flex justify-content-between">
                        <div class="font-weight-bold">Mostafa Gamal</div>
                        <div class="font-weight-bold">Deadline</div>
                    </div>
                    <div style="background-color: rgb(181, 181, 181);border-radius: 7px;height: 25px;position: relative;">
                        <small class="bg-danger my-2"
                            style="display: block;text-align: center;border-radius: 7px;
                            width: 100%;padding: 3px 12px;color: rgb(255, 255, 255);height: 100%;">
                        </small>
                            <div style="
                                position: absolute;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                bottom: 0;
                                width: 100%;
                                height: 100%;
                                text-align: center;">
                                <div class="text-light"> Overdue</div>
                            </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="font-weight-bold">PMS Website Design</div>
                        <div class="font-weight-bold">15-11-2020</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-4">
            <div class="d-flex justify-content-between mb-2">
                <h4>All Tasks</h4>
                <a class="d-block" href="">View All</a>
            </div>
            <div class="dashboard__card text-center p-0" id="scrollbar-style">
                <div class="dashboard__card__header">
                    <h6 class="mb-0" style="flex:2">Name</h6>
                    <h6 class="mb-0" style="flex:3">Status</h6>
                    <h6 class="mb-0" style="flex:2">Deadline</h6>
                </div>
                <div class="dashboard__card__body py-3">
                    <div class="dashboard__card__section">
                        <div class="d-flex align-items-center">
                            <div class="" style="flex:2">
                                <div class="font-weight-bold">Loo2ta project</div>
                            </div>
                            <div style="flex:3; background-color: rgb(181, 181, 181);border-radius: 7px;height: 25px;position: relative;">
                                <small class="bg-danger"
                                    style="display: block;text-align: center;border-radius: 7px;
                                    width: 100%;padding: 3px 12px;color: rgb(255, 255, 255);height: 100%;">
                                </small>
                                <div style="
                                    position: absolute;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    bottom: 0;
                                    width: 100%;
                                    height: 100%;
                                    text-align: center;">
                                    <small class="text-light"> Overdue</small>
                                </div>
                            </div>
                            <div class="" style="flex:2">
                                <div class="font-weight-bold">2/8/2020</div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard__card__section">
                        <div class="d-flex align-items-center">
                            <div class="" style="flex:2">
                                <div class="font-weight-bold">Loo2ta project</div>
                            </div>
                            <div style="flex:3; background-color: rgb(181, 181, 181);border-radius: 7px;height: 25px;position: relative;">
                                <small class="bg-success"
                                    style="display: block;text-align: center;border-radius: 7px;
                                    width: 50%;padding: 3px 12px;color: rgb(255, 255, 255);height: 100%;">
                                </small>
                                <div style="
                                    position: absolute;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    bottom: 0;
                                    width: 100%;
                                    height: 100%;
                                    text-align: center;">
                                    <small class="text-light"> In Progress</small>
                                </div>
                            </div>
                            <div class="" style="flex:2">
                                <div class="font-weight-bold">2/8/2020</div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard__card__section">
                        <div class="d-flex align-items-center">
                            <div class="" style="flex:2">
                                <div class="font-weight-bold">Loo2ta project</div>
                            </div>
                            <div style="flex:3; background-color: rgb(181, 181, 181);border-radius: 7px;height: 25px;position: relative;">
                                <small class="bg-main"
                                    style="display: block;text-align: center;border-radius: 7px;
                                    width: 100%;padding: 3px 12px;color: rgb(255, 255, 255);height: 100%;">
                                </small>
                                <div style="
                                    position: absolute;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    bottom: 0;
                                    width: 100%;
                                    height: 100%;
                                    text-align: center;">
                                    <small class="text-light"> Done</small>
                                </div>
                            </div>
                            <div class="" style="flex:2">
                                <div class="font-weight-bold">2/8/2020</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-4">
            <div class="d-flex justify-content-between mb-2">
                <h5>Attendance Employees</h5>
                <h5>Thu 15-11-2022</h5>
            </div>
            <div class="dashboard__card text-center p-0" id="scrollbar-style">
                <div class="dashboard__card__header">
                    <h6 class="mb-0" style="flex:2">Name</h6>
                    <h6 class="mb-0" style="flex:3">Status</h6>
                    <h6 class="mb-0" style="flex:2">Leave Request</h6>
                </div>
                <div class="dashboard__card__body py-3">
                    <div class="dashboard__card__section">
                        <div class="d-flex align-items-center">
                            <div class="" style="flex:2">
                                <div class="font-weight-bold">Mostafa Gamal</div>
                            </div>
                            <div style="flex:3;border-radius: 7px">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="d-flex text-light bg-success py-2 px-3 m-1" style="border-radius:5px">
                                        <div class="mr-2" style="width:15px">
                                            <img style="width:100%" src="{{asset('images/Icon feather-check.png')}}" alt="">
                                        </div>
                                        <div>Present</div>
                                    </div>
                                    <div class="d-flex text-light bg-grey py-2 px-3 m-1" style="border-radius:5px">
                                        <div class="mr-2" style="width:12px">
                                            <img style="width:100%" src="{{asset('images/Icon ionic-ios-close.png')}}" alt="">
                                        </div>
                                        <div>Absent</div>
                                    </div>
                                </div>
                            </div>
                            <div class="" style="flex:2">
                                <div class="font-weight-bold">
                                    <div class="d-flex align-items-center justify-content-center bg-dark"
                                    style="
                                     width:80%; 
                                     margin:auto;
                                     height:30px;
                                     color:#fff;
                                     border-radius:15px">
                                        <div>--</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard__card__section">
                        <div class="d-flex align-items-center">
                            <div class="" style="flex:2">
                                <div class="font-weight-bold">Loo2ta project</div>
                            </div>
                            <div style="flex:3;border-radius: 7px">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="d-flex text-light bg-grey py-2 px-3 m-1" style="border-radius:5px">
                                        <div class="mr-2" style="width:15px">
                                            <img style="width:100%" src="{{asset('images/Icon feather-check.png')}}" alt="">
                                        </div>
                                        <div>Present</div>
                                    </div>
                                    <div class="d-flex text-light bg-danger py-2 px-3 m-1" style="border-radius:5px">
                                        <div class="mr-2" style="width:12px">
                                            <img style="width:100%" src="{{asset('images/Icon ionic-ios-close.png')}}" alt="">
                                        </div>
                                        <div>Absent</div>
                                    </div>
                                </div>
                            </div>
                            <div class="" style="flex:2">
                                <div class="font-weight-bold">
                                    <div class="d-flex align-items-center justify-content-center bg-danger"
                                    style="
                                     width:80%; 
                                     margin:auto;
                                     height:30px;
                                     color:#fff;
                                     border-radius:15px">
                                        <div>No</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard__card__section">
                        <div class="d-flex align-items-center">
                            <div class="" style="flex:2">
                                <div class="font-weight-bold">Loo2ta project</div>
                            </div>
                            <div style="flex:3;border-radius: 7px">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="d-flex text-light bg-grey py-2 px-3 m-1" style="border-radius:5px">
                                        <div class="mr-2" style="width:15px">
                                            <img style="width:100%" src="{{asset('images/Icon feather-check.png')}}" alt="">
                                        </div>
                                        <div>Present</div>
                                    </div>
                                    <div class="d-flex text-light bg-danger py-2 px-3 m-1" style="border-radius:5px">
                                        <div class="mr-2" style="width:12px">
                                            <img style="width:100%" src="{{asset('images/Icon ionic-ios-close.png')}}" alt="">
                                        </div>
                                        <div>Absent</div>
                                    </div>
                                </div>
                            </div>
                            <div class="" style="flex:2">
                                <div class="font-weight-bold">
                                    <div class="d-flex align-items-center justify-content-center bg-dark"
                                    style="
                                     width:80%; 
                                     margin:auto;
                                     height:30px;
                                     color:#fff;
                                     border-radius:15px">
                                        <div>Yes</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
   
</script>
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart1->renderJs() !!}{!! $chart2->renderJs() !!}
@endsection
