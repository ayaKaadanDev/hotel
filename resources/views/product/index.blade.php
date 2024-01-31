@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

@if (session()->has('message'))
    <div class="text-green-400 m-2 b-4 bg-green-200" style="background-color: #dfffdf">{{session()->get('message')}}</div>
@endif

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
        <a href="{{route('showAllProductDeleted')}}"><button class="btn btn-secondary">archive product</button></a>

    <thead class="sticky-top bg-white">
    <tr>
        <td>name</td>
        <td>cost</td>
        <td>user name</td>
        <td>edit</td>
        <td>archive</td>
    </tr>
</thead>
<tbody>
    @foreach ($product as $p)
    <tr>
        <td>{{$p->name}}</td>
        <td>{{$p->cost}}</td>
        <td>{{$p->user->name}}</td>
        <td>
            <a href="{{route('products.edit',$p->id)}}" class="btn btn-primary">edit</a>
        </td>
        <td>
            <form action="{{route('products.destroy',$p->id)}}" method="POST">
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
