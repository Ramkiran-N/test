@extends('layout')
@section('content')
    <div class="container py-5">
        <h3>Edit</h3>
        <form method="POST" id='editTaskForm'>
            @csrf
            <div class="form-group">
                <label>Task</label>
                <input type="text" class="form-control" name="task" value={{$data->task}}>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" id="" cols="30" rows="10" name='description' >{{$data->description}}</textarea>
            </div>
            <div class="form-group">
                <label>Category</label>
                <input type="text" class="form-control" name="category" value={{$data->category}}>
                <input type="text" class="form-control d-none" name="id" value={{$data->id}}>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <input type="text" class="form-control" name="tags" value={{$data->tags}}>
            </div>
            <div class="form-group">
                <label>Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="true" {{$data->status==1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault1">
                      Active
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="false"  {{$data->status==0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault2">
                      Inactive
                    </label>
                  </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection