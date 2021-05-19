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
                              <td>{{$exam->name}}</td>
                              <td>{{$exam->description}}</td>
                              <td>{{$exam->created_by}}</td>
                              <td>{{$exam->created_at->diffForHumans()}}, 
                                <p>{{date('dS-F-Y:H:i:s',strtotime($exam->created_at)+10800)}}</p>
                              </td>
                              <td>{{date('dS-F-Y',strtotime($exam->updated_at))}}</td>
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