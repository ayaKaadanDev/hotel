@extends('dashboard.clientDashboard')

@section('mainbarAdmim')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 bg-light rounded">
            <h1 class="text-center font-weight-bold h3 text-primary p-3">the menu</h1>
            <hr class="bg-light">
            <h5 class="text-center text-success"></h5>

            <div class="container">
                <div class="row">
                    @foreach ($product as $p)
                    <div class="col-sm-6 p-4 d-flex justify-content-center align-item-center ">
                        <a class="bg-light rounded-circle display-5 text-primary  m-6 p-6 " href="{{route('orders.create')}}">
                            <h1>{{$p->name}}</h1>
                        </a>
                    </div>
                    @endforeach
                </div>

        </div>
    </div>
</div>

@endsection
