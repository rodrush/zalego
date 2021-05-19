 @extends('layouts.app')

 @section('content')
     <div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card text-center">
            <div class="card-header">
            Nationa Exams {{$numberOfExams}}
            {{-- counting using collection --}}
            <br>
            {{-- {{$branches->count()}} --}}
            {{count($exams)}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#branchModal">
                New exam entry
              </button>
               
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @forelse ($exams as $key=>$exam) 
                          <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$exam->name}}</td>
                              <td>{{$exam->description}}</td>
                              <td>{{$exam->created_by}}</td>
                              <td>
                                  <a href="/edit-exam/{{$exam->id}}" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></a>
                                  <a href="/show-exam/{{$exam->id}}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                                  <form action="{{route('delete-exam',$exam->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></button>
                                  </form>
                              </td>
                          </tr>
                          @empty
                            <tr>
                              <td colspan="4">No entry found</td>
                            </tr>
                      @endforelse
                    </tbody>
                  </table>
            </div>
            <div class="card-footer text-muted">
                {{$exams->links()}}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="branchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Exams</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('exam')}}" method="POST"> 
                @csrf
                <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Type of exam">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Description</label>
                  <textarea class="form-control" name="description" placeholder="Description" id="summernote" style="height: 100px"></textarea>
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