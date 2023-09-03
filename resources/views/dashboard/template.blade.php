@extends('layouts.main')

@section('container')
<a class="btn btn-primary mb-2" href="/dashboard" role="button"><i class="bi bi-arrow-left-circle"></i> Back</a>
<h1>Pilih Template Favorit Anda</h1>
<div class="d-flex flex-wrap">
    <div class="card m-2" style="width: 18rem;">
        <img src="{{asset('img/resume1.PNG')}}" class="card-img-top" alt="template1">
        <div class="card-body">
        <a href="{{ route('template.create', ['template' => 'resumeform1']) }}" class="link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">CV simple dan professional</a>
        <p class="card-text mt-2">Template CV dengan tampilan minimalis cocok digunakan untuk melamar pekerjaan, magang ataupun beasiswa</p>
        </div>
    </div>
    <div class="card m-2" style="width: 18rem;">
        <img src="{{asset('img/resume2.PNG')}}" class="card-img-top" alt="template2">
        <div class="card-body">
        <a href="{{ route('template.create', ['template' => 'resumeform2']) }}" class="link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">CV ATS Friendly gratis</a>
        <p class="card-text mt-2">Template CV dengan ATS Friendly cocok digunakan untuk profesional melamar pekerjaan ke perusahaan yang menerapakan sistem ATS.</p>
        </div>
    </div>
    <div class="card m-2" style="width: 18rem;">
        <img src="{{asset('img/resume3.PNG')}}" class="card-img-top" alt="template1">
        <div class="card-body">
        <a href="{{ route('template.create', ['template' => 'resumeform3']) }}" class="link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">CV sidebar dan professional gratis</a>
        <p class="card-text mt-2">Template CV berwarna yang cocok untuk membuat CV SMA, CV magang ataupun CV mahasiswa.</p>
        </div>
    </div>
    <div class="card m-2" style="width: 18rem;">
        <img src="{{asset('img/resume4.PNG')}}" class="card-img-top" alt="template1">
        <div class="card-body">
        <a href="{{ route('template.create', ['template' => 'resumeform4']) }}" class="link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">CV simple, minimalis dan professional gratis</a>
        <p class="card-text mt-2">Template CV dengan desain sederhana tapi berwarna dan enak dipandang cocok untuk melamar pekerjaan, magang ataupun beasiswa</p>
        </div>
    </div>
</div>
@endsection