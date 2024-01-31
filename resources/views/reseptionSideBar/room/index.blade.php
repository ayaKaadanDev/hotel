@extends('dashboard.receptionDashboard')

@section('mainbarAdmim')

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
    <thead class="sticky-top bg-white">
    <tr>
        <td>number</td>
        <td>floor</td>
        <td>bed's number</td>
        <td>status</td>
    </tr>
</thead>
<tbody>
    @foreach ($room as $r)
    <tr>
        <td>{{$r->number}}</td>
        <td>{{$r->floor}}</td>
        <td>{{$r->beds_number}}</td>
        <td>{{$r->status}}</td>
    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection
