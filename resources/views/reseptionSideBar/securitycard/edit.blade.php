@extends('dashboard.receptionDashboard')

@section('mainbarAdmim')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary p-3">edit the secutiry card</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{route('securitycards.update',$securityCard->id)}}" method="POST" >
            @csrf
            @method('put')
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="user_id">first name & last name</label></span>
            </div>
            <select name="user_id" id="user_id">
                @foreach ($user as $u)
                    <option value="{{$u->id}}">{{$u->name}} {{$u->last_name}}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="fathers_name">fathers name</label></span>
            </div>
            <input type="text" name="fathers_name" class="form-control" value="{{$securityCard->fathers_name}}" placeholder="Enter the fathers name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="mothers_name">mothers name</label></span>
            </div>
            <input type="text" name="mothers_name" class="form-control" value="{{$securityCard->mothers_name}}" placeholder="Enter the mothers name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="place_of_birth">place of birth</label></span>
            </div>
            <input type="text" name="place_of_birth" class="form-control" value="{{$securityCard->place_of_birth}}" placeholder="Enter the place of birth" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="date_of_birth">date of birth</label></span>
            </div>
            <input type="date" name="date_of_birth" class="form-control" value="{{$securityCard->date_of_birth}}" placeholder="Enter the date of birth" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="nationality">nationality</label></span>
            </div>
            <input type="text" name="nationality" class="form-control" value="{{$securityCard->nationality}}" placeholder="Enter the nationality" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="profassion">profassion</label></span>
            </div>
            <input type="text" name="profassion" class="form-control" value="{{$securityCard->profassion}}" placeholder="Enter the profassion" required>
          </div>
          <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><label for="domicile">domicile</label></span>
                </div>
                <input type="text" name="domicile" class="form-control" value="{{$securityCard->domicile}}" placeholder="Enter the domicile" required>
            </div>
            <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="no_of_identity_or_passport">no of identity or passport</label></span>
            </div>
            <input type="number" name="no_of_identity_or_passport" class="form-control" value="{{$securityCard->no_of_identity_or_passport}}" placeholder="Enter the no of identity or passport" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="date_of_identity_or_passport">date of identity or passport</label></span>
            </div>
            <input type="date" name="date_of_identity_or_passport" class="form-control" value="{{$securityCard->date_of_identity_or_passport}}" placeholder="Enter the date of identity or passport" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="issued_of_identity_or_passport">issued of identity or passport</label></span>
            </div>
            <input type="text" name="issued_of_identity_or_passport" class="form-control" value="{{$securityCard->issued_of_identity_or_passport}}" placeholder="Enter the issued of identity_ or passport" required>
          </div>

          <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><label for="arrive_from">arrive from</label></span>
          </div>
          <input type="text" name="arrive_from" class="form-control" value="{{$securityCard->arrive_from}}" placeholder="Enter the arrive from" required>
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><label for="date_of_arrive">date of arrive</label></span>
            </div>
            <input type="date" name="date_of_arrive" class="form-control" value="{{$securityCard->date_of_arrive}}" placeholder="Enter the date of arrive" required>
        </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="date_of_depart">date of depart</label></span>
            </div>
            <input type="date" name="date_of_depart" class="form-control" value="{{$securityCard->date_of_depart}}" placeholder="Enter the date of depart" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="room_id">room number & bed's number</label></span>
            </div>
            <select name="room_id" id="room_id">
                @foreach ($room as $r)
                <option value="{{$r->id}}">{{$r->number}} ({{$r->beds_number}}beds)</option>
                @endforeach
            </select>
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
