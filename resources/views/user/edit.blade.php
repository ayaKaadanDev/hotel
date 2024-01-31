@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary p-3">edit the client</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{route('users.update',$user->id)}}" method="POST" >
            @csrf
            @method('put')
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="first_name">first name</label></span>
            </div>
            <input type="text" name="first_name" class="form-control" value="{{$user->name}}" placeholder="Enter the first name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="last_name">last name</label></span>
            </div>
            <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}" placeholder="Enter the last name" required>
          </div>
          {{-- <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="fathers_name">fathers name</label></span>
            </div>
            <input type="text" name="fathers_name" class="form-control" value="{{$user->fathers_name}}" placeholder="Enter the fathers name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="mothers_name">mothers name</label></span>
            </div>
            <input type="text" name="mothers_name" class="form-control" value="{{$user->mothers_name}}" placeholder="Enter the mothers name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="place_of_birth">place of birth</label></span>
            </div>
            <input type="text" name="place_of_birth" class="form-control" value="{{$user->place_of_birth}}" placeholder="Enter the place of birth" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="date_of_birth">date of birth</label></span>
            </div>
            <input type="date" name="date_of_birth" class="form-control" value="{{$user->date_of_birth}}" placeholder="Enter the date of birth" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="nationality">nationality</label></span>
            </div>
            <input type="text" name="nationality" class="form-control" value="{{$user->nationality}}" placeholder="Enter the nationality" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="profassion">profassion</label></span>
            </div>
            <input type="text" name="profassion" class="form-control" value="{{$user->profassion}}" placeholder="Enter the profassion" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="domicile">domicile</label></span>
            </div>
            <input type="text" name="domicile" class="form-control" value="{{$user->domicile}}" placeholder="Enter the domicile" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="no_of_identity_or_passport">no of identity or passport</label></span>
            </div>
            <input type="number" name="no_of_identity_or_passport" class="form-control" value="{{$user->no_of_identity_or_passport}}" placeholder="Enter the no of identity or passport" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="date_of_identity_or_passport">date of identity or passport</label></span>
            </div>
            <input type="date" name="date_of_identity_or_passport" class="form-control" value="{{$user->date_of_identity_or_passport}}" placeholder="Enter the date of identity or passport" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="issued_of_identity_or_passport">issued of identity or passport</label></span>
            </div>
            <input type="text" name="issued_of_identity_or_passport" class="form-control" value="{{$user->issued_of_identity_or_passport}}" placeholder="Enter the issued of identity_ or passport" required>
          </div> --}}
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="email">email</label></span>
            </div>
            <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Enter your email" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="password">password</label></span>
            </div>
            <input type="password" name="password" class="form-control" value="{{$user->password}}" placeholder="Enter your password" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="phone_number">phone number</label></span>
            </div>
            <input type="number" name="phone_number" class="form-control" value="{{$user->phone_number}}" placeholder="Enter your phone number" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background-color: blue">save</button>
            {{-- <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Send"> --}}
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
