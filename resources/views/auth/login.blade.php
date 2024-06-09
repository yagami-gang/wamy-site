<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Latform - Login and Register Form Templates</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('dist/vendor/bootstrap-4.5.3/css/bootstrap.min.css')}}" type="text/css">
    <!-- Material design icons -->
    <link rel="stylesheet" href="{{asset('dist/icons/material-design-icons/css/mdi.min.css')}}" type="text/css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <!-- Latform styles -->
    <link rel="stylesheet" href="{{asset('dist/css/latform-style-6.min.css')}}" type="text/css">
</head>
<body>
<div class="form-shape-wrapper">
    <div class="form-shape">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 185.4">
            <path fill="red" d="M3000,0v185.4H0V0c496.4,115.6,996.4,173.4,1500,173.4S2503.6,115.6,3000,0z"></path>
        </svg>
    </div>
</div>
<div class="form-wrapper">
    <div class="container">
        <div class="card">
            <div class="row no-gutters">
                <div class="col d-none d-lg-flex" style="background: url({{asset('dist/images/cover1.jpg')}})">
                    <div class="logo">
                        <img src="{{asset('dist/images/logo-colorful.png')}}" alt="logo">
                    </div>
                    <div>
                        <h3 class="font-weight-bold">Welcome to Latform!</h3>
                        <p class="lead my-5">If you don't have an account, would you like to register right now?</p>
                        <a href="sign-up.html" class="btn btn-outline-primary 2btn-lg">Sign Up</a>
                    </div>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="logo d-block d-lg-none text-center text-lg-left">
                                <img src="{{asset('dist/images/logo-colorful.png')}}" alt="logo">
                            </div>
                            <div class="my-5 text-center text-lg-left">
                                <h3 class="font-weight-bold">Sign In</h3>
                                <p class="text-muted">Sign in to Latform to continue</p>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="form-icon-wrapper">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" value="{{old('email')}}" autofocus required>
                                        <i class="form-icon-left mdi mdi-email"></i>
                                        @error('email')
                                            <span class ="invalid-feedback" role = "alert">
                                                <strong> {{$message}} </strong>  
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-icon-wrapper">
                                        <input type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <i class="form-icon-left mdi mdi-lock"></i>
                                        <a href="#" class="form-icon-right password-show-hide"
                                           title="Hide or show password">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                        @error('password')
                                            <span class ="invalid-feedback" role = "alert">
                                                <strong> {{$message}} </strong>  
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <p class="text-center mb-4">
                                        Can't access your account? <a href="{{ route('password.request') }}">Reset your password now</a>.
                                    </p>
                                @endif
                                
                                <button class="btn btn-primary btn-block mb-4">Sign In</button>
                            </form>
                            <div class="text-divider">or</div>
                            <div class="social-links justify-content-center">
                                <a href="#">
                                    <i class="mdi mdi-google"></i> Google
                                </a>
                                <a href="#">
                                    <i class="mdi mdi-facebook"></i> Facebook
                                </a>
                                <a href="#">
                                    <i class="mdi mdi-github"></i> Github
                                </a>
                            </div>
                            <p class="text-center d-block d-lg-none mt-5 mt-lg-0">
                                Don't have an account?
                                <a href="{{route('register')}}">Create a free account</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jquery -->
<script src="{{asset('dist/vendor/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('dist/vendor/bootstrap-4.5.3/js/bootstrap.min.js')}}"></script>
<!-- Latform scripts -->
<script src="{{asset('dist/js/latform.min.js')}}"></script>
</body>
</html>

