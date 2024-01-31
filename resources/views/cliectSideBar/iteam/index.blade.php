@extends('dashboard.clientDashboard')

@section('mainbarAdmim')


@if (session()->has('message'))
    <div class="text-green-400 m-2 b-4 bg-green-200" style="background-color: #dfffdf">{{session()->get('message')}}</div>
@endif

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
    <thead class="sticky-top bg-white">
    <tr>
        <td>product</td>
        <td>amount</td>
        <td>total</td>
        <td>room</td>
        {{-- <td>edit</td> --}}
        {{-- <td>archive</td> --}}
    </tr>
</thead>
<tbody>
    @foreach ($iteam as $i)
    <tr>
        <td>{{$i->product->name}} ({{$i->product->cost}})</td>
        <td>{{$i->amount}}</td>
        <td>{{$i->amount * $i->product->cost}}</td>
        <td>{{$i->order->room->number}}</td>
        {{-- <td>
            <a href="{{route('iteams.edit',$i->id)}}" class="btn btn-primary">edit</a>
        </td> --}}
        {{-- <td>
            <form action="{{route('iteams.destroy',$i->id)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" style="background-color: red">archive</button>
            </form>
        </td> --}}
    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection

