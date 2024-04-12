@extends('layout')
@section('content')
<div class="container py-5">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
        Add
      </button>
     <a href="/logout" class="text-decoration-none text-danger ms-5">Logout</a>
      {{-- table --}}
      <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">user_id</th>
            <th scope="col">task</th>
            <th scope="col">description</th>
            <th scope="col">category</th>
            <th scope="col">tags</th>
            <th scope="col">status</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->user_id}}</td>
                <td>{{$item->task}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->category}}</td>
                <td>{{$item->tags}}</td>
                <td>{{$item->status}}</td>
                <td><a href="/edit/{{$item->id}}">Edit</a><a href="/delete/{{$item->id}}" class="ms-2">Delete</a></td>
              </tr>
            @endforeach
        </tbody>
      </table>
      <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add</h5>
              <button type="button" class="close ms-auto" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" id='addTaskForm'>
                @csrf
                <div class="form-group">
                    <label>Task</label>
                    <input type="text" class="form-control" name="task">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="" cols="30" rows="10" name='description'></textarea>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <input type="text" class="form-control" name="category">
                </div>
                <div class="form-group">
                    <label>Tags</label>
                    <input type="text" class="form-control" name="tags">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="true">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Active
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="false">
                        <label class="form-check-label" for="flexRadioDefault2">
                          Inactive
                        </label>
                      </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
          </div>
        </div>
      </div>
</div>

@endsection