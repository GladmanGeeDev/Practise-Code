@extends('layouts.admin ')

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Properties</h5>
          <a  href="{{ route('create.properties')}}" class="btn btn-primary mb-4 text-center float-right">Create Property</a>

          <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Property title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Location</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                    <tr>
                        <th scope="row">{{ $property->id }}</th>
                        <td>
                            <img src="{{ asset('assets/images/' . $property->image) }}" alt="Property Image" width="100">

                        </td>
                        <td>{{ $property->title }}</td>
                        <td>{{ $property->category->name }}</td>
                        <td>{{ $property->price }}</td>
                        <td>{{ $property->city }}</td>
                        <td><a href="#" class="btn btn-danger text-center">delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        </div>
      </div>
    </div>
  </div>

@endsection