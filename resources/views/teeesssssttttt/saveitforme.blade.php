@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
    <thead class="sticky-top bg-white">
    <tr>
        <td>content</td>
        <td>amount</td>
        <td>cost</td>
        <td>room number</td>
        <td>edit</td>
        <td>delete</td>
    </tr>
</thead>
<tbody>
    @foreach ($order as $o)
    <tr>
        <td>
            @php
                var_dump($o->content);
            @endphp
        </td>
        {{-- <td>{{$o->content}}</td> --}}
        {{-- <td>{{$o->amount}}</td> --}}
        {{-- <td>{{$o->cost}}</td> --}}
        <td>{{$o->room->number}}</td>
        {{-- <td>
            <a href="{{route('reservation.edit',$o->id)}}" class="btn btn-primary">edit</a>
        </td> --}}
        {{-- <td>
            <form action="{{route('reservation.destroy',$o->id)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" style="background-color: red">delete</button>
            </form>
        </td> --}}
    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection

