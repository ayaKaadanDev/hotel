@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
    <thead class="sticky-top bg-white">
    <tr>
        <td>name</td>
        <td>cost</td>
        <td>user name</td>
        <td>delete at</td>
        <td>restore</td>
    </tr>
</thead>
<tbody>
    @foreach ($product as $p)
    <tr>
        <td>{{$p->name}}</td>
        <td>{{$p->cost}}</td>
        <td>{{$p->user->name}}</td>
        <td>{{$p->deleted_at}}</td>
        <td>
            <a href="{{route('getThisProductDeleted',$p->id)}}" class="btn btn-secondary">restore</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection
