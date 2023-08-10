@extends('layouts.main')

@section('container')
<h1>Pilih template favorit anda</h1>
<div class="d-flex flex-wrap">
    <div class="card m-2" style="width: 18rem;">
        <img src="{{asset('img/resume1.PNG')}}" class="card-img-top" alt="template1">
        <div class="card-body">
        <a href="/dashboard/template/create" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">CV simple dan professional gratis</a>
        </div>
    </div>
    <div class="card m-2" style="width: 18rem;">
        <img src="{{asset('img/resume1.PNG')}}" class="card-img-top" alt="template1">
        <div class="card-body">
        <a href="/dashboard/template/1" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">CV simple dan professional gratis</a>
        </div>
    </div>
    <div class="card m-2" style="width: 18rem;">
        <img src="{{asset('img/resume1.PNG')}}" class="card-img-top" alt="template1">
        <div class="card-body">
        <a href="/dashboard/template/1" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">CV simple dan professional gratis</a>
        </div>
    </div>
    <div class="card m-2" style="width: 18rem;">
        <img src="{{asset('img/resume1.PNG')}}" class="card-img-top" alt="template1">
        <div class="card-body">
        <a href="/dashboard/template/1" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">CV simple dan professional gratis</a>
        </div>
    </div>
</div>
@endsection