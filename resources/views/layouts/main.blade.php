<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume CV Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <style>
      
      .removeskill {
        cursor: pointer;
      }

      .removeskill:hover{
        opacity: 0.7;
      }

    </style>
  </head>
  <body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top" style="background-color: #5C8374;">
      <div class="container">
        <a class="navbar-brand fw-medium" href="/">Resume CV Generator</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/')?'active':'' }}" aria-current="page" href="/">Home</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, {{ auth()->user()->fullname }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ auth()->user()->is_admin?'\dashboardadmin':'\dashboard' }}"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                <li><a class="dropdown-item" href="\profile"><i class="bi bi-person-gear"></i> My Profile</a></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
                  </form>
                </li>
              </ul>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/login')?'active':'' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i>Login</a>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>

    {{-- body --}}
    <div class="container-fluid">
      <div class="row">
        @yield('sidebar')
    
      </div>
    </div>

    <div class="container-fluid p-0">
      @yield('home')
    </div>

    <div class="container mt-4 pt-5">
        @yield('container')
        

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
      $("#addskill").click(function(){
        let skill = $('#userskill').val();

        $("#skills").append(`<span class="badge text-bg-success p-1 m-1">${skill} <input type='hidden' name='skill[]' value='${skill}'/><span class="text-black removeskill" onclick="removeList(this)">X</span></span>`)
        $('#userskill').val('');
      });

      $("#addEducation").click(function(){
        let institusi = $('#institusi').val();
        let gelar = $('#gelar').val();
        let tahun = $('#tahun').val();

        $("#educations").append(`<div class="d-inline-block border rounded p-2 m-2">
          <input type='hidden' name='institusi[]' value='${institusi}'/>
          <input type='hidden' name='gelar[]' value='${gelar}'/>
          <input type='hidden' name='tahun[]' value='${tahun}'/>
          <h4>${institusi}</h4>
          <p>${gelar} (${tahun})</p>
          <button class="btn btn-sm btn-danger" type="button" onclick="removeList(this)">Remove</button>
        </div>`)
        $('#institusi').val('');
        $('#gelar').val('');
        $('#tahun').val('');
      });

      $("#addExperience").click(function(){
        let namaPerusahaan = $('#perusahaan').val();
        let posisi = $('#posisi').val();
        let durasiBekerja = $('#durasiBekerja').val();
        let workDesc = $('#work_desc').val();

        $("#experiences").append(`<div class="d-inline-block border rounded p-2 m-2">
          <input type='hidden' name='namaPerusahaan[]' value='${namaPerusahaan}'/>
          <input type='hidden' name='posisi[]' value='${posisi}'/>
          <input type='hidden' name='durasiBekerja[]' value='${durasiBekerja}'/>
          <textarea class="d-none" name='workDesc[]'>${workDesc}</textarea>
          <h4>${namaPerusahaan}</h4>
          <p>${posisi} (${durasiBekerja})</p>
          <p>${workDesc}</p>
          <button class="btn btn-sm btn-danger" type="button" onclick="removeList(this)">Remove</button>
        </div>`)
        $('#perusahaan').val('');
        $('#posisi').val('');
        $('#durasiBekerja').val('');
        $('#work_desc').val('');
      });

      function removeList(event){
        $(event).parent().remove();
      }
    </script>
  </body>
</html>