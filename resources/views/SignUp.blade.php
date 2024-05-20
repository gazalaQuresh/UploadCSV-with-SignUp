<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Slide Navbar</title>
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			font-family: 'Jost', sans-serif;
			background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
		}

		.main {
			width: 350px;
			height: 500px;
			background: red;
			overflow: hidden;
			border-radius: 10px;
			box-shadow: 5px 20px 50px #000;
			background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
		}

		.signup {
			position: relative;
			width: 100%;
			height: 100%;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			text-align: center;
			color: #fff;
			padding: 20px;
		}

		label {
			font-size: 2.3em;
			font-weight: bold;
			cursor: pointer;
			transition: .5s ease-in-out;
			margin-bottom: 30px;
		}

		input,
		button {
			width: 100%;
			margin-bottom: 10px;
		}

		.btn-getstarted {
			color: #fff;
			text-decoration: none;
			margin-top: 20px;
			font-size: 1em;
			transition: color .2s ease-in;
		}

		.btn-getstarted:hover {
			color: #ddd;
		}
	</style>
</head>

<body>
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true" hidden>

		<div class="signup">
			<!-- Error Messages -->
			@if ($errors->any())
			<div class="alert alert-danger" role="alert">
				<ul class="mb-0">
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<!-- Success Message -->
			@if(session('status'))
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
			@endif

			<form action="{{ route('signup-post') }}" method="POST">
				@csrf
				<label for="chk" aria-hidden="true">Sign up</label>


				<input type="text" class="form-control" name="name" placeholder="User name" required="">


				<input type="email" class="form-control" name="email" placeholder="Email" required="">


				<input type="number" class="form-control" name="number" placeholder="Number" required="">


				<input type="password" class="form-control" name="password" placeholder="Password" required="">

				<button type="submit" class="btn btn-primary btn-block">Sign up</button>
			</form>

			<a class="btn-getstarted" href="{{ route('Login') }}">or Sign In</a>
		</div>

		<!-- Login Form -->
		<!-- <div class="login">
            <form action="{{ route('login-post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div> -->
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>