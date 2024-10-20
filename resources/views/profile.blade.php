<!DOCTYPE html>
<html lang="en">



<head>
    <title>PBKK APPS</title>
    @include('template.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('template.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Header -->
                 @include('template.header')
                <!-- Header -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-0 font-weight-bold text-gray-800 mt-1">Profile</h1>
                    <!-- Content Row -->
                    <div class="row mt-3">
                        <div class="col-lg-4">
                          <!-- Profile Picture -->
                            <div class="card shadow mb-4">
                                <div class="card-body text-center">
                                @if (empty(Auth::user()->image))
                                    <img class="img-fluid rounded-circle mb-3" src="{{ asset('storage/img/user.png') }}">
                                @else
                                    <img class="img-fluid rounded-circle mb-3" src="{{ asset('storage/img/'.Auth::user()->image) }}">
                                @endif
                                    <h5 class="card-title text-gray-800 font-weight-bold">{{ Auth::user()->name }}</h5>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-8">
                          <!-- Profile Information -->
                            <div class="card shadow mb-4">
                                 <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                                </div>
                                <div class="card-body">
                                    <p><i class="fas fa-user"></i> <strong class="ml-2">Name:</strong> {{ Auth::user()->name }}</p>
                                    <p><i class="fas fa-envelope"></i> <strong class="ml-2">Email:</strong> {{ Auth::user()->email }}</p>
                                    <p><i class="fas fa-phone"></i> <strong class="ml-2">Phone Number:</strong> {{ Auth::user()->phone }}</p>
                                    <p><i class="fas fa-map-marker-alt"></i> <strong class="ml-2">Address:</strong> {{ Auth::user()->address }}</p>
                                    <p><i class="fas fa-calendar-alt"></i> <strong class="ml-2">Date of Birth:</strong> {{ Auth::user()->dob }}</p>
                                </div>
                                <div  class="text-center mb-3">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#textContent" aria-expanded="false" aria-controls="textContent"
                                    onclick="window.location.href='#'">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center mt-3">
                        <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#textContent" aria-expanded="false" aria-controls="textContent"
                        onclick="window.location.href='dashboard'">
                            Back to Dashboard
                        </button>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            @include('template.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

</body>

</html>