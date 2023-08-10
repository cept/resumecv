@extends('layouts.main')

@section('container')
    <a class="btn btn-secondary mb-2" href="/dashboard/template" role="button"><i class="bi bi-plus-square"></i> Create new resume</a>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>             
    @endif

    @foreach ($resume as $item)
        <div class="card my-3">
            <div class="card-body">
            <h5 class="card-title">{{ $item->headline }}</h5>
            <p class="card-text">{{ $item->summary }}</p>
            <a href="/dashboard/template/{{ $item->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
            <a href="/template/{{$item->url}}" class="btn btn-sm btn-primary">View</a>
            <form action="/dashboard/template/{{ $item->id }}" method="post" class="d-inline">
                @csrf
                @method('delete')

                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus resume anda?')">Delete</button>
            </form>
            {{-- <a href="#" class="btn btn-sm btn-warning" onclick="copyurl('/template/{{$item->url}}')">Copy Url</a> --}}
            </div>
        </div>
        
    @endforeach

    @if (count($resume)<1)
        <div class="card my-3">
            <div class="card-body">
                <h1 class="text-muted"><i class="bi bi-cloud-drizzle"></i> Resume CV belum dibuat</h1>
            </div>
        </div>
    @endif
@endsection