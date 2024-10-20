<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.head')
    <title>ITSEVENT</title>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block d-flex align-items-end justify-content-center">
                                <img src="{{ asset('/storage/img/login.png') }}" alt="Image" class="img-fluid">
                            </div>
                            <div class="col-lg-6 justify-content-center align-items-center">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">Welcome to Eventorize!</h1>
                                        <h3 class="small text-gray-900 mb-4">Search and Create Your Event Easily</h3>
                                    </div>
                                    @if($errors->has('login'))
                                        <div class="form-group alert alert-danger small">
                                            {{ $errors->first('login') }}
                                        </div>
                                    @endif
                                    
                                    <form class="user" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{ old('email') }}" 
                                                class="form-control form-control-user {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            @if($errors->has('email'))
                                                <div class="alert text-danger small">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group position-relative">
                                            <input type="password" name="password" class="form-control form-control-user {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                id="exampleInputPassword" placeholder="Password">
                                            
                                            <!-- Icon mata untuk show/hide password -->
                                            <span class="position-absolute" style="right: 20px; top: 50%; transform: translateY(-50%); cursor: pointer;" onclick="togglePassword()">
                                                <i class="fas fa-eye" id="toggleEye"></i>
                                            </span>

                                            @if($errors->has('password'))
                                                <div class="alert text-danger small">
                                                    {{ $errors->first('password') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <button name="submit" type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center mt-3">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
    function togglePassword() {
        var passwordInput = document.getElementById('exampleInputPassword');
        var toggleEye = document.getElementById('toggleEye');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleEye.classList.remove('fa-eye');
            toggleEye.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleEye.classList.remove('fa-eye-slash');
            toggleEye.classList.add('fa-eye');
        }
    }
    </script>
</body>
</html>
