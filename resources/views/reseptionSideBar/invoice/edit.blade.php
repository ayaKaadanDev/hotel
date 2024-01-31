@extends('dashboard.receptionDashboard')

@section('mainbarAdmim')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold h3 text-primary p-3">edit the invoice</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{route('invoices.update',$invoice->id)}}" method="POST" >
          @csrf
          @method('put')
          <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><label for="room_id">room number</label></span>
              </div>
              <select name="room_id" id="room_id">
                  @foreach ($room as $r)
                  <option value="{{$r->id}}">{{$r->number}}</option>
                  @endforeach
              </select>
          </div>


          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="reservation_cost">reservation cost</label></span>
            </div>
            <input type="number" name="reservation_cost" class="form-control" value="{{$invoice->reservation_cost}}" placeholder="Enter the reservation cost" required>
          </div>




          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background-color: blue">send</button>
          </div>
        </form>
      </div>
    </div>
  </div



@endsection
