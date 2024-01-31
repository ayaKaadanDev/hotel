@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

@if (session()->has('message'))
    <div class="text-green-400 m-2 b-4 bg-green-200" style="background-color: #dfffdf">{{session()->get('message')}}</div>
@endif
@if (session()->has('deletemessage'))
    <div class="text-green-400 m-2 b-4 bg-green-200" style="background-color: #dfffdf">{{session()->get('message')}}</div>
@endif

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
        <a href="{{route('showAllReservationDeleted')}}"><button class="btn btn-secondary">archive reservation</button></a>

    <thead class="sticky-top bg-white">
    <tr>
        <td>date</td>
        <td>room number</td>
        <td>user name</td>
        <td>edit</td>
        <td>archive</td>
    </tr>
</thead>
<tbody>
    @foreach ($reservation as $r)
    <tr>
        <td>{{$r->date}}</td>
        <td>{{$r->room->number}}</td>
        <td>{{$r->user->name}} {{$r->user->last_name}}</td>
        <td>
            <a href="{{route('reservation.edit',$r->id)}}" class="btn btn-primary">edit</a>
        </td>
        <td>
            <form action="{{route('reservation.destroy',$r->id)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" style="background-color: red">archive</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection
