@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center">
            <div class="card-body">
                <form action="{{route('store-lesson')}}" method="POST"> 
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" name="name"  class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Program</label>
                            <input type="text" name="program"  class="form-control" id="inputEmail4">
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
                    </div>
                        <div class="form-group">
                            <label for="inputAddress">Start</label>
                            <input type="time" name="start"  class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                           <div class="form-group">
                            <label for="inputAddress">End</label>
                            <input type="time" name="end"  class="form-control" id="inputAddress" placeholder="1234 Main St">
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