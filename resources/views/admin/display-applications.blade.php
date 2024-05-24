@extends('layouts.admin ')

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Property Applications</h5>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Client Name</th>
                <th scope="col">Property Name</th>
            
                <th scope="col">Price</th>
                <th scope="col">Location</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($applications as $app)
                <tr>
                    <th scope="row">{{ $app->id}}</th>
               
                    <td>{{ $app->user->name }}</td>
                    
                    <td>{{$app->property_title}}</td>
                
                     <td>{{$app->property_price}}</td>
                     <td>{{$app->property_city}}</td>
                     <td><a href="#" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                @endforeach
            
           
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>

@endsection