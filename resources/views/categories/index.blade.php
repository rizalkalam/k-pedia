@extends('layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All K-pop Member</h1>
    </div>

    <div class="table-responsive col-lg-10">
      <a class="btn btn-primary w-40 float-end ms-2" type="button" data-bs-toggle="modal" data-bs-target="#addModal">add</a>
        <table class="table table-striped table-sm align-middle">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">group</th>
              <th scope="col">age</th>
              <th scope="col">birth_place</th>
              <th scope="col">birth_date</th>
              <th scope="col">image</th>
              <th scope="col">action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($members as $member)    
            <tr>
              <td>{{ $member->id }}</td>
              <td>{{ $member->name }}</td>
              <td>{{ $member->group->group_name }}</td>
              <td>{{ $member->age }}</td>
              <td>{{ $member->birth_place }}</td>
              <td>{{ $member->birth_date }}</td>
              <td><img src="{{ asset('storage/' . $member->image) }}" alt="" class="img-thumbnail" width="50" height="50"></td>
              <td>
                
                
                <a href="" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{ $member->id }}"><span data-feather="eye"></span></a>
                <a href="/detail/{{ $member->id }}" class="badge bg-info"><span data-feather="edit"></span></a>
                
                <form action="/delete/{{ $member->id }}" method="POST" class="d-inline">
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
              <form method="POST" action="/add" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label >Name</label>
                  <input type="text" class="form-control" required id="name" name="name">
                </div>
                <div class="mb-3">
                  <label for="group" class="form-label">Group</label>
                  <select class="form-select" name="group_id" id="">
                    @foreach ($group as $item)
                    <option name="group_id" value="{{ $item->id }}">{{ $item->group_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label >Age</label>
                  <input type="number" class="form-control" required id="age" name="age" >
              </div>
              <div class="mb-3">
                <label for="birth_place" class="form-label">birth place</label>
                <input type="text" class="form-control" required id="birth_place" name="birth_place">
              </div>
              <div class="mb-3">
                <label for="birth_date" class="form-label">birth date</label>
                <input type="date" class="form-control" required id="birth_date" name="birth_date">
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" class="form-control" required id="image" name="image">
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
  
  
  
      
  <!-- Modal edit -->
  <div class="modal fade" id="editModal-{{ $member->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editLabel">Edit</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/update/{{ $member->id }}">
            @csrf
            <div class="mb-3">
              <input type="hidden" id="id" name="id" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{ $member->id }}" readonly>
              <label >Name</label>
              <input type="text" class="form-control" required id="name" name="name" readonly value="{{ $member->name }}">
          </div>
          <div class="mb-3">
            <label for="group" class="form-label">Group</label>
            <input type="text" class="form-control" readonly value="{{ $member->group->group_name }}">
        </div>
          <div class="mb-3">
              <label >Age</label>
              <input type="number" class="form-control" required id="age" name="age" readonly value="{{ $member->age }}">
          </div>
          <div class="mb-3">
              <label for="birth_place" class="form-label">birth place</label>
              <input type="text" class="form-control" required id="birth_place" name="birth_place" readonly value="{{ $member->birth_place }}">
          </div>
          <div class="mb-3">
              <label for="birth_date" class="form-label">birth date</label>
              <input type="date" class="form-control" required id="birth_date" name="birth_date" readonly value="{{ $member->birth_date }}">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="text" class="form-control" required id="image" name="image" readonly value="{{ $member->image }}">
        </div>
      </div>
      <div class="modal-footer">
      </form>
        </div>
      </div>
    </div>
  </div>
  
  
  


@endsection