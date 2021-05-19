@extends('layouts.app')

@section('content')
    <div class="details">
        <div>{{$course->name}}</div>
        <div>{{$course->school->name}}</div>
        <div>{{$course->exams->name}}</div>
        <div>{{$course->duration}}</div>
        <div>{{$course->desc}}</div>
        <div>{{$course->createdBy->name}}</div>
    </div>
@endsection