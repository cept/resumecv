<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $resume->nama_lengkap }}</title>
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/resume2.css')}}" media="all" /> --}}
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #ffffff;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-size: 16px;
    }

    .resume {
        width: 100%;
        max-width: 700px;
        margin: auto;
        background-color: #fff;
        /* padding: 40px; */
        /* padding: 50px 20px; */
        /* border-radius: 5px; */
        /* box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); */
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header h1 {
        margin: 0;
        font-size: 22px;
        text-transform: uppercase;
    }

    .header .headline {
        margin: 5px 0;
        font-size: 22px;
        font-weight: bold;
        text-transform: capitalize;
    }

    .section {
        margin-bottom: 30px;
    }

    .section h2 {
        margin: 0;
        font-size: 20px;
        text-transform: uppercase;
        border-bottom: 1px solid #565656;
        padding-bottom: 5px;
    }

    .experience .perusahaan, .kampus {
        font-size: 17px;
        font-weight: bold;
    }

    .experience .posisi, .jurusan {
        margin-top: -12px;
    }
    
    @page {
        size: A4;
        margin: 50px;
    }
    </style>
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
            <p style="text-align: justify;">{{ $resume->summary }}</p>
        </div>   
        <div class="section">
            <h2>Pengalaman</h2>
            <div class="experience">
                @foreach (json_decode($resume->experience) as $experience)
                <p class="perusahaan">{{ $experience->namaPerusahaan }}</p>
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