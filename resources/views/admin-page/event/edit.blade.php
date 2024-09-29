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
                <div class="container-fluid" >
                    <h1 class="h3 mb-2 font-weight-bold text-gray-800 mr-2" style="line-height: 1.2;">Edit Event</h1>
                </div>

                <!-- Begin Page Content -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="card-body">
                        <form action="{{ route('crud-event.update', $event->event_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Menandakan bahwa ini adalah request untuk update -->

                            <div class="form-group">
                                <label class="font-weight-bold text-gray-800 mr-2" for="event_name">Event Name</label>
                                <input type="text" class="form-control @error('event_name') is-invalid @enderror" id="event_name"
                                    name="event_name" value="{{ old('event_name', $event->event_name) }}" required>
                                @error('event_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-gray-800 mr-2" for="organizer">Organizer</label>
                                        <input type="text" class="form-control @error('category') is-invalid @enderror" id="organizer"
                                            name="organizer" value="{{ old('organizer', $event->organizer) }}" required>
                                        @error('organizer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-gray-800 mr-2" for="category">Category</label>
                                        <input type="text" class="form-control @error('category') is-invalid @enderror" id="category"
                                            name="category" value="{{ old('category', $event->category) }}" required>
                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-gray-800 mr-2" for="location">Location</label>
                                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location"
                                            name="location" value="{{ old('location', $event->location) }}" required>
                                        @error('location')
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
                                        <label class="font-weight-bold text-gray-800 mr-2" for="fee">Fee</label>
                                        <input type="number" class="form-control @error('fee') is-invalid @enderror" id="fee" name="fee"
                                            value="{{ old('fee', $event->fee) }}">
                                        @error('fee')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-gray-800 mr-2" for="start_date">Start Date</label>
                                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                                            name="start_date" value="{{ old('start_date', $event->start_date) }}" required>
                                        @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-gray-800 mr-2" for="end_date">End Date</label>
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                                            name="end_date" value="{{ old('end_date', $event->end_date) }}" required>
                                        @error('end_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-gray-800 mr-2" for="start_time">Start Time</label>
                                        <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time"
                                            name="start_time" value="{{ old('start_time', $event->start_time) }}" required>
                                        @error('start_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-gray-800 mr-2" for="end_time">End Time</label>
                                        <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time"
                                            name="end_time" value="{{ old('end_time', $event->end_time) }}" required>
                                        @error('end_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-gray-800 mr-2" for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $event->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-gray-800 mr-2" for="image">Upload Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @if ($event->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/img/' . $event->image) }}" alt="{{ $event->image }}" style="max-width: 200px;">
                                    </div>
                                @endif
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <form action="{{ route('crud-event.update', $event->event_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Menandakan bahwa ini adalah request untuk update -->
                                <!-- Other form fields -->

                                <!-- Menggunakan Flexbox untuk menata tombol -->
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('crud-event.show', $event->event_id) }}" class="btn btn-primary">Back</a>
                                    <button type="submit" class="btn btn-success">Update Event</button>
                                </div>
                            </form>
                        </form>
                    </div>
                </div>
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