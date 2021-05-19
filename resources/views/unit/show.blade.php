@extends('layouts.app')

@section('content')
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name</h5>
                <p class="card-text">{{$unit->name}}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Course</h5>
                <p class="card-text">{{$unit->courses->name}}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Syllabus</h5>
                <p class="card-text"> </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Duration</h5>
                <p class="card-text">{{$unit->duration}}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">{{$unit->description}}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Created By</h5>
                <p class="card-text">{{$unit->users->name}}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Created At</h5> 
                <p class="card-text">{{$unit->created_at->diffForHumans()}}</p>
                <p class="card-text">{{date('dS-m-y:H:i',strtotime($unit->created_at)+10800)}}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Updated At</h5>
                <p class="card-text">{{date('dS-F-Y',strtotime($unit->updated_at))}}</p>
            </div>
        </div>
    </div>
@endsection