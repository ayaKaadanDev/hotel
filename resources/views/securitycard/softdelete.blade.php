@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

<div class="tbodyDiv">
    <table class="table table-bordered table-striped text-center">
        <thead class="sticky-top bg-white">
    <tr>
    <th>restore</th>
    <th>first_name</th>
    <th>last_name</th>
    <th>fathers_name</th>
    <th>mothers_name</th>
    <th>place_of_birth</th>
    <th>date_of_birth</th>
    <th>nationality</th>
    <th>profassion</th>
    <th>domicile</th>
    <th>no_of_identity_or_passport</th>
    <th>date_of_identity_or_passport</th>
    <th>issued_of_identity_or_passport</th>
    <th>arrive_from</th>
    <th>date_of_arrive</th>
    <th>date_of_depart</th>
    <th>room number</th>
    <th>beds number</th>
    <td>deleted at</td>
</tr>
</thead>
<tbody>
    @foreach ($securityCard as $sc)
    <tr>
        <td>
            <a href="{{route('getThisRoomDeleted',$sc->id)}}" class="btn btn-secondary">restore</a>
        </td>
        <td>{{$sc->user->name}}</td>
        <td>{{$sc->user->last_name}}</td>
        <td>{{$sc->fathers_name}}</td>
        <td>{{$sc->mothers_name}}</td>
        <td>{{$sc->place_of_birth}}</td>
        <td>{{$sc->date_of_birth}}</td>
        <td>{{$sc->nationality}}</td>
        <td>{{$sc->profassion}}</td>
        <td>{{$sc->domicile}}</td>
        <td>{{$sc->no_of_identity_or_passport}}</td>
        <td>{{$sc->date_of_identity_or_passport}}</td>
        <td>{{$sc->issued_of_identity_or_passport}}</td>
        <td>{{$sc->arrive_from}}</td>
        <td>{{$sc->date_of_arrive}}</td>
        <td>{{$sc->date_of_depart}}</td>
        <td>{{$sc->room->number}}</td>
        <td>{{$sc->room->beds_number}}</td>
        <td>{{$sc->deleted_at}}</td>
    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection
