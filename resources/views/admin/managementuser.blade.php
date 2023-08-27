@extends('admin.index')

@section('content')
<h2 class="fs-4 mx-3">Management User</h2>
@if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>             
@endif
<div class="table-responsive col-lg-10 mx-3">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-success">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $user->fullname }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->is_admin?'Admin':'Pengguna' }}</td>
                  <td>
                    <a href="/managementuser/edit/{{$user->id}}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('delete.user', $user) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus akun?')">Delete</button>
                    </form>
                  </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection