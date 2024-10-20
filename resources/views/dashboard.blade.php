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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h6 mb-2 text-gray-800">Selamat Datang,</h1>
                    <h1 class="h3 mb-2 text-black-800 font-weight-bold text-gray-800" style="line-height: 1.2;">
                        {{ Auth::user()->name }}
                    </h1>

                    <!-- User Role: User -->
                    @if (Auth::user()->role === 'user')
                        <div class="row mt-4">
                            <!-- Card: List Events -->
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold text-primary">List Events</h5>
                                        <p class="card-text">Explore the available events and register for your favorite ones.</p>
                                        <a href="{{ route('crud-event.index') }}" class="btn btn-primary">View Events</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card: Transaction History -->
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold text-success">Transaction History</h5>
                                        <p class="card-text">View your past bookings and check their status.</p>
                                        <a href="{{ route('bookings.index') }}" class="btn btn-success">View Transaction History</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- User Role: Organizer -->
                    @if (Auth::user()->role === 'organizer')
                        <div class="row mt-4">
                            <!-- Card: List Events -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold text-primary">List Events</h5>
                                        <p class="card-text">Manage your events and monitor registrations.</p>
                                        <a href="{{ route('crud-event.index') }}" class="btn btn-primary">View Events</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card: Add Event -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold text-warning">Add Event</h5>
                                        <p class="card-text">Create a new event and engage with participants.</p>
                                        <a href="{{ route('crud-event.create') }}" class="btn btn-warning">Add Event</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card: Transaction History -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold text-success">Transaction History</h5>
                                        <p class="card-text">View all transactions for your events.</p>
                                        <a href="{{ route('bookings.index') }}" class="btn btn-success">View Transactions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- User Role: Admin -->
                    @if (Auth::user()->role === 'admin')
                        <div class="row mt-4">
                            <!-- Card: List Events -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold text-primary">List Events</h5>
                                        <p class="card-text">Manage and view all events available in the system.</p>
                                        <a href="{{ route('crud-event.index') }}" class="btn btn-primary">View Events</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card: Add Event -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold text-warning">Add Event</h5>
                                        <p class="card-text">Create a new event and publish it to the platform.</p>
                                        <a href="{{ route('crud-event.create') }}" class="btn btn-warning">Add Event</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card: Transaction History -->
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold text-success">Transaction History</h5>
                                        <p class="card-text">View all user transactions and bookings.</p>
                                        <a href="{{ route('bookings.index') }}" class="btn btn-success">View Transactions</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card: Manage Organizer -->
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold text-info">Manage Organizer</h5>
                                        <p class="card-text">Manage event organizers and their roles.</p>
                                        <a href="{{ route('organizers.index') }}" class="btn btn-info">Manage Organizer</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card: Manage User -->
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold text-danger">Manage User</h5>
                                        <p class="card-text">View and manage registered users on the platform.</p>
                                        <a href="{{ route('users.index') }}" class="btn btn-danger">Manage Users</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- End of Page Content -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('template.footer')
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
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
