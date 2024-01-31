@extends('dashboard.clientDashboard')

@section('mainbarAdmim')

@if (session()->has('message'))
<div class="" style="background-color: #ffdfdf; color:red">{{session()->get('message')}}</div>
@endif

@endsection
