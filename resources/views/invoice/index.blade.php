@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

@if (session()->has('message'))
    <div class="text-green-400 m-2 b-4 bg-green-200" style="background-color: #dfffdf">{{session()->get('message')}}</div>
@endif

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
        <a href="{{route('showAllInvoiceDeleted')}}"><button class="btn btn-secondary">archive invoice</button></a>
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
        <td>edit</td>
        <td>archive</td>
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
        <td>
            <a href="{{route('invoices.edit',$i->id)}}" class="btn btn-primary">edit</a>
        </td>
        <td>
            <form action="{{route('invoices.destroy',$i->id)}}" method="POST">
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

