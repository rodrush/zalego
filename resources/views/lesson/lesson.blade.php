@extends('layouts.app')

@section('content')
        <div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center">
            <div class="card-header">
            Course
            <a href="{{route('create-lesson')}}" class="btn btn-primary px-5">Create Lesson</a>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Program</th>
                        <th scope="col">Level</th>
                        <th scope="col">Start</th>
                        <th scope="col">End</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                         @forelse ($lessons as $key=>$lesson) 
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$lesson->name}}</td>
                                <td>{{$lesson->program}}</td>
                                <td>{{$lesson->level}}</td>
                                <td>{{$lesson->start}}</td>
                                <td>{{$lesson->end}}</td>
                                <td>{{$lesson->created_by}}</td>
                                <td>
                                    <a href="{{route('edit-lesson',$lesson->id)}}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                                    <a href="{{route('show-lesson',$lesson->id)}}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                    <form action="{{route('delete-lesson',$lesson->id)}}" method="POST">
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