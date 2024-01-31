@extends('dashboard.chiefDashboard')

@section('mainbarAdmim')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold h3 text-primary p-3">the iteams</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{route('iteams.store')}}" method="POST" >
          @csrf
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="content">content with the amount</label></span>
            </div>
            {{-- @foreach ($product as $p)
            <div class="container" >
              <div class="row">
                <div class="col-sm-12 text-align-center">
                  <label for="product_id[]">{{$p->name}} ({{$p->cost}})</label>
                  <input type="checkbox" name="product_id[]" value="{{$p->id}}" >

                  <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><label for="amount[]">amount</label></span>
                    </div>
                    <input type="number" name="amount[]" >

                </div>
            @endforeach --}}
            @foreach ($request_array as $r_a)
            <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><label for="product_id[]">product</label></span>
                </div>
                <input type="text" name="product_id[]" value="{{$r_a}}" readonly>
                {{-- <input type="text" name="product_id[]" value="@foreach($product as $p)@if($r_a== $p->id){{$p->name}}@endif @endforeach" readonly> --}}
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><label for="amount[]">amount</label></span>
                    </div>
                    <input type="number" name="amount[]" required>
            @endforeach

        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><label for="room_id">room number</label></span>
              </div>
              <select name="order_id" id="order_id">
                  @foreach ($order as $r)
                  <option value="{{$r->id}}">{{$r->room->number}}</option>
                  @endforeach
              </select>
          </div>



          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background-color: blue">send</button>
          </div>
        </form>
      </div>
    </div>
  </div



@endsection
