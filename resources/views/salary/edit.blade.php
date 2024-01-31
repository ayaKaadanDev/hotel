@extends('dashboard.adminDashboard')

@section('mainbarAdmim')


<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary p-3">edit the salary</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{route('salaries.update',$salary->id)}}" method="POST" >
            @csrf
            @method('put')
            <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><label for="employee_id">employee name</label></span>
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
                <input type="number" name="salary" class="form-control" value="{{$salary->salary}}" placeholder="Enter the salary" required>
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><label for="additional_name">additional name</label></span>
                </div>
                <input type="text" name="additional_name" class="form-control" value="{{$salary->additional_name}}" placeholder="Enter the additional name" required>
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><label for="additional_quantity">additional quantity</label></span>
                </div>
                <input type="number" name="additional_quantity" class="form-control" value="{{$salary->additional_quantity}}" placeholder="Enter the additional quantity" required>
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><label for="severance_name">severance name</label></span>
                </div>
                <input type="text" name="severance_name" class="form-control" value="{{$salary->severance_name}}" placeholder="Enter the severance name" required>
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><label for="severance_quantity">severance quantity</label></span>
                </div>
                <input type="number" name="severance_quantity" class="form-control" value="{{$salary->severance_quantity}}" placeholder="Enter the severance quantity" required>
              </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background-color: blue">save</button>
          </div>
        </form>
      </div>
    </div>
  </div>



@endsection

