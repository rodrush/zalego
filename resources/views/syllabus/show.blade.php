@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$syllabus->units->name}}</h3>
        </div>
            <div class="card-body">
                <p class="card-text">{!!$syllabus->desc!!}</p>
            </div>
    </div>
@endsection