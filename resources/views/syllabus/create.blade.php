@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center">
            <div class="card-body">
                <form action="{{route('syllabus.store')}}" method="POST"> 
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Course</label>
                            <select name="unit_id" class="form-control" id="select2">
                                <option selected disabled>Select Course</option>
                                @foreach ($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="inputAddress">Description</label>
                            <textarea name="description"  class="form-control" >
                               
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