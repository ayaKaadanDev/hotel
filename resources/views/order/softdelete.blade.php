@extends('dashboard.adminDashboard')

@section('mainbarAdmim')


<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">

    <thead class="sticky-top bg-white">
    <tr>
        <td>order number</td>
        <td>room number</td>
        <td>delete at</td>
        {{-- <td>restore</td> --}}
    </tr>
</thead>
<tbody>
    @foreach ($order as $o)
    <tr>
        {{-- <td>{{$o->content}}</td>
        <td>{{$o->amount}}</td>
        <td>{{$o->cost}}</td> --}}
        {{-- <td>
            <a href="{{route('my_order',$o->id)}}">{{$o->id}}</a>
        </td> --}}
        <td>{{$o->id}}</td>
        <td>{{$o->room->number}}</td>
        <td>{{$o->deleted_at}}</td>
        {{-- <td>
            <a href="{{route('getThisOrderDeleted',$o->id)}}" class="btn btn-secondary">restore</a>
        </td> --}}
    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection

