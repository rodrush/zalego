@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center">
            <div class="card-header">
            unit
            <p class="card-title">
                Number of Units:{{$numberOfUnits}} <br>
                Number of Units:{{count($units)}} <br>
                Max Id:{{$maxId}}
                Min id:{{$minId}} <br>
                Average Id:{{$average}} <br>
                Total:{{$total}}
            </p>
            <a href="{{route('unit.create')}}" class="btn btn-primary px-5">Create Unit</a>
            <a href="{{route('query-building')}}" class="btn btn-primary px-3">details</a>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Syllabus</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $key=>$unit)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$unit->name}}</td>
                                <td>{{$unit->courses->name}}</td>
                                <td>{{$unit->syllabus}}</td>
                                <td>{{$unit->duration}}</td>
                                <td>{{Str::limit($unit->desc,25,'..to be continued')}}</td>
                                <td>{{$unit->users->name}}</td>
                                <td>
                                    <a href="{{route('unit.edit',$unit->id)}}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                                    <a href="{{route('unit.show',$unit->id)}}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                    <form action="{{route('unit.destroy',$unit->id)}}" method="POST">
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