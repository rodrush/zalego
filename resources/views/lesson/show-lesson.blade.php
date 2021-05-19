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
                        <th scope="col">Program</th>
                        <th scope="col">Start</th>
                        <th scope="col">End</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                      </tr>
                    </thead>
                    <tbody>  
                          <tr>
                                    <td>{{$lesson->name}}</td>
                                    <td>{{$lesson->program}}</td>
                                    <td>{{$lesson->start}}</td>
                                    <td>{{$lesson->end}}</td>
                                    <td>{{$lesson->created_by}}</td>
                              <td>{{$lesson->created_at->diffForHumans()}}, 
                                <p>{{date('dS-F-Y:H:i:s',strtotime($lesson->created_at)+10800)}}</p>
                              </td>
                              <td>{{date('dS-F-Y',strtotime($lesson->updated_at))}}</td>
                          </tr>
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