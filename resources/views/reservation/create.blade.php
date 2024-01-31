@extends('dashboard.adminDashboard')

@section('mainbarAdmim')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary h3 p-3">creat a new reservation</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{route('reservation.store')}}" method="POST" >
            @csrf
            <p style="color: red">*  please chose date between aday form now.</p>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="date">date</label></span>
            </div>
            <input type="datetime-local" name="date" class="form-control" placeholder="Enter the date" required>
          </div>
          <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><label for="room_id">room number</label></span>
                </div>
                <select name="room_id" id="room_id">
                    @foreach ($room as $t)
                    <option value="{{$t->id}}">{{$t->number}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><label for="user_id">user name</label></span>
              </div>
              <select name="user_id" id="user_id">
                  @foreach ($user as $u)
                     <option value="{{$u->id}}">{{$u->name}} {{$u->last_name}}</option>
                     @endforeach
             </select>
            </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background-color: blue">send</button>
          </div>
        </form>
      </div>
    </div>
  </div>




@endsection
