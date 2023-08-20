@extends('layouts.main')

@section('container')
<h1>My Account</h1>
<form class="mt-4">
    <div class="col-md-6">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" value="{{ $user->fullname }}">
    </div>
    <div class="col-md-6">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" value="{{ $user->email }}">
    </div>
    <div class="col-md-6">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password">
    </div><br>
    <div class="col-6">
      <button type="submit" class="btn btn-primary">Update Account</button>
    </div>
  </form>
@endsection