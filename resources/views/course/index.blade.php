@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center">
            <div class="card-header">
            Course
            <a href="{{route('course-create')}}" class="btn btn-primary px-5">Create Course</a>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">School</th>
                        <th scope="col">Exams</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $key=>$course)
                            <tr>
                                <td>{{$key+1}}</td> 
                                <td>{{$course->name}}</td>
                                <td><a href="{{route('show-school',$course->schools_id)}}">{{$course->school->name}}</a></td>
                                <td>{{$course->exams->name}}</td>
                                <td>{{$course->duration}} Years</td>
                                <td>{{$course->createdBy->name}}<br>{{$course->createdBy->email}}</td>
                                <td>
                                    <a href="{{route('edit-course',$course->id)}}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                                    <a href="{{route('show-course',$course->id)}}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                    <form action="{{route('destroy-course',$course->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                  </table>
            </div>
            <div class="card-footer text-muted">
                Zalego
            </div>
        </div>
    </div>
</div>
@endsection