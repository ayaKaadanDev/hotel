@extends('layouts.master')

@section('title')
reception dashboard page
@endsection

@section('content_sidebar')
<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start text-white" id="menu">
    <li class="nav-item">
        <a href="{{route('users.create')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">create a new client</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('users.index')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">show all users</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('rooms.index')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">show all room</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('reservation.create')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">create a new reservation</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('reservation.index')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">show all reservation</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('securitycards.create')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">create a new securityCard</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('securitycards.index')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">show all securityCard</span>
        </a>
    </li>


    <li class="nav-item">
        <a href="{{route('orders.create')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">create a new order</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('orders.index')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">show all order</span>
        </a>
    </li>

    {{-- <li class="nav-item">
        <a href="{{route('list.for.check')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">create an order iteams</span>
        </a>
    </li> --}}
    {{-- <li class="nav-item">
        <a href="{{route('iteams.index')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">show all iteams</span>
        </a>
    </li> --}}

<li class="nav-item">
        <a href="{{route('invoices.create')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">create a new invoice</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('invoices.index')}}" class="nav-link align-middle px-0">
            <i class="fa fa-crosshairs" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">show all invoice</span>
        </a>
    </li>

</ul>
@endsection

@section('mainbar')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <h1>reception dashboard</h1> --}}

    @yield('mainbarAdmim')


</x-app-layout>
@endsection
