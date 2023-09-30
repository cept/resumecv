@extends('admin.index')

@section('content')
<h1>Update Template</h1>

<form method="POST" action="{{ route('templates.update', ['template' => $template->id]) }}" class="mt-4" enctype="multipart/form-data">
    @csrf
    @method('put')
      <div class="col-md-6 mb-3">
          <label for="name" class="form-label fw-semibold">Nama Template</label>
          <input type="text" name="nama_template" class="form-control @error('nama_template') is-invalid @enderror" id="name" value="{{ old('nama_template', $template->nama_template) }}">
          @error('nama_template')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label for="keterangan_template" class="form-label fw-semibold">Keterangan Template</label>
        <input type="text" name="keterangan_template" class="form-control @error('keterangan_template') is-invalid @enderror" id="keterangan_template" value="{{ old('keterangan_template', $template->keterangan_template) }}">
        @error('keterangan_template')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label for="foto" class="form-label fw-semibold">Foto Template</label>
        <input type="file" name="foto_template" class="form-control @error('foto_template') is-invalid @enderror" id="foto">
        @error('foto_template')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        @if ($template->foto_template)
            <img src="{{ asset('storage/' . $template->foto_template) }}" alt="Foto Profil" class="mt-2" style="max-width: 100px">
        @endif
      </div>
      {{-- <div class="col-md-6 mb-3">
          <label for="foto" class="form-label fw-semibold">Pilih form yang tersedia di template :</label>
          <div class="form-check">
              <input class="form-check-input" name="nama" type="checkbox" value="" id="nama">
              <label class="form-check-label" for="nama">Nama</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="headline" type="checkbox" value="" id="cvheadline">
                <label class="form-check-label" for="cvheadline">CV Headline</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="summary" type="checkbox" value="" id="summary">
                <label class="form-check-label" for="summary">Summary</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="foto" type="checkbox" value="" id="foto">
                <label class="form-check-label" for="foto">Foto</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="contact" type="checkbox" value="" id="contact">
                <label class="form-check-label" for="contact">Contact</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="skills" type="checkbox" value="" id="skills">
                <label class="form-check-label" for="skills">Skills</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="experiences" type="checkbox" value="" id="experiences">
                <label class="form-check-label" for="experiences">Experiences</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="educations" type="checkbox" value="" id="educations">
                <label class="form-check-label" for="educations">Educations</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="certifications" type="checkbox" value="" id="certifications">
                <label class="form-check-label" for="certifications">Certifications</label>
            </div>
        </div> --}}

        <div class="col-md-8 mb-4">
          <label for="foto" class="form-label fw-semibold">Kode Design HTML & CSS</label>
          <ul>
            <li>Gunakan HTML & CSS Internal</li>
            <li>Template di konversi ke dompdf gunakan css 2.1 gunakan float/table layout</li>
            <li>Tidak support flexbox/grid layout</li>
            <li>Nilai nama diisi : @{{$resume->nama_lengkap}}</li>
            <li>Nilai cv headline diisi : @{{$resume->headline}}</li>
            <li>Nilai alamat diisi : @{{$resume->alamat}}</li>
            <li>Nilai email diisi : @{{$resume->email}}</li>
            <li>Nilai no HP diisi : @{{$resume->noHP}}</li>
            <li>Nilai summary/ringkasan diisi : @{{$resume->summary}}</li>
            <li>Nilai skills diisi :<br>
            @verbatim
            @foreach (json_decode($resume->skills) as $skill) <br>
                &lt;li&gt;{{$skill}}&lt;/li&gt; <br>

            @endforeach
            @endverbatim
            </li>
            <li>Nilai experiences diisi :<br>
            @verbatim
            @foreach (json_decode($resume->experience) as $experience) <br>
            &lt;h4&gt;{{ $experience->posisi }} - {{ $experience->namaPerusahaan }}&lt;/h4&gt; <br>
            &lt;p&gt;{{ $experience->durasiBekerja }}&lt;/p&gt; <br>
            &lt;p&gt;{{ $experience->workDesc }}&lt;/p&gt; <br>
              
            @endforeach
            @endverbatim
            </li>
            <li>Nilai educations diisi :<br>
            @verbatim
            @foreach (json_decode($resume->education) as $education) <br>
            &lt;h4&gt;{{$education->gelar}} - {{$education->institusi}}&lt;/h4&gt; <br>
            &lt;p&gt;{{$education->tahun}}&lt;/p&gt; <br>
                
            @endforeach
            @endverbatim
            </li>
            <li>Nilai img src diisi : @{{$imageUrl}}</li>
          </ul>
          <textarea class="form-control @error('design_html_css') is-invalid @enderror" id="design_html_css" name="design_html_css" rows="20">{{ old('design_html_css', $template->design_html_css) }}</textarea>
          @error('design_html_css')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
        </div>
        
      <div class="col-6">
        <button type="submit" class="btn btn-primary">Update Template</button>
      </div>
</form>
    
@endsection