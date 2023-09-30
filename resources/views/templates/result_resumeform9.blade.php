<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <style>
        /* Gaya umum */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F2F2F2;
            box-sizing: border-box;
        }
        
        h1, h3 {
            color: #253d58;
        }
        /* Sidebar style */
        .sidebar {
            float: left;
            width: 30%; /* Atur sesuai kebutuhan Anda */
            padding: 20px;
            padding-top: 0;
            box-sizing: border-box;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid #253d58;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .contact-info {
            margin-bottom: 20px;
        }

        .contact-info-title {
            font-weight: bold;
            margin-top: 20px;
        }
        
        /* Content style */
        .content {
            float: left;
            width: 60%; /* Atur sesuai kebutuhan Anda */
            padding: 20px;  
            padding-top: 0;
            box-sizing: border-box;
        }
        .section-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
            border-bottom: 1px solid #253d58;
            padding-bottom: 3px;
        }
        ul {
            padding-left: 20px;
        }
        
        /* Clearfix */
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
        
        /* Gaya untuk kotak header dan footer */
        .kotakColor {
            background-color: #376092;
        }
        .kotakHeader {
            /* margin-left: -50px; */
            width: 290px;
            height: 60px;
        }
        .kotakFooter {
            margin-left: 290px;
            /* margin-bottom: -50px; */
            width: 100%;
            height: 60px;
            position: fixed;
            bottom: 0;
        }

        @page {
            size: A4;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="kotakHeader kotakColor"></div>
    <div class="sidebar">
        <h1>{{ $resume->nama_lengkap }}</h1>
        <img src="{{ $imageUrl }}" alt="Profile Picture" class="profile-img">
        <div class="contact-info">
            <h3 class="section-title">Kontak</h3>
            <p class="contact-info-title">Alamat:</p>
            <p>{{ $resume->alamat }}</p>
            <p class="contact-info-title">NO HP:</p>
            <p>{{ $resume->noHP }}</p>
            <p class="contact-info-title">Email:</p>
            <p>{{ $resume->email }}</p>
        </div>
    </div>
    <div class="content">
        <h3 class="section-title">Ringkasan</h3>
        <p style="text-align: justify;">{{ $resume->summary }}</p>
        
        <h3 class="section-title">Keahlian</h3>
        <ul>
            @foreach (json_decode($resume->skills) as $skill)
            <li>{{$skill}}</li>
            @endforeach
            <!-- Daftar skill lainnya -->
        </ul>
        
        <h3 class="section-title">Pengalaman</h3>
        @foreach (json_decode($resume->experience) as $experience)
        <p><strong>{{ $experience->posisi }} - {{ $experience->namaPerusahaan }}</strong><br>
        <p>{{ $experience->durasiBekerja }}</p>
        <p>{{ $experience->workDesc }}</p>
              
        @endforeach
        
        <h3 class="section-title">Pendidikan</h3>
        @foreach (json_decode($resume->education) as $education)
        <p><strong>{{$education->gelar}} - {{$education->institusi}}</strong><br>
        <p>{{$education->tahun}}</p>
              
        @endforeach
        
        
        {{-- <h3 class="section-title">Sertifikasi</h3>
        <p><strong>Degree - University Name</strong><br>
        Year<br>
        Additional details...</p>
        <p><strong>Degree - University Name</strong><br>
        Year<br>
        Additional details...</p>
        <p><strong>Degree - University Name</strong><br>
        Year<br>
        Additional details...</p> --}}
    </div>
    <div class="clearfix"></div>
    <div class="kotakFooter kotakColor"></div>
</body>
</html>