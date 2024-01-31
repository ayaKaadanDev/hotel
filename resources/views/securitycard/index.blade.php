@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

@if (session()->has('message'))
    <div class="text-green-400 m-2 b-4 bg-green-200" style="background-color: #dfffdf">{{session()->get('message')}}</div>
@endif

<div class="tbodyDiv">
<table class="table table-bordered table-striped text-center">
    <a href="{{route('showAllSecurityCardDeleted')}}"><button class="btn btn-secondary">archive securityCard</button></a>

<thead class="sticky-top bg-white">
<tr>
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
    <th>edit</th>
    <th>archive</th>
</tr>
</thead>
<tbody>
    @foreach ($securityCard as $sc)
    <tr>
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
        <td>
            <a href="{{route('securitycards.edit',$sc->id)}}" class="btn btn-primary">edit</a>
        </td>
        <td>
            <form action="{{route('securitycards.destroy',$sc->id)}}" method="POST">
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
