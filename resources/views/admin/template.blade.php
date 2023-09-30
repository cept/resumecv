@extends('admin.index')

@section('content')
<h2 class="fs-4 mx-3">Templates</h2>
<a class="btn btn-secondary mb-2 mx-3" href="{{route('templates.create')}}" role="button"><i class="bi bi-plus-square"></i> Tambah Template Baru</a>

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
            <th scope="col">Nama Template</th>
            <th scope="col">Keterangan Template</th>
            <th scope="col">Foto Template</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($templates as $template)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $template->nama_template }}</td>
                  <td>{{ $template->keterangan_template }}</td>
                  <td><img src="{{ asset('storage/' . $template->foto_template) }}" alt="foto template" width="200px"></td>
                  <td>
                    <a href="{{ route('templates.edit', $template->id) }} " class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('templates.destroy', $template) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus template?')">Delete</button>
                    </form>
                  </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $templates->links() }}
    </div>
@endsection