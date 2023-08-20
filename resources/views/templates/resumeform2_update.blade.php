@extends('layouts.main')

@section('container')
<a class="btn btn-primary mb-2" href="/dashboard" role="button"><i class="bi bi-arrow-left-circle"></i> Back</a>
<h3>Perbarui resume 2 anda</h3>
<form method="POST" action="/dashboard/template/{{$resume->id}}" class="border border-2 rounded-2 p-2" enctype="multipart/form-data">
  @csrf
  @method('put')
  <p><i class="bi bi-person-circle"></i> Personal Details</p>
  <div class="row justify-content-between">
    <div class="col-xl-6 mb-3">
      <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
      <div>
        <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama" placeholder="Nama Lengkap" value="{{ old('nama_lengkap', $resume->nama_lengkap) }}">
        @error('nama_lengkap')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>
    </div>
    <div class="col-xl-6 mb-3">
      <label for="headline" class="col-sm-2 col-form-label">CV HEADLINE</label>
      <div>
        <input type="text" name="headline" class="form-control @error('headline') is-invalid @enderror" id="headline" placeholder="Web Developer" value="{{ old('headline', $resume->headline) }}">
        @error('headline')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>
    </div>
  </div>
  <div class="mb-3">
    <label for="summary" name="summary" class="col-sm-2 col-form-label">SUMMARY</label>
    <div>
      <textarea name="summary" id="summary" class="form-control w-100 @error('summary') is-invalid @enderror" placeholder="tuliskan deskripsi singkat pengalaman atau kemampuan anda">{{ old('summary', $resume->summary) }}</textarea>
      @error('summary')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
  </div>
    <hr>
    <p><i class="bi bi-person-lines-fill"></i> Contact Details</p>
    <div class="row justify-content-between">
      <div class="col-xl-6 mb-3">
        <label for="email" class="col-sm-2 col-form-label">EMAIL</label>
        <div class="">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="example@gmail.com" value="{{ old('email', $resume->email) }}">
          @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
      </div>
      <div class="col-xl-6 mb-3">
        <label for="nohp" class="col-sm-2 col-form-label">NO HP</label>
        <div class="">
          <input type="text" name="noHP" class="form-control @error('noHP') is-invalid @enderror" id="nohp" placeholder="+6288122331" value="{{ old('noHP', $resume->noHP) }}">
          @error('noHP')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
      </div>
    </div>
    <div class="mb-3">
      <label for="alamat" class="col-sm-2 col-form-label">ALAMAT</label>
      <div>
        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Bandung, Indonesia" value="{{ old('alamat', $resume->alamat) }}">
        @error('alamat')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>
    </div>
    <hr>
    <div class="col-md-6 mb-3">
      <label for="skills" class="col-sm-2 col-form-label"><i class="bi bi-tools"></i> SKILLS</label>
      <div id="skills">
        {{-- @dd($skills) --}}
        @if ($skills)
        @foreach ($skills as $skill)
    
        <span class="badge text-bg-success p-1 m-1">{{ $skill }} <input type='hidden' name='skill[]' value='{{$skill}}'/><span class="text-black removeskill" onclick="removeList(this)">X</span></span>
            
        @endforeach
        @endif
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control @error('skill') is-invalid @enderror" id="userskill" placeholder="masukkan skill" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-primary" type="button" id="addskill">Add</button>
      </div>
    </div>
    <hr>
    <div class="mb-3">
      <label for="education" class="col-sm-2 col-form-label"><i class="bi bi-book-half"></i> EDUCATION</label>
      <div id="educations">
        @foreach ($educations as $edu)
        <div class="d-inline-block border rounded p-2 m-2">
          <input type='hidden' name='institusi[]' value='{{$edu->institusi}}'/>
          <input type='hidden' name='gelar[]' value='{{$edu->gelar}}'/>
          <input type='hidden' name='tahun[]' value='{{$edu->tahun}}'/>
          <h4>{{$edu->institusi}}</h4>
          <p>{{$edu->gelar}} ({{$edu->tahun}})</p>
          <button class="btn btn-sm btn-danger" type="button" onclick="removeList(this)">Remove</button>
        </div>
            
        @endforeach
      </div>
      <div class="d-flex flex-wrap flex-md-nowrap gap-2">
        <input type="text" class="form-control @error('institusi') is-invalid @enderror" id="institusi" placeholder="nama institusi/kampus">
        <input type="text" class="form-control @error('gelar') is-invalid @enderror" id="gelar" placeholder="jenis gelar dan jurusan">
        <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" placeholder="awal tahun - akhir tahun">
        <button class="btn btn-primary" type="button" id="addEducation">Add</button>
      </div>
    </div>
    <hr>
    <div class="mb-3">
      <label for="experience" class="col-sm-2 col-form-label"><i class="bi bi-briefcase-fill"></i> EXPERIENCE</label>
      <div id="experiences">
        @foreach ($experiences as $experience)
        <div class="d-inline-block border rounded p-2 m-2">
          <input type='hidden' name='namaPerusahaan[]' value='{{$experience->namaPerusahaan}}'/>
          <input type='hidden' name='posisi[]' value='{{$experience->posisi}}'/>
          <input type='hidden' name='durasiBekerja[]' value='{{$experience->durasiBekerja}}'/>
          <textarea class="d-none" name='workDesc[]'>{{$experience->workDesc}}</textarea>
          <h4>{{$experience->namaPerusahaan}}</h4>
          <p>{{$experience->posisi}} ({{$experience->durasiBekerja}})</p>
          <p>{{$experience->workDesc}}</p>
          <button class="btn btn-sm btn-danger" type="button" onclick="removeList(this)">Remove</button>
        </div>
            
        @endforeach
      </div>
      <div class="d-flex flex-wrap flex-md-nowrap gap-2">
        <input type="text" class="form-control @error('namaPerusahaan') is-invalid @enderror" id="perusahaan" placeholder="nama perusahaan">
        <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi" placeholder="posisi pekerjaan">
        <input type="text" class="form-control @error('durasiBekerja') is-invalid @enderror" id="durasiBekerja" placeholder="bulan & tahun - bulan & tahun">
      </div>
      <textarea id="work_desc" class="form-control my-2 w-100" placeholder="tuliskan deskripsi pekerjaan anda"></textarea>
      <button class="btn btn-primary" type="button" id="addExperience">Add</button>
    </div>
    <button type="submit" class="btn btn-primary"><i class="bi bi-box2"></i> Update Resume</button>
</form>
@endsection
