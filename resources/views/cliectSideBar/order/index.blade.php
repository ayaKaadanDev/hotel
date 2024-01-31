@extends('dashboard.clientDashboard')

@section('mainbarAdmim')


@if (session()->has('message'))
    <div class="text-green-400 m-2 b-4 bg-green-200" style="background-color: #dfffdf">{{session()->get('message')}}</div>
@endif

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
    <thead class="sticky-top bg-white">
    <tr>
        {{-- <td>content</td>
        <td>amount</td>
        <td>cost</td> --}}
        <td>order number</td>
        <td>room number</td>
        {{-- <td>edit</td> --}}
        {{-- <td>archive</td> --}}
    </tr>
</thead>
<tbody>

    @foreach ($order as $o)

    <tr>
        {{-- <td>{{$o->content}}</td>
        <td>{{$o->amount}}</td>
        <td>{{$o->cost}}</td> --}}

            <td>
                <a href="{{route('my_order',$o->id)}}">{{$o->id}}</a>
            </td>
        <td>{{$o->room->number}}</td>
        {{-- <td>
            <a href="{{route('orders.edit',$o->id)}}" class="btn btn-primary">edit</a>
        </td> --}}
        {{-- <td>
            <form action="{{route('orders.destroy',$o->id)}}" method="POST">
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

