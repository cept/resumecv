<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>{{ $resume->nama_lengkap }} | {{ $resume->headline }} | {{ $resume->email }}</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="{{asset('css/resume1.css')}}" media="all" />

</head>
<body>

<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1>{{ $resume->nama_lengkap }}</h1>
					<h2>{{ $resume->headline }}</h2>
				</div>

				<div class="yui-u">
					<div class="contact-info">
						<h3>{{ $resume->alamat }}</h3>
						<h3><a href="mailto:{{ $resume->email }}">{{ $resume->email }}</a></h3>
						<h3>{{ $resume->noHP }}</h3>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Summary</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge">
								{{ $resume->summary }}
							</p>
						</div>
					</div><!--// .yui-gf -->


					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Skills</h2>
						</div>
						<div class="yui-u">
							{{-- {{ $resume['skills'] = str_replace('\\',"",$resume['skills']) }} --}}
							<?php 
								$skills = json_decode($resume->skills)

							?>
				
							@foreach ($skills as $skill)
							<ul class="talent">
								<li>{{$skill}}</li>
							</ul>
								
							@endforeach
						</div>
					</div><!--// .yui-gf-->

					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Experience</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">
							<?php 
								$experiences = json_decode($resume->experience)

							?>

							@foreach ($experiences as $experience)
							<div class="job">
								<h2>{{ $experience->namaPerusahaan }}</h2>
								<h3>{{ $experience->posisi }}</h3>
								<h4>{{ $experience->durasiBekerja }}</h4>
								<p>{{ $experience->workDesc }}</p>
							</div>
								
							@endforeach

						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->


					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Education</h2>
						</div>
						<?php 
							$educations = json_decode($resume->education)
						?>
						@foreach ($educations as $education)
						<div class="yui-u" style="padding: 5px 0 10px 0; border-bottom: 1px solid #ccc">
							
							<h2>{{$education->institusi}}</h2>
							<h3>{{$education->gelar}} &mdash; ({{$education->tahun}})  </h3>
								
						</div>
						@endforeach
					</div><!--// .yui-gf -->


				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		<div id="ft">
			<p>{{ $resume->nama_lengkap }} &mdash; <a href="mailto:{{ $resume->email }}">{{ $resume->email }}</a> &mdash; {{ $resume->noHP }}</p>
		</div><!--// footer -->

	</div><!-- // inner -->


</div><!--// doc -->


</body>
</html>

