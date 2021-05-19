@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center">
            <div class="card-body">
                <form action="{{route('update',$exam->id)}}" method="POST"> 
                    @csrf
                    @method('PUT')
                     <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Name</label>
                        <input type="text" name="name" value="{{$exam->name}}" class="form-control" id="formGroupExampleInput" placeholder="Type of exam">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Description</label>
                        <textarea class="form-control" id="summernote" name="description" placeholder="Description" id="floatingTextarea2" style="height: 100px">
                            {{$exam->description}}
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