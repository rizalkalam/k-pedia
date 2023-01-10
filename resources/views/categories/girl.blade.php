@extends('layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">K-pop groups</h1>
    </div>

    <div class="table-responsive col-lg-10">
      <a class="btn btn-primary w-40 float-end ms-2" type="button" data-bs-toggle="modal" data-bs-target="#addModal">add</a>
        <table class="table table-striped table-sm align-middle">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">descirption</th>
              <th scope="col">image</th>
              <th scope="col">aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($girl as $data)    
            <tr>
              <td>{{ $data->id }}</td>
              <td>{{ $data->group_name }}</td>
              <td>{{ $data->group_description }}</td>
              <td><img src="{{ asset('storage/' . $data->group_image) }}" alt="" class="img-thumbnail" width="100" height="100"></td>
              <td>
                {{-- <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
                <a href="/detail/group/{{ $data->id }}" class="badge bg-info"><span data-feather="edit"></span></a>
                <form action="/delete/group/{{ $data->id }}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="trash"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Modal add -->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="detailAddLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="detailAddLabel">Add</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="/add/group" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label >Group Name</label>
                  <input type="text" class="form-control" required id="group_name" name="group_name">
                </div>
                <div class="mb-3">
                <label >Group Description</label>
                  <input type="text" class="form-control" required id="group_description" name="group_description">
                </div>
                <div class="mb-3">
                  <label for="group_image">Group Image</label>
                  <input type="file" class="form-control" required id="group_image" name="group_image">
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn w-auto btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn w-auto btn-primary">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection