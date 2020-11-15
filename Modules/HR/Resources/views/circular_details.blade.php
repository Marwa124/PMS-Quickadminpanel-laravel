@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header">
        Circular Details
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="card-body ml-5">
                <h5 class="card-title">{{$circularDetail->name . ' ( ' . $circularDetail->designation()->first()->designation_name . ' ) '}}</h5>
                  <span class="d-block card-text">Experience: {{$circularDetail->experience}}</span>
                  <span class="d-block card-text">Age: {{$circularDetail->age}}</span>
                  <span class="d-block card-text">Salary Range: {{$circularDetail->salary_range}}</span>
                  <span class="d-block card-text">Vacancy: {{$circularDetail->vacancy}}</span>
                  <span class="d-block card-text">Job Nature : {{$circularDetail->employment_type}}</span>
                  <span class="d-block card-text">Posted Date : {{$circularDetail->posted_date}}</span>
                  <span class="d-block card-text">Last Date : {{$circularDetail->last_date}}</span>
          
                  <div class="card" style="width: 18rem;">
                      <div class="card-body p-2">
                          <p class="card-text">{{$circularDetail->description}}</p>
                      </div>
                  </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card mt-5" style="max-width:70%;">
                <div class="card-header bg-dark text-white">
                  Job Summary
                </div>
                <div class="card-body">
                    <span class="d-block card-text">Job Title: {{$circularDetail->name}}</span>
                    <span class="d-block card-text">Designation: {{$circularDetail->designation()->first()->designation_name}}</span>
                    <span class="d-block card-text">Experience: {{$circularDetail->experience}}</span>
                    <span class="d-block card-text">Age: {{$circularDetail->age}}</span>
                    <span class="d-block card-text">Salary Range: {{$circularDetail->salary_range}}</span>
                    <span class="d-block card-text">Vacancy: {{$circularDetail->vacancy}}</span>
                    <span class="d-block card-text">Job Nature : {{$circularDetail->employment_type}}</span>
                    <span class="d-block card-text">Posted Date : {{$circularDetail->posted_date}}</span>
                    <span class="d-block card-text">Last Date : {{$circularDetail->last_date}}</span>
                  <a href="{{route('front.job-applications.create', $circularDetail->id)}}" class="btn btn-primary mt-4">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
