@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary p-3">edit the employee</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{route('employees.update',$employee->id)}}" method="POST" >
            @csrf
            @method('put')
            <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><label for="first_name">first name</label></span>
                </div>
                <input type="text" name="first_name" class="form-control" value="{{$employee->first_name}}" placeholder="Enter the first name" required>
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><label for="last_name">last name</label></span>
                </div>
                <input type="text" name="last_name" class="form-control" value="{{$employee->last_name}}" placeholder="Enter the last name" required>
              </div>

          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="fathers_name">father's name</label></span>
            </div>
            <input type="text" name="fathers_name" class="form-control" value="{{$employee->fathers_name}}" placeholder="Enter the fathers name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="mothers_name">mother's name</label></span>
            </div>
            <input type="text" name="mothers_name" class="form-control" value="{{$employee->mothers_name}}" placeholder="Enter the mothers name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="place_of_birth">place of birth</label></span>
            </div>
            <input type="text" name="place_of_birth" class="form-control" value="{{$employee->place_of_birth}}" placeholder="Enter the place of birth" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="date_of_birth">date of birth</label></span>
            </div>
            <input type="date" name="date_of_birth" class="form-control" value="{{$employee->date_of_birth}}" placeholder="Enter the date of birth" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="nationality">nationality</label></span>
            </div>
            <input type="text" name="nationality" class="form-control" value="{{$employee->nationality}}" placeholder="Enter the nationality" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="profassion">profassion</label></span>
            </div>
            <input type="text" name="profassion" class="form-control" value="{{$employee->profassion}}" placeholder="Enter the profassion" required>
          </div>
          <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><label for="domicile">domicile</label></span>
                </div>
                <input type="text" name="domicile" class="form-control" value="{{$employee->domicile}}" placeholder="Enter the domicile" required>
            </div>
            <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="no_of_identity_or_passport">no of identity or passport</label></span>
            </div>
            <input type="number" name="no_of_identity_or_passport" class="form-control" value="{{$employee->no_of_identity_or_passport}}" placeholder="Enter the no of identity or passport" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="date_of_identity_or_passport">date of identity or passport</label></span>
            </div>
            <input type="date" name="date_of_identity_or_passport" class="form-control" value="{{$employee->date_of_identity_or_passport}}" placeholder="Enter the date of identity or passport" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="issued_of_identity_or_passport">issued of identity or passport</label></span>
            </div>
            <input type="text" name="issued_of_identity_or_passport" class="form-control" value="{{$employee->issued_of_identity_or_passport}}" placeholder="Enter the issued of identity_ or passport" required>
          </div>

          <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><label for="arrive_from">arrive from</label></span>
          </div>
          <input type="text" name="arrive_from" class="form-control" value="{{$employee->arrive_from}}" placeholder="Enter the arrive from" required>
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><label for="date_of_arrive">date of arrive</label></span>
            </div>
            <input type="date" name="date_of_arrive" class="form-control" value="{{$employee->date_of_arrive}}" placeholder="Enter the date of arrive" required>
        </div>
          {{-- <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="date_of_depart">date of depart</label></span>
            </div>
            <input type="date" name="date_of_depart" class="form-control" value="{{$employee->date_of_depart}}" placeholder="Enter the date of depart" required>
          </div> --}}

          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="phone_number">phone number</label></span>
            </div>
            <input type="number" name="phone_number" class="form-control" value="{{$employee->phone_number}}" placeholder="Enter the phone number" required>
          </div>

          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="word_hours">word hours</label></span>
            </div>
            <input type="number" name="word_hours" class="form-control" value="{{$employee->word_hours}}" placeholder="Enter the word hours" required>
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
