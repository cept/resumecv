@extends('layouts.main')

@section('home')
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="hero-content col-md-6">
                <h2>Buat Resume CV Profesional Anda</h2>
                <p>Resume CV Generator membantu anda membuat resume yang mengesankan dan profesional dengan mudah. Mulailah hari ini dan dapatkan pekerjaan impian anda!</p>
                <a href="/login" class="getStarted btn btn-primary mb-3">Get Started</a>
            </div>
            <div class="row col-md-6">
                <div class="col-4">
                  <img src="{{asset('img/resume1.PNG')}}" class="card-img-top1" alt="...">
                </div>
                <div class="col-4">
                  <img src="{{asset('img/resume2.PNG')}}" class="card-img-top2" alt="...">
                </div>
                <div class="col-4">
                  <img src="{{asset('img/resume3.PNG')}}" class="card-img-top3" alt="...">
                </div>
            </div>
            
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FFF" fill-opacity="1" d="M0,128L48,154.7C96,181,192,235,288,229.3C384,224,480,160,576,165.3C672,171,768,245,864,245.3C960,245,1056,171,1152,133.3C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</section>

<section id="features" class="features">
    <div class="container">
        <h2>Features</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="feature">
                    <div class="icon"><i class="bi bi-person"></i></div>
                    <h3>Mudah Digunakan</h3>
                    <p>Buat resume yang memukau hanya dengan beberapa klik. Tidak perlu keahlian teknis.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature">
                    <div class="icon"><i class="bi bi-cloud-download"></i></div>
                    <h3>Download & Print</h3>
                    <p>Unduh resume anda dalam berbagai format dan cetak untuk pekerjaan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="about">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FFF" fill-opacity="1" d="M0,128L48,128C96,128,192,128,288,128C384,128,480,128,576,144C672,160,768,192,864,197.3C960,203,1056,181,1152,160C1248,139,1344,117,1392,106.7L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <div class="container">
        <h2>About Us</h2>
        <p>Saya berdedikasi untuk membantu para pencari kerja membuat resume cv profesional yang mengesankan. Platform yang ramah pengguna memastikan bahwa anda dapat membuat resume dengan cepat dan mudah. Bergabunglah dengan ribuan pengguna yang puas telah mendapatkan pekerjaan impian mereka dengan Resume CV Generator.</p>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FFF" fill-opacity="1" d="M0,128L48,154.7C96,181,192,235,288,229.3C384,224,480,160,576,165.3C672,171,768,245,864,245.3C960,245,1056,171,1152,133.3C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</section>

<section id="contact" class="contact">
    <div class="container">
        <h2>Contact Us</h2>
        <p>Jika anda memiliki pertanyaan atau masukan, jangan ragu untuk menghubungi kami :</p>
        <p>Email: aceprohmat04@gmail.com</p>
        <p>Phone: (123) 456-7890</p>
    </div>
</section>
    
@endsection