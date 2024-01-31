@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

<div class="tbodyDiv">
<table class="table table-bordered table-striped text-center">
<thead class="sticky-top bg-white">
<tr>
    <th>first_name</th>
    <th>last_name</th><th>email</th>
    <th>phone number</th>
    <th>deleted at</th>
    <th>restore</th>
</tr>
</thead>
<tbody>
    @foreach ($user as $u)
    <tr>
        <td>{{$u->name}}</td>
        <td>{{$u->last_name}}</td>
        {{-- <td>{{$u->fathers_name}}</td>
        <td>{{$u->mothers_name}}</td>
        <td>{{$u->place_of_birth}}</td>
        <td>{{$u->date_of_birth}}</td>
        <td>{{$u->nationality}}</td>
        <td>{{$u->profassion}}</td>
        <td>{{$u->domicile}}</td>
        <td>{{$u->no_of_identity_or_passport}}</td>
        <td>{{$u->date_of_identity_or_passport}}</td>
        <td>{{$u->issued_of_identity_or_passport}}</td> --}}
        <td>{{$u->email}}</td>
        <td>{{$u->phone_number}}</td>
        <td>{{$u->deleted_at}}</td>
        <td>
            <a href="{{route('getThisUserDeleted',$u->id)}}" class="btn btn-secondary">restore</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection
