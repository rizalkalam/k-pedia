@extends('layouts.main')
@section('container')
            <h3 class="text-center mt-3">Edit data</h3>
            <form method="post" action="/update/{{ $member->id }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label >Name</label>
                    <input type="text" class="form-control" required id="name" name="name" value="{{ old('name', $member->name) }}">
                </div>
                <div class="mb-3">
                    <label for="group" class="form-label">Group</label>
                    <select class="form-select" name="group_id" id="">
                        @foreach ($group as $data)
                            @if (old('group_id', $member->group_id == $data->id))
                                <option name="group_id" value="{{ $data->id }}" selected>{{ $data->group_name }}</option>    
                            @else
                                <option name="group_id" value="{{ $data->id }}">{{ $data->group_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" required id="age" name="age" value="{{ old('age', $member->age) }}">
                </div>
                <div class="mb-3">
                    <label for="birth_place" class="form-label">birth place</label>
                    <input type="text" class="form-control" required id="birth_place" name="birth_place" value="{{ old('birth_place', $member->birth_place) }}">
                </div>
                <div class="mb-3">
                    <label for="birth_date" class="form-label">birth date</label>
                    <input type="date" class="form-control" required id="birth_date" name="birth_date" value="{{ old('birth_date', $member->birth_date) }}">
                </div>
                <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" class="form-control" id="image" name="image" value="{{ old('image', $member->image) }}">
              </div>
            <a type="button" href="/dashboard/all" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
@endsection
