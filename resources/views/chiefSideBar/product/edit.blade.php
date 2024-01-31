@extends('dashboard.chiefDashboard')

@section('mainbarAdmim')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary p-3">edit the product</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{route('products.update',$product->id)}}" method="POST" >
            @csrf
            @method('put')
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="date">name</label></span>
            </div>
            <input type="text" name="name" class="form-control" value="{{$product->name}}" placeholder="Enter the name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><label for="date">cost</label></span>
            </div>
            <input type="number" name="cost" class="form-control" value="{{$product->cost}}" placeholder="Enter the cost" required>
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
