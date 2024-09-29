@php
    use Carbon\Carbon;
@endphp


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

            @include('template.header')
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container mt-4">
                    <div class="row">
                        @forelse ($events as $event)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <!-- Event Image -->
                                
                                <!-- Card Body -->
                                <div class="card-body">
                                    <!-- Event Name -->
                                    <img src="{{ asset('storage/img/'.$event->image) }}" class="card-img-top" style="width: 210px; height: 280px;" alt="{{ $event->image }}">

                                    <h5 class="card-title text-gray-900 text-lg font-weight-bold mt-3" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $event->event_name }}
                                    </h5>

                                    <!-- Event Date -->
                                    <p class="card-text text-xs">
                                        <strong>Organizer:</strong> {{ $event->organizer }}<br>
                                        <strong>Category:</strong> {{ $event->category }}<br>
                                        <strong>Price:</strong> {{ $event->fee ? '$' . number_format($event->fee, 2) : 'Free' }}<br>
                                        <strong>Date:</strong> 
                                        @php
                                            $startDate = Carbon::parse($event->start_date);
                                            $endDate = Carbon::parse($event->end_date);

                                            if ($startDate->format('Y') === $endDate->format('Y') && $startDate->format('m') === $endDate->format('m')) {
                                                echo $startDate->format('d') . ' - ' . $endDate->format('d') . ' ' . $startDate->format('M Y');
                                            }
                                           
                                            elseif ($startDate->format('Y') === $endDate->format('Y')) {
                                                echo $startDate->format('d M') . ' - ' . $endDate->format('d M Y');
                                            }
                                        
                                            else {
                                                echo $startDate->format('d M Y') . ' - ' . $endDate->format('d M Y');
                                            }
                                        @endphp
                                        <br>
                                        <strong>Time:</strong> {{ $event->start_time }} - {{ $event->end_time }}
                                    </p>
                                    <!-- Action Buttons -->
                                    <div class="text-center">
                                        <a href="{{ route('crud-event.show', $event->event_id) }}" class="btn btn-info btn-sm">Details</a>
                                        @if(auth()->check() && auth()->user()->role == 'admin')
                                            <a href="{{ route('crud-event.edit', $event->event_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('crud-event.destroy', $event->event_id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center">
                            <p>No events found.</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $events->appends(['search' => $search, 'limit' => $limit])->links('pagination::bootstrap-4') }}
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
