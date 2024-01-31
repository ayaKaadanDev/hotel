@extends('dashboard.adminDashboard')

@section('mainbarAdmim')


<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
    <thead class="sticky-top bg-white">
    <tr>
        <td>date</td>
        <td>room number</td>
        <td>user name</td>
        <td>delete at</td>
        {{-- <td>restore</td> --}}
    </tr>
</thead>
<tbody>
    @foreach ($reservation as $r)
    <tr>
        <td>{{$r->date}}</td>
        <td>{{$r->room->number}}</td>
        <td>{{$r->user->name}} {{$r->user->last_name}}</td>
        <td>{{$r->deleted_at}}</td>
        {{-- <td>
            <a href="{{route('getThisReservationDeleted',$r->id)}}" class="btn btn-secondary">restore</a>
        </td> --}}
    </tr>
    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection
