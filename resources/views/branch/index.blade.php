@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center">
            <div class="card-header">
            Branches
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#branchModal">
                Launch demo modal
              </button>
              
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Town</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($branches as $key=>$branch)
                          <tr>
                              <td>{{$key+1}}</td> 
                              <td>{{$branch->name}}</td>
                              <td>{{$branch->town}}</td>
                              <td>{{$branch->contact}}</td>
                              <td>{{$branch->created_by}}</td>
                              <td>
                                  <a href="/edit-branch/{{$branch->id}}" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></a>
                                  <a href="/show-branch/{{$branch->id}}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                                  <form action="{{route('delete-branch',$branch->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></button>
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
<div class="modal fade" id="branchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('store')}}" method="POST"> 
                @csrf
                {{-- @method('PUT') --}}
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Name</label>
                    <input type="text" name="name" class="form-control" id="inputEmail4">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Town</label>
                    <input type="text" name="town" class="form-control" id="inputPassword4">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Contact</label>
                  <input type="text" name="contact" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                  </div>   
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>
@endsection