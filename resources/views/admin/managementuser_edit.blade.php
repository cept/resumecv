@extends('admin.index')

@section('content')
<h1>Edit Role Pengguna</h1>

<form method="POST" action="/managementuser/update/{{$user->id}}" class="mt-4" enctype="multipart/form-data">
    @csrf
    @method('put')
      <div class="col-md-6 mb-1">
          <label for="name" class="form-label">Nama</label>
          <input type="text" name="fullname" class="form-control" id="name" value="{{ $user->fullname }}" readonly>
      </div>
      <div class="col-md-6 mb-1">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
      </div>
      <div class="col-md-6 mb-3">
        <label for="role" class="form-label">Role</label>
        <select name="is_admin" class="form-select">
            <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Pengguna</option>
            <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
        </select>
      </div>
      <div class="col-6">
        <button type="submit" class="btn btn-primary">Update Role</button>
      </div>
</form>
    
@endsection