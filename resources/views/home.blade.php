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
        <div class="col-6">
            <div class="d-flex justify-content-between">
                    <h5>All Tasks</h5>
                    <a class="d-block" href=""></a>
                </div>
            </div>
        <div class="col-6">
            <div class="d-flex justify-content-between">
                <h5>All Tasks</h5>
                <a class="d-block" href=""></a>
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
