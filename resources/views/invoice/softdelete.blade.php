@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
    <thead class="sticky-top bg-white">
    <tr>
        {{-- <td>username</td> --}}
        <td>room number</td>
        <td>reservation cost</td>
        <td>order cost</td>
        <td>reservation and orders cost</td>
        <td>add 5% form_cost</td>
        <td>add 5% from 5%</td>
        <td>add duplicate of the 5%</td>
        <td>total amount</td>
        <td>delete at</td>
        {{-- <td>restore</td> --}}
    </tr>
</thead>
<tbody>
    @foreach ($invoice as $i)
    <tr>
        {{-- <td>{{$i->room->reservation->user->name}}</td> --}}
        <td>{{$i->room->number}}</td>
        <td>{{$i->reservation_cost}}</td>
        <td>{{$i->order_id}}</td>
        <td>{{$i->reservation_and_orders_cost}}</td>
        <td>{{$i->add_5_percent_form_cost}}</td>
        <td>{{$i->add_5_percent_from_5_percent}}</td>
        <td>{{$i->add_duplicate_of_the_5_percent}}</td>
        <td>{{$i->total_amount}}</td>
        <td>{{$i->deleted_at}}</td>
        {{-- <td>
            <a href="{{route('getThisInvoiceDeleted',$i->id)}}" class="btn btn-secondary">restore</a>
        </td> --}}
    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection

