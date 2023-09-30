@extends('layouts.main')

@section('container')
<h1>My Account</h1>
@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>             
@endif
@if(session()->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>             
@endif
<form method="POST" action="{{ route('profile.update') }}" class="mt-4" enctype="multipart/form-data">
  @csrf
  @method('put')
    <div class="col-md-6">
      <label for="user_id" class="form-label">User ID</label>
      <input type="text" name="user_id" class="form-control" id="user_id" value="{{$user->user_id}}" readonly>
    </div><br>
    <div class="col-md-6">
        <label for="name" class="form-label">Nama</label>
        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="name" value="{{ old('fullname', $user->fullname) }}">
        @error('fullname')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div><br>
    <div class="col-md-6">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $user->email) }}">
      @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
    </div><br>
    <div class="col-md-6">
      <label for="passwordlama" class="form-label">Password Lama</label>
      <input type="password" name="passwordlama" class="form-control @error('passwordlama') is-invalid @enderror" id="passwordlama">
      @error('passwordlama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
    </div><br>
    <div class="col-md-6">
      <label for="passwordbaru" class="form-label">Password Baru</label>
      <input type="password" name="passwordbaru" class="form-control @error('passwordbaru') is-invalid @enderror" id="passwordbaru">
      @error('passwordbaru')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
    </div><br>
    <div class="col-6">
      <button type="submit" class="btn btn-primary">Update Account</button>
    </div>
  </form>
@endsection