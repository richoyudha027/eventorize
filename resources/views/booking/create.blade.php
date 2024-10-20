<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booking - Eventorize</title>
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
                <div class="container-fluid">
                    <h1 class="h3 mb-2 font-weight-bold text-gray-800">Book Event: {{ $event->name }}</h1>

                    <!-- Form Pemesanan -->
                    <form action="{{ route('bookings.store', $event->id) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="text-gray-800 font-weight-bold" for="name">Your Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                        value="{{ old('name', auth()->user()->name ?? '') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="text-gray-800 font-weight-bold" for="total">Total Tickets</label>
                                    <input type="number" class="form-control @error('total') is-invalid @enderror" id="total" name="total"
                                        value="{{ old('total', 1) }}" min="1" required>
                                    @error('total')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="text-gray-800 font-weight-bold">Event Name:</label>
                                    <p>{{ $event->name }}</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="text-gray-800 font-weight-bold">Category:</label>
                                    <p>{{ $event->category }}</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="text-gray-800 font-weight-bold">Location:</label>
                                    <p>{{ $event->location }}</p>
                                </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="text-gray-800 font-weight-bold">Date:</label>
                                    <p>{{ $event->start_date }} - {{ $event->end_date }}</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="text-gray-800 font-weight-bold">Time:</label>
                                    <p>{{ $event->start_time }} - {{ $event->end_time }}</p>
                                </div>
                            </div>
                         </div>

                        <!-- Tombol Submit -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('crud-event.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-success">Book Now</button>
                        </div>
                    </form>
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

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>
</body>

</html>
