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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
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
                                            <span class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;" onclick="togglePassword()">
                                                <i class="fas fa-eye mr-2" id="toggleEye"></i> <!-- Perbaikan penutup <i> -->
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
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
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
