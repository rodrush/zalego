@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center">
            <div class="card-body">

                <form action="{{route('update-lesson',$lesson->id)}}" method="POST"> 
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" name="name" value="{{$lesson->name}}" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Program</label>
                            <input type="text" name="program" value="{{$lesson->program}}" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                            <label for="inputPassword4">Level</label>
                            <select name="level" class="form-control" id="select2">
                                <option selected disabled>Select School</option>
                                <option >Degree</option>
                                <option >Masters</option>
                                <option >PHD</option>
                                <option >Diploma</option>
                                <option >Certificate</option>
                            </select>
                        </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputtime">start</label>
                            <input type="time" name="start" value="{{$lesson->start}}" class="form-control" id="inputAddress" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputtime">end</label>
                            <input type="time" name="end" value="{{$lesson->end}}" class="form-control" id="inputAddress" >
                        </div>
                    </div>    
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>                         
            </div>
        <div class="card-footer text-muted">
            Zalego
        </div>
        </div>
    </div>
</div>
    
@endsection