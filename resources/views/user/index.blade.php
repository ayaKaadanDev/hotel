@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

@if (session()->has('message'))
    <div class="text-green-400 m-2 b-4 bg-green-200" style="background-color: #dfffdf">{{session()->get('message')}}</div>
@endif

<div class="tbodyDiv">
<table class="table table-bordered table-striped text-center">
    <a href="{{route('showAllUserDeleted')}}"><button class="btn btn-secondary">archive users</button></a>
<thead class="sticky-top bg-white">
<tr>
    <th>first_name</th>
    <th>last_name</th>
    {{-- <th>fathers_name</th>
    <th>mothers_name</th>
    <th>place_of_birth</th>
    <th>date_of_birth</th>
    <th>nationality</th>
    <th>profassion</th>
    <th>domicile</th>
    <th>no_of_identity_or_passport</th>
    <th>date_of_identity_or_passport</th>
    <th>issued_of_identity_or_passport</th> --}}
    <th>email</th>
    <th>phone number</th>
    <th>edit</th>
    <th>archive</th>
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
        <td>
            <a href="{{route('users.edit',$u->id)}}" class="btn btn-primary">edit</a>
        </td>
        <td>
            <form action="{{route('users.destroy',$u->id)}}" method="POST">
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
