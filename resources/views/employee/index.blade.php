@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

@if (session()->has('message'))
    <div class="text-green-400 m-2 b-4 bg-green-200" style="background-color: #dfffdf">{{session()->get('message')}}</div>
@endif

<div class="tbodyDiv">
<table class="table table-bordered table-striped text-center">
    <a href="{{route('showAllEmployeeDeleted')}}"><button class="btn btn-secondary">archive employee</button></a>

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
    {{-- <th>date_of_depart</th> --}}
    <th>phone_number</th>
    <th>word_hours</th>
    <th>edit</th>
    <th>archive</th>
</tr>
</thead>
<tbody>
    @foreach ($employee as $e)
    <tr>
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
        {{-- <td>{{$e->date_of_depart}}</td> --}}
        <td>{{$e->phone_number}}</td>
        <td>{{$e->word_hours}}</td>
        <td>
            <a href="{{route('employees.edit',$e->id)}}" class="btn btn-primary">edit</a>
        </td>
        <td>
            <form action="{{route('employees.destroy',$e->id)}}" method="POST">
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
