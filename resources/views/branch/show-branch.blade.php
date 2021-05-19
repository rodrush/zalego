@extends('layouts.app')

@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      
      <div class="card-body">
        <h5 class="card-title">Name</h5>
        <p class="card-text">
            {{$branch->name}}
        </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
    
      <div class="card-body">
        <h5 class="card-title">Contact</h5>
        <p class="card-text">
            {{$branch->contact}}
        </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
    
      <div class="card-body">
        <h5 class="card-title">Description</h5>
        <p class="card-text">
            {{$branch->description}}
        </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
 
      <div class="card-body">
        <h5 class="card-title">Created By</h5>
        <p class="card-text">
            {{$branch->created_by}}
        </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
 
      <div class="card-body">
        <h5 class="card-title">Created at</h5>
        <p class="card-text">
            {{$branch->created_at->diffForHumans()}}
        </p>
        <p class="card-text">
            {{date('dS-F-Y',strtotime($branch->created_at))}}
        </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
 
      <div class="card-body">
        <h5 class="card-title">Updated at</h5>
        <p class="card-text">
            {{date('dS-F-Y',strtotime($branch->updated_at))}}
        </p>
      </div>
    </div>
  </div>
</div>
@endsection