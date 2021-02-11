
@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.proposal.title_singular') }}
    </div>
    @if($proposal->activities && $proposal->activities()->count() > 0)
        <div class="card-body">
            @if($proposal->activities()->count() > 0)
            @forelse($proposal->activities as $activity)
            
           
            
            
            
           
            <div class="callout callout-{{ ratingColor(($loop->iteration % 5)) }}  m-0 py-3">
              <div class=" float-right">

                  <h4>{{$activity->user && $activity->user->name ? $activity->user->name : ''}}</h4>
                
              </div>
              <div> {{$activity->activity_en ?? ''}}
                <strong> {{$activity->value1_en ?? ''}} </strong>
              </div>
              <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp;{{$activity->activity_date ?? ''}}</small>
              <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; {{time_ago($activity->activity_date ?? '')}} </small>
            </div>
            <hr class="mx-3 my-0">
            @empty
            @endforelse
            @endif
           
{{--             
              <div class="callout callout-info m-0 py-3">
                <div class="avatar float-right">
                  <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div>Skype with
                  <strong>Megan</strong>
                </div>
                <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 4 - 5pm</small>
                <small class="text-muted"><i class="icon-social-skype"></i>&nbsp; On-line </small>
              </div>
              <hr class="transparent mx-3 my-0">
              <div class="callout callout-danger m-0 py-3">
                <div>New UI Project -
                  <strong>deadline</strong>
                </div>
                <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 10 - 11pm</small>
                <small class="text-muted"><i class="icon-home"></i>&nbsp; creativeLabs HQ </small>
                <div class="avatars-stack mt-2">
                  <div class="avatar avatar-xs">
                    <img src="img/avatars/2.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img src="img/avatars/3.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img src="img/avatars/5.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                  </div>
                </div>
              </div>
              <hr class="mx-3 my-0">
              <div class="callout callout-success m-0 py-3">
                <div>
                  <strong>#10 Startups.Garden</strong> Meetup</div>
                <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 1 - 3pm</small>
                <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; Palo Alto, CA </small>
              </div>
              <hr class="mx-3 my-0">
              <div class="callout callout-primary m-0 py-3">
                <div>
                  <strong>Team meeting</strong>
                </div>
                <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 4 - 6pm</small>
                <small class="text-muted"><i class="icon-home"></i>&nbsp; creativeLabs HQ </small>
                <div class="avatars-stack mt-2">
                  <div class="avatar avatar-xs">
                    <img src="img/avatars/2.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img src="img/avatars/3.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img src="img/avatars/5.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img src="img/avatars/8.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                  </div>
                </div>
              </div>
              <hr class="mx-3 my-0"> --}}
        </div>
    @endif

</div>
@endsection