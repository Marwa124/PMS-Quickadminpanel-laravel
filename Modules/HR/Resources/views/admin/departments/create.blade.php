@extends('layouts.admin')
@section('content')

<department-form :lang-key={{json_encode(app()->getLocale())}}>
</department-form>
@endsection
