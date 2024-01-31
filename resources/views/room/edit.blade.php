@extends('dashboard.adminDashboard')

@section('mainbarAdmim')


<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary p-3">edit the room</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{route('rooms.update',$room->id)}}" method="POST" >
            @csrf
            @method('put')
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="number">number</label></span>
            </div>
            <input type="number" name="number" class="form-control" value="{{$room->number}}" placeholder="Enter the number" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="floor">floor</label></span>
            </div>
            <input type="number" name="floor" class="form-control" value="{{$room->floor}}" placeholder="Enter the floor" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="beds_number">beds number</label></span>
            </div>
            <input type="number" name="beds_number" class="form-control" value="{{$room->beds_number}}" placeholder="Enter the beds number" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="status">status</label></span>
            </div>
            <select name="status" id="status">
                <option value="available">available</option>
                <option value="busy">busy</option>
            </select>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background-color: blue">save</button>
          </div>
        </form>
      </div>
    </div>
  </div>



@endsection

