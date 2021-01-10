@extends('layouts.admin')
@section('content')

<evaluation-form 
    :lang-key={{json_encode(app()->getLocale())}} 
    :user="{{$userAccount}}" 
    :designation="{{$designation}}" 
    :department-title="{{$departmentTitle}}" 
    :department-head="{{$departmentHead}}"
>
</evaluation-form>


@endsection

@section('scripts')
<script>
    
</script>
@endsection
