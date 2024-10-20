<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event Details - Eventorize</title>
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
                    <h1 class="h3 mb-2 text-gray-800 font-weight-bold" style="line-height: 1.2;">Detail Event</h1>
                </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card mb-4">
                        <div class="row no-gutters">
                            <!-- Gambar Event di Sebelah Kiri -->
                            <div class="col-md-4">
                                <img src="{{ asset('storage/img/'.$event->image) }}" alt="{{ $event->image }}" class="card-img p-3" style="max-width: 100%; height: auto;">
                            </div>

                            <!-- Detail Event di Sebelah Kanan -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-gray-900 font-weight-bold">{{ $event->name }}</h5>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <strong class="text-gray-900">Organizer:</strong> {{ $event->organizer->name }}
                                        </div>
                                        <div class="col">
                                            <strong class="text-gray-900">Category:</strong> {{ $event->category }}
                                        </div>
                                        <div class="col">
                                            <strong class="text-gray-900">Location:</strong> {{ $event->location }}
                                        </div>
                                    </div>

                                    <!-- Baris 2: Status, Fee, Start Date, End Date, Start Time, End Time -->
                                    <div class="row mb-3">
                                        <div class="col">
                                            <strong class="text-gray-900">Status:</strong> 
                                            {{ $event->status == 1 ? 'Available' : 'Sold Out' }}
                                        </div>
                                        <div class="col">
                                            <strong class="text-gray-900">Fee:</strong> 
                                            {{ $event->fee ? 'Rp' . number_format($event->fee, 0, ',', '.') : 'Free' }}
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <strong class="text-gray-900">Date:</strong> 
                                            {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}
                                        </div>
                                        <div class="col">
                                            <strong class="text-gray-900">Time:</strong> 
                                            {{ $event->start_time }} - {{ $event->end_time }} (UTC+07:00)
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="form-group">
                                        <strong class="text-gray-900">Description</strong>
                                        <p class="mt-2" id="description">{{ $event->description }}</p>
                                    </div>

                                    <!-- Tombol Aksi -->
                                    <div class="text-center">
                                        <a href="{{ route('crud-event.index') }}" class="btn btn-secondary">Back to Event List</a>
                                        @if(auth()->check() && auth()->user()->role == 'admin')
                                            <a href="{{ route('crud-event.edit', $event->id) }}" class="btn btn-primary">Edit Event</a>
                                            <form class="d-inline" action="{{ route('crud-event.destroy', $event->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Event</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Page Content -->
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
