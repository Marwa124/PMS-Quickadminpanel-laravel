@extends('layouts.admin')
@section('content')

<evaluation-form
    :lang-key={{json_encode(app()->getLocale())}}
    :user="{{$userAccount}}"
    :auth="{{auth()->user()->id}}"
    :designation="{{$designation}}"
    :department-title="{{$departmentTitle}}"
    :department-head="{{$departmentHead}}"
    :manager="{{$manager}}"
    :evaluation="{{$evaluation}}"
>
</evaluation-form>

@endsection
