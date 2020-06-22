<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f717478b5d.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Atomic+Age|Eagle+Lake|Fjalla+One|Merriweather|Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
		<a href="/" class="navbar-brand">
			<h2 class="some">Dashboard</h2>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsenav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
					<a href="{{URL::to('/')}}" class="nav-link ">Home</a>
                </li>
                <li class="nav-item">
					<a href="{{URL::to('upload')}}" class="nav-link ">Upload</a>
                </li>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="forum" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Forum
                    </a>
                    <div class="dropdown-menu" aria-labelledby="forum">
                    <a class="dropdown-item" href="{{route('forum')}}">Create New Topic</a>
                    <a class="dropdown-item" href="#">My Posts</a>
                    <a class="dropdown-item" href="{{route('allForum')}}">All Post</a>
                    </div>
                </li>
				<li class="nav-item">
					<a href="{{route('contact')}}" class="nav-link">Contract Us</a>
				</li>
            </ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->fullname }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                         <a href="{{route('user.profile')}}" class="dropdown-item">View Profile</a>
                        <a href="#" class="dropdown-item">Update Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
				</li>
			</ul>
		</div>
    </nav>
    <div class="container-fluid">
	@yield('main-content')
	</div>
<footer class="bg-dark text-white mt-4 fixed-bottom">
    <div class="row text-center">
        <div class="col-md-12 mt-3 mb-3">©2020 Joy2362 Allright Received version 2.0</div>
    </div>
</footer>
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
@if(Session::has('messege')){
    swal("{{Session::get('alart-type')}}!!!", "{{Session::get('messege')}}", "{{Session::get('alart-type')}}");
}
@endif
</script>
</html>
