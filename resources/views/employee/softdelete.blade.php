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
        <th>phone_number</th>
        <th>word_hours</th>
        <td>deleted at</td>
    </tr>
</thead>
<tbody>
    @foreach ($employee as $e)
    <tr>
            <td>
                <a href="{{route('getThisEmployeeDeleted',$e->id)}}" class="btn btn-secondary">restore</a>
            </td>
            <td>{{$e->first_name}}</td>
            <td>{{$e->last_name}}</td>
            <td>{{$e->fathers_name}}</td>
            <td>{{$e->mothers_name}}</td>
            <td>{{$e->place_of_birth}}</td>
            <td>{{$e->date_of_birth}}</td>
            <td>{{$e->nationality}}</td>
            <td>{{$e->profassion}}</td>
            <td>{{$e->domicile}}</td>
            <td>{{$e->no_of_identity_or_passport}}</td>
            <td>{{$e->date_of_identity_or_passport}}</td>
            <td>{{$e->issued_of_identity_or_passport}}</td>
            <td>{{$e->arrive_from}}</td>
            <td>{{$e->date_of_arrive}}</td>
            <td>{{$e->date_of_depart}}</td>
            <td>{{$e->phone_number}}</td>
            <td>{{$e->word_hours}}</td>
            <td>{{$e->deleted_at}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>

@endsection
