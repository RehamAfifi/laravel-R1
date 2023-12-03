<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add News Form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{ asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet"  href="{{ asset('css/style.css') }}">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<form action="{{url('storenews')}}" method="POST" enctype="multipart/form-data">
                    @csrf
					<h3>Add News </h3>
					<label class="form-group">
						<input type="text" class="form-control" name="auther"  required>
						<span>Auther Name </span>
						@error('auther')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror()
						<span class="border"></span>
					</label>
					<label class="form-group">
						<input type="text" class="form-control" name="title" required>
						<span for="">Your Title</span>
						<span class="border"></span>
					</label>
					<label class="form-group" >
						<textarea name="content" id="" class="form-control" required></textarea>
						<span for="">content</span>
						<span class="border"></span>
					</label>
                    <label class="form-group" >
						<input type="checkbox" name="published" id="" class="form-control" >
						<div><span for="">published</span></div>
						<span class="border"></span>
					</label>
					<button type="submit">Add News<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>