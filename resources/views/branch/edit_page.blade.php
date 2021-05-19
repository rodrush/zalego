@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center">
            <div class="card-body">
                <form action="{{route('update',$branch->id)}}" method="POST"> 
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" name="name" value="{{$branch->name}}" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Town</label>
                            <input type="text" name="town" value="{{$branch->town}}" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="inputAddress">Contact</label>
                            <input type="text" name="contact" value="{{$branch->contact}}" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Description</label>
                            <textarea name="description"  class="form-control" id="summernote">
                                {{$branch->description}}
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