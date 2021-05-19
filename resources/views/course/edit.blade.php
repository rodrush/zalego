@extends('layouts.app')

@section('content')
        <div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center"> 
            <div class="card-body">
                <form action="{{route('update-course',$course->id)}}" method="POST"> 
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" name="name" value="{{$course->name}}"  class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">school</label>
                            <select name="school_id" class="form-control" id="select2">
                                <option selected value="{{$course->schools_id}}">{{$course->school->name}}</option>
                                <option disabled>_________________</option>
                                @foreach ($schools as $school)
                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="inputAddress">exams</label>
                            <select name="exam_id" class="form-control">
                                <option selected value="{{$course->examinations_id}}">{{$course->exams->name}}</option>
                                <option disabled>_________________</option>
                                @foreach ($exams as $exam)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                                 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Duration</label>
                            <input type="text" name="duration" value="{{$course->duration}}" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Description</label>
                            <textarea name="description"  class="form-control" id="summernote">
                               {{$course->desc}}
                            </textarea>
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