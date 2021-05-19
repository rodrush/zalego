@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center">
            <div class="card-body">
                <form action="{{route('update-school',$school->id)}}" method="POST"> 
                    @csrf
                    @method('PUT')
                     <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Name</label>
                        <input type="text" name="name" value="{{$school->name}}" class="form-control" id="formGroupExampleInput" placeholder="Type of exam">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Description</label>
                        <textarea class="form-control" name="description" placeholder="Description" id="summernote" >
                            {{$school->description}}
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