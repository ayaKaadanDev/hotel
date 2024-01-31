@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

@if (session()->has('message'))
    <div class="text-green-400 m-2 b-4 bg-green-200" style="background-color: #dfffdf">{{session()->get('message')}}</div>
@endif

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
        <a href="{{route('showAllSalaryDeleted')}}"><button class="btn btn-secondary">archive salary</button></a>
    <thead class="sticky-top bg-white">
    <tr>
        <td>employee name</td>
        <td>salary</td>
        <td>additional name</td>
        <td>additional quantity</td>
        <td>severance name</td>
        <td>severance quantity</td>
        <td>net payment</td>
        <td>edit</td>
        <td>archive</td>
    </tr>
</thead>
<tbody>
    @foreach ($salary as $s)
    <tr>
        {{-- <td>{{$s->employee_id}} {{$s->employee_id}}</td> --}}
        <td>{{$s->employee->first_name}} {{$s->employee->last_name}}</td>
        <td>{{$s->salary}}</td>
        <td>{{$s->additional_name}}</td>
        <td>{{$s->additional_quantity}}</td>
        <td>{{$s->severance_name}}</td>
        <td>{{$s->severance_quantity}}</td>
        <td>{{$s->net_payment}}</td>
        <td>
            <a href="{{route('salaries.edit',$s->id)}}" class="btn btn-primary">edit</a>
        </td>
        <td>
            <form action="{{route('salaries.destroy',$s->id)}}" method="POST">
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
