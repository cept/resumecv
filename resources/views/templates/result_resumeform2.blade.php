<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $resume->nama_lengkap }}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/resume2.css')}}" media="all" />
</head>
<body>
    <div class="resume">
        <div class="header">
            <h1>{{ $resume->nama_lengkap }}</h1>
            <p class="headline">{{ $resume->headline }}</p>
            <p class="contact">{{ $resume->alamat }} | {{ $resume->noHP }} | {{ $resume->email }}</p>
        </div>
        <div class="section">
            <h2>Ringkasan</h2>
            <p>{{ $resume->summary }}</p>
        </div>   
        <div class="section">
            <h2>Pengalaman</h2>
            <div class="experience">
                @foreach (json_decode($resume->experience) as $experience)
                <p class="perusahaan">{{ $experience->namaPerusahaan }} - manual Bandung, Indonesia</p>
                <p class="posisi">{{ $experience->posisi }} ({{ $experience->durasiBekerja }})</p>
                <p>{{ $experience->workDesc }}</p>
                    
                @endforeach
            </div>
        </div>
        <div class="section">
            <h2>Pendidikan</h2>
            <div class="education">
                @foreach (json_decode($resume->education) as $education)
                <p class="kampus">{{$education->institusi}} ({{$education->tahun}})</p>
                <p class="jurusan">{{$education->gelar}}</p>
                    
                @endforeach

            </div>
        </div>
        <div class="section">
            <h2>Kemampuan</h2>
            <ul class="skills">
                @foreach (json_decode($resume->skills) as $skill)
                    <li>{{$skill}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>