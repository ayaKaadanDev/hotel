@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
    <thead class="sticky-top bg-white">
    <tr>
        <td>employee name</td>
        <td>salary</td>
        <td>additional name</td>
        <td>additional quantity</td>
        <td>severance name</td>
        <td>severance quantity</td>
        <td>net payment</td>
        <td>deleted at</td>
        {{-- <td>restore</td> --}}
    </tr>
</thead>
<tbody>
    @foreach ($salary as $s)
    <tr>
        <td>{{$s->employee->first_name}} {{$s->employee->last_name}}</td>
        <td>{{$s->salary}}</td>
        <td>{{$s->additional_name}}</td>
        <td>{{$s->additional_quantity}}</td>
        <td>{{$s->severance_name}}</td>
        <td>{{$s->severance_quantity}}</td>
        <td>{{$s->net_payment}}</td>
        <td>{{$s->deleted_at}}</td>
        {{-- <td>
            <a href="{{route('getThisSalaryDeleted',$s->id)}}" class="btn btn-secondary">restore</a>
        </td> --}}
    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection
