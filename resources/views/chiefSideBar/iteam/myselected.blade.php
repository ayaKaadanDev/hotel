@extends('dashboard.chiefDashboard')

@section('mainbarAdmim')

@if (session()->has('message'))
    <div class="text-green-400 m-2 b-4 bg-green-200" style="background-color: #dfffdf">{{session()->get('message')}}</div>
@endif

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold h3 text-primary p-3">select what you need</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{route('iteam.selected')}}" method="post" >
          @csrf

          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="content">the content</label></span>
            </div>
            @foreach ($product as $p)
            <div class="container" >
              <div class="row">
                <div class="col-sm-12 text-align-center">
                  <label for="product_id[]">{{$p->name}} ({{$p->cost}})</label>
                  {{-- <input type="checkbox" name="product_id[]" value="{{$p->name}}" > --}}
                  <input type="checkbox" name="product_id[]" value="{{$p->id}}-{{$p->name}}" >
                </div>
            @endforeach

        </div>
            {{-- <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><label for="user_id">your name</label></span>
              </div>
              <select name="user_id" id="user_id">
                  @foreach ($user as $u)
                  <option value="{{$u->id}}">{{$u->name}}</option>
                  @endforeach
              </select>
          </div> --}}



          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background-color: blue">send</button>
          </div>
        </form>
      </div>
    </div>
  </div





@endsection
