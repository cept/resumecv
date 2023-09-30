<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume CV Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    <style>
        /* Navbar */
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .navbar {
            background-color: #e3f2fd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 2;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        /* Sidebar */
        .sidebar {
            background-color: #f6fbff;
            width: 250px;
            transition: width 0.3s ease;
            height: 100vh;
            position: fixed;
            top: 60px;
            left: 0;
            padding-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .sidebar-expanded {
            width: 60px;
        }

        .sidebar-content-expanded {
            display: none;
        }

        .menu-item {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .menu-item:hover {
            background-color: #cbe8ff;
        }

        .menu-item a {
            cursor: pointer; 
            color: black;
            text-decoration: none; 
            transition: color 0.3s;
        }

        .menu-item a.active {
            font-weight: bold;
        }

        .menu-item a:hover {
            color: #333;
        }

        .content {
            margin-left: 250px;
            margin-top: 60px;
            padding: 20px;
            position: relative;
        }

        /* .sidebar-active {
            transform: translateX(0);
        } */

        .content-active {
            margin-left: 50px;
        }

        /* @media (max-width: 767px) {
            .sidebar-active {
                transform: translateX(-100%);
            }

            .content-active {
                margin-left: 0;
            }
        } */
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-medium" href="/">Resume CV Generator</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, {{ auth()->user()->fullname }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="\dashboardadmin"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar sidebar-active">
                <button id="sidebar-toggle" class="btn btn-sm btn-info"><i class="bi bi-box-arrow-in-right"></i></button>
                <div id="sidebar-content">
                    <div class="menu-item">
                        <a href="/dashboardadmin" class="{{ Request::is('dashboardadmin')?'active':'' }}">Dashboard</a>
                    </div>
                    <div class="menu-item">
                        <a href="/managementuser" class="{{ Request::is('managementuser')?'active':'' }}">Management User</a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('templates.index') }}" class="{{ Route::is('templates.index') ? 'active' : '' }}">Templates</a>
                    </div>                    
                    <div class="menu-item">
                        <a href="/dashboard">Buat Resume CV</a>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-10 content" id="content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
    <script>
        const sidebar = document.querySelector('.sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarContent = document.getElementById('sidebar-content');
        const content = document.getElementById('content');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-expanded');
            sidebarContent.classList.toggle('sidebar-content-expanded');
            content.classList.toggle('content-active');
        });
    </script>
    </body>
</html>
