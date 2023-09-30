<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $resume->nama_lengkap }}</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
    <style>
      body {
          font-family: Arial, sans-serif;
          background-color: #ffffff;
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }
        .resume-container {
          max-width: 800px;
          margin: auto;
          background-color: #ffffff;
          box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
          /* display: flex; */
        }
        .sidebar {
          float: left;
          width: 30%; /* Atur sesuai kebutuhan Anda */
          padding: 20px;
          padding-top: 0;
          box-sizing: border-box;
          background-color: #27384c;
          color: #ffffff;
          position: fixed;
          /* height: 100%; */
          text-align: center;
          bottom: 0;
          left: 0;
          top: 0;
          /* height: 100%; */
        }
        .list-unstyled {
          text-decoration: none;
          list-style: none;
          padding: 0;
          margin: 0;
        }
        .content {
          float: left;
          width: 60%; /* Atur sesuai kebutuhan Anda */
          padding: 20px;  
          padding-top: 0;
          box-sizing: border-box;
          position: absolute;
          left: 30%;
        }
        .profile-img {
          width: 100px;
          height: 100px;
          border-radius: 50%;
          object-fit: cover;
          margin-top: 10px;
          /* border: 1px solid #fff; */
        }

        @page {
            size: A4;
            margin: 0;
        }
      </style>
    </head>
    <body>
      {{-- <div class="resume-container"> --}}
        <div class="sidebar text-center">

          <img src="{{ $imageUrl }}" alt="Profile Picture" class="profile-img mb-2">
          {{-- <img src="{{ public_path('storage/' . $resume->foto) }}" alt="Profile Picture" class="profile-img mb-2"> --}}

          <h4>{{ $resume->nama_lengkap }}</h4>
          <p>{{ $resume->headline }}</p>
          <hr><br>
          <ul class="list-unstyled">
            <li><strong>Email :<br></strong>{{ $resume->email }}</li><br>
            <li><strong>No Handphone :<br></strong>{{ $resume->noHP }}</li><br>
            <li><strong>Location :<br></strong>{{ $resume->alamat }}</li>
          </ul>
        </div>
        <div class="content">
          <h2 class="border-bottom">Summary</h2>
          <p style="text-align: justify;">{{ $resume->summary }}</p>
          
          <h2 class="border-bottom">Experience</h2>
          @foreach (json_decode($resume->experience) as $experience)
          <h4 class="fs-5 mb-0">{{ $experience->posisi }} - {{ $experience->namaPerusahaan }}</h4>
          <p class="mb-1"><em>{{ $experience->durasiBekerja }}</em></p>
          <p>{{ $experience->workDesc }}</p>
              
          @endforeach
          
          <h2 class="border-bottom">Education</h2>
          @foreach (json_decode($resume->education) as $education)
          <h4 class="fs-5 mb-0">{{$education->gelar}} - {{$education->institusi}}</h4>
          <p><em>{{$education->tahun}}</em></p>
              
          @endforeach
          
          <h2 class="border-bottom">Skills</h2>
          <ul class="skills">
            @foreach (json_decode($resume->skills) as $skill)
                <li>{{$skill}}</li>
            @endforeach
          </ul>
        </div>
        {{-- <div class="clearfix"></div> --}}
      {{-- </div> --}}
    </body>
</html>
    