<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>{{ $resume->nama_lengkap }}</title>

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	{{-- <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" />  --}}
	{{-- <link rel="stylesheet" type="text/css" href="{{asset('css/resume1.css')}}" media="all" /> --}}

	<style>
	body {
    font-family: Georgia, 'Times New Roman', Times, serif;
	color: #444;
	background-color: #f5f5f5;
    margin: 0;
    padding: 0;
	box-sizing: border-box;
}

.resume {
	width: 100%;
    max-width: 720px;
    padding: 30px 40px; 
	margin: 0px auto; 
	background: #f5f5f5; 
	border: solid #666;
	border-width: 8px 0 0 0;
}

h1, h2, h3, h4 {
	color: #333;
	font-weight: normal;
}

.header {
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.nama {
    float: left;
    width: 60%;
    padding-right: 20px;
    box-sizing: border-box;
}

.nama h1 {
    margin: 0;
    font-size: 35px;
	text-transform: uppercase;
	letter-spacing: 3px;
	font-weight: normal;
}

.nama h2 {
	margin-top: 5px;
	font-size: 18px;
	text-transform: uppercase;
	letter-spacing: 1px;
	font-style: italic;
	font-weight: normal;
}

.contact-info {
    float: right;
    width: 35%;
    /* text-align: right; */
}

.contact-info h3 {
	font-size: 16px;
    margin: 0;
	font-weight: normal;
}

.content h2 {
	font-weight: normal;
	margin: 0;
	font-size: 18px;
	font-style: italic;
}
.summary,
.skills,
.education,
.experience {
	margin-bottom: 20px;
	/* padding-bottom: 20px; */
	border-bottom: 1px solid #ccc;
}

.summary-title, .skills-title, .experience-title, .education-title  {
	float: left;
	width: 20%;
}
.summary-content, .skills-content {
	float: right;
	width: 80%;
	margin-top: -15px;
}
.experience-content, .education-content {
	float: right;
	width: 80%;
}
.job {
	width: 50%;
	float: left;
}

.job p {
	font-size: 14px;
	margin-top: -5px;
}
.job h2 {
	font-style: normal;
	margin-bottom: -10px;
}
.experience-content h4 {
	width: 40%;
	float: right;
}

.job h3, .education-content h3 {
	font-size: 16px;
}

.education-content h2 {
	font-style: normal;
	margin-bottom: -10px;
}

p {
	line-height: 20px;
	text-align: justify;
}

li { 
	line-height: 5px; 
	/* border-bottom: 1px solid #ccc; */
	/* list-style: none; */
	/* float: left; */
	/* margin-right: 35px; */
	margin-bottom: 20px;
}

.skills-content ul {
	margin-left: -20px;
	
}

.clear {
	content: "";
	clear: both;
}


/* .content {
    overflow: hidden;
}


.section-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.experience-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.job {
    width: calc(33.33% - 20px);
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px;
    box-sizing: border-box;
}

.education-content h3 {
    font-size: 18px;
    margin-top: 10px;
    font-weight: bold;
} */


	@page {
		size: A4;
		margin: 0;
    }
	</style>

</head>
<body>

	<div class="resume">
		
		<div class="header">
			<div class="nama">
				<h1>{{ $resume->nama_lengkap }}</h1>
				<h2>{{ $resume->headline }}</h2>
			</div>
			<div class="contact-info">
				<h3>{{ $resume->alamat }}</h3>
				<h3>{{ $resume->email }}</></h3>
				<h3>{{ $resume->noHP }}</h3>
			</div>
			<div class="clear"></div>
		</div>

		<div class="content">

			<div class="summary">
				<div class="summary-title">
					<h2>Summary</h2>
				</div>
				<div class="summary-content">
					<p> {{ $resume->summary }} </p>
				</div>
				<div class="clear"></div>
			</div>


			<div class="skills">
				<div class="skills-title">
					<h2>Skills</h2>
				</div>
				<div class="skills-content">
					{{-- {{ $resume['skills'] = str_replace('\\',"",$resume['skills']) }} --}}
					<?php 
						$skills = json_decode($resume->skills);

					?>
					<ul>
					@foreach ($skills as $skill)
						<li>{{$skill}}</li>
					@endforeach	
					</ul>
				</div>
				<div class="clear"></div>
			</div>

			<div class="experience">

				<div class="experience-title">
					<h2>Experience</h2>
				</div>

				<div class="experience-content">
					<?php 
						$experiences = json_decode($resume->experience)

					?>

					@foreach ($experiences as $experience)
					<div class="job">
						<h2>{{ $experience->namaPerusahaan }}</h2>
						<h3>{{ $experience->posisi }}</h3>
						<p>{{ $experience->workDesc }}</p>
					</div>
					<h4>{{ $experience->durasiBekerja }}</h4>
					<div class="clear"></div>
						
					@endforeach

				</div>
				<div class="clear"></div>
			</div>


			<div class="education">
				<div class="education-title">
					<h2>Education</h2>
				</div>
				<div class="education-content">
				<?php 
					$educations = json_decode($resume->education)
				?>
					@foreach ($educations as $education)
					
					<h2>{{$education->institusi}}</h2>
					<h3>{{$education->gelar}} {{$education->tahun}}  </h3>
						
					@endforeach
				</div>
				<div class="clear"></div>
			</div>

		</div>

	</div>


</body>
</html>