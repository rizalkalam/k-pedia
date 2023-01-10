@extends('layouts.main')
@section('container')
            <h3 class="text-center mt-3">Edit data</h3>
            <form method="post" action="/update/group/{{ $group->id }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label >Group Name</label>
                    <input type="text" class="form-control" required id="group_name" name="group_name" value="{{ old('group_name', $group->group_name) }}">
                  </div>
                  <div class="mb-3">
                  <label >Group Description</label>
                    <input type="text" class="form-control" required id="group_description" name="group_description" value="{{ old('group_description', $group->group_description) }}">
                  </div>
                  <div class="mb-3">
                    <label for="group_image">Group Image</label>
                    <input type="file" class="form-control" id="group_image" name="group_image" value="{{ old('group_image', $group->group_image) }}">
                  </div>
            <a type="button" href="/dashboard/girl" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
@endsection
