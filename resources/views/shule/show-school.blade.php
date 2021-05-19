@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="card text-center">
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                      </tr>
                    </thead>
                    <tbody> 
                          <tr>
                              <td>{{$school->name}}</td>
                              <td>{{$school->description}}</td>
                              <td>{{$school->created_by}}</td>
                              <td>{{$school->created_at->diffForHumans()}}, 
                                <p>{{date('dS-F-Y:H:i:s',strtotime($school->created_at)+10800)}}</p>
                              </td>
                              <td>{{date('dS-F-Y',strtotime($school->updated_at))}}</td>
                          </tr>
                    </tbody>
                  </table>
                  <hr>
                  <h1>Courses under {{Str::upper($school->name)}}</h1>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Exam Body</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                      </tr>
                    </thead>
                    <tbody> 
                        @forelse ($courses as $key=>$course)
                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$course->name}}</td>
                              <td>{{$course->desc}}</td>
                              <td>{{$course->exams->name}}</td>
                              <td>{{$course->createdBy->name}}</td>
                              <td>{{$course->updated_at->diffForHumans()}}</td>
                              <td>{{date('d:M:y',strtotime($course->created_at))}}</td>
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