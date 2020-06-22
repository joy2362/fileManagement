<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif|Simonetta|Yanone+Kaffeesatz&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('css/signup_in.css')}}">
</head>
<body style="background-image: url({{URL::to("img/img1.jpg")}} );">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 @yield('css_class')">
				<h2 class="text-center title">@yield('header')</h2>
                @yield('content')
                </div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<script src="https://kit.fontawesome.com/f717478b5d.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    @if (session('status'))
    swal("Success!!!", " {{ session('status') }}", "success");
    @endif
    @if (session('resent'))
        swal("Success!!!", " {{ __('A fresh verification link has been sent to your email address.') }}", "success");
    @endif
</script>
</html>

