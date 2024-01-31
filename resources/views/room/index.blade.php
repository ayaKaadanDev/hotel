@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

@if (session()->has('message'))
    <div class="text-green-400 m-2 b-4 bg-green-200" style="background-color: #dfffdf">{{session()->get('message')}}</div>
@endif

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
        <a href="{{route('showAllRoomDeleted')}}"><button class="btn btn-secondary">archive room</button></a>
    <thead class="sticky-top bg-white">
    <tr>
        <td>number</td>
        <td>floor</td>
        <td>bed's number</td>
        <td>status</td>
        <td>edit</td>
        <td>archive</td>
    </tr>
</thead>
<tbody>
    @foreach ($room as $r)
    <tr>
        <td>{{$r->number}}</td>
        <td>{{$r->floor}}</td>
        <td>{{$r->beds_number}}</td>
        <td>{{$r->status}}</td>
        <td>
            <a href="{{route('rooms.edit',$r->id)}}" class="btn btn-primary">edit</a>
        </td>
        <td>
            <form action="{{route('rooms.destroy',$r->id)}}" method="POST">
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
