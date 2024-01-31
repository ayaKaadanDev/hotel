@extends('dashboard.adminDashboard')

@section('mainbarAdmim')


<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
    <thead class="sticky-top bg-white">
    <tr>
        <td>product</td>
        <td>amount</td>
        <td>total</td>
        <td>room</td>
        <td>delete at</td>
        <td>restore</td>
    </tr>
</thead>
<tbody>
    @foreach ($iteam as $i)
    <tr>
        <td>{{$i->product->name}} ({{$i->product->cost}})</td>
        <td>{{$i->amount}}</td>
        <td>{{$i->amount * $i->product->cost}}</td>
        <td>{{$i->order->room->number}}</td>
        <td>{{$i->deleted_at}}</td>
        <td>
            <a href="{{route('getThisIteamDeleted',$i->id)}}" class="btn btn-secondary">restore</a>
        </td>
    @endforeach
</tbody>
</table>
</div>


@endsection

