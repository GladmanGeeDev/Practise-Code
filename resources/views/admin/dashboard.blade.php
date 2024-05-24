@extends('layouts.admin ')

@section('content')

<div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Properties</h5>
          <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
          <p class="card-text">No#: {{ $properties }}</p>
         
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Categories</h5>
          
          <p class="card-text">number of categories: {{ $categories }}</p>
          
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Clients</h5>
          
          <p class="card-text">number of admins: 3</p>
          
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Applications</h5>
          
          <p class="card-text">number of applications: {{ $application_property }}</p>
          
        </div>
      </div>
    </div>
  </div>

@endsection