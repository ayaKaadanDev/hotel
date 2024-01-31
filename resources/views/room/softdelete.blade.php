@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
    <thead class="sticky-top bg-white">
    <tr>
        <td>number</td>
        <td>floor</td>
        <td>bed's number</td>
        <td>status</td>
        <td>deleted at</td>
        <td>restore</td>
    </tr>
</thead>
<tbody>
    @foreach ($room as $r)
    <tr>
        <td>{{$r->number}}</td>
        <td>{{$r->floor}}</td>
        <td>{{$r->beds_number}}</td>
        <td>{{$r->status}}</td>
        <td>{{$r->deleted_at}}</td>
        <td>
            <a href="{{route('getThisRoomDeleted',$r->id)}}" class="btn btn-secondary">restore</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection
