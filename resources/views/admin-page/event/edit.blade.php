<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Event - Eventorize</title>
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
                    <h1 class="h3 mb-2 font-weight-bold text-gray-800 mr-2" style="line-height: 1.2;">Edit Event</h1>
                </div>

                <!-- Begin Page Content -->
                <div class="d-sm-flex mb-4">
                    <div class="card-body col-md-4">
                        <label class="font-weight-bold text-gray-800 mr-2" for="name">Event Image</label>
                        <img src="{{ asset('storage/img/'.$event->image) }}" alt="{{ $event->image }}" class="card-img" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="card-body">
                        <!-- Form untuk mengedit event -->
                        <form action="{{ route('crud-event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Metode PUT untuk update -->

                            <!-- Event Name -->
                            <div class="form-group">
                                <label class="font-weight-bold text-gray-800 mr-2" for="name">Event Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $event->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Organizer dan Category -->
                            <div class="row">
                                @if(auth()->user()->role == 'organizer')
                                    <!-- Field Organizer (hanya bisa diisi dengan ID organizer yang sedang login) -->
                                    <input type="hidden" name="organizer_u_id" value="{{ auth()->user()->id }}">
                                @else
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="font-weight-bold text-gray-800 mr-2" for="organizer_u_id">Organizer</label>
                                            <select class="form-control @error('organizer_u_id') is-invalid @enderror" id="organizer_u_id" name="organizer_u_id" required>
                                                <option value="">Select Organizer</option>
                                                @foreach ($organizers as $organizer)
                                                    <option value="{{ $organizer->id }}" {{ old('organizer_u_id', $event->organizer_u_id) == $organizer->id ? 'selected' : '' }}>
                                                        {{ $organizer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('organizer_u_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif 
                            
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
                            </div>

                            <!-- Location, Status, Fee -->
                            <div class="row">
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

                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-gray-800 mr-2" for="status">Status</label>
                                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                            <option value="1" {{ old('status', $event->status) == 1 ? 'selected' : '' }}>Available</option>
                                            <option value="0" {{ old('status', $event->status) == 0 ? 'selected' : '' }}>Sold Out</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-gray-800 mr-2" for="fee">Fee</label>
                                        <input type="number" class="form-control @error('fee') is-invalid @enderror" id="fee"
                                            name="fee" value="{{ old('fee', $event->fee) }}">
                                        @error('fee')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Start Date, End Date, Start Time, End Time -->
                            <div class="row">
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

                            <!-- Description -->
                            <div class="form-group">
                                <label class="font-weight-bold text-gray-800 mr-2" for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $event->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Upload Image -->
                            <div class="form-group">
                                <label class="font-weight-bold text-gray-800 mr-2" for="image">Upload New Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Submit and Back Buttons -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('crud-event.show', $event->id) }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Update Event</button>
                            </div>
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
