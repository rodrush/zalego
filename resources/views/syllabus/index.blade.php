@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center">
            <div class="card-header">
            Syllabus
            <a href="{{route('syllabus.create')}}" class="btn btn-primary px-5">Create Syllabus</a>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Unit Name</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                         @foreach ($syllabi as $syllabus)
                             <tr>
                                 <td>{{$syllabus->id}}</td>
                                 <td>{{$syllabus->units->name}}</td>
                                 <td>{{$syllabus->users->name}}</td>
                                 <td>
                                <a href="{{route('syllabus.edit',$syllabus->id)}}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                                <a href="{{route('syllabus.show',$syllabus->id)}}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                    <form action="{{route('syllabus.destroy',$syllabus->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                 </td>
                             </tr>
                         @endforeach
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