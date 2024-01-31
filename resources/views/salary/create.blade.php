@extends('dashboard.adminDashboard')

@section('mainbarAdmim')


<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary h3 p-3">creat a new salary</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{route('salaries.store')}}" method="POST" >
            @csrf
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="employee_id">employee_id</label></span>
            </div>
            <select name="employee_id" id="employee_id">
                @foreach ($employee as $e)
                    <option value="{{$e->id}}">{{$e->first_name}} {{$e->last_name}}</option>
                @endforeach
            </select>
            </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="salary">salary</label></span>
            </div>
            <input type="number" name="salary" class="form-control" placeholder="Enter the salary" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="additional_name">additional name</label></span>
            </div>
            <input type="text" name="additional_name" class="form-control" value="null" placeholder="Enter the additional name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="additional_quantity">additional quantity</label></span>
            </div>
            <input type="number" name="additional_quantity" class="form-control" value="0" placeholder="Enter the additional quantity" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="severance_name">severance name</label></span>
            </div>
            <input type="text" name="severance_name" class="form-control" value="null" placeholder="Enter the severance name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="severance_quantity">severance quantity</label></span>
            </div>
            <input type="number" name="severance_quantity" class="form-control" value="0" placeholder="Enter the severance quantity" required>
          </div>


          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background-color: blue">send</button>
          </div>
        </form>
      </div>
    </div>
  </div>



@endsection

