@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event List - Eventorize</title>
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
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="h3 font-weight-bold text-gray-800">Event List</h1>
                        @if(auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'organizer'))
                            <a href="{{ route('crud-event.create') }}" class="btn btn-success">Add New Event</a>
                        @endif
                    </div>

                    <div class="row">
                        @forelse ($events as $event)
                            <div class="col-md-3 mb-4">
                                <div class="card">
                                    <!-- Event Image -->
                                    <img src="{{ asset('storage/img/' . $event->image) }}" 
                                        class="card-img-top" 
                                        style="width: 210px; height: 280px;" 
                                        alt="{{ $event->image }}">

                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <h5 class="card-title text-gray-900 text-lg font-weight-bold mt-3" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            {{ $event->name }}
                                        </h5>

                                        <p class="card-text text-xs">
                                            <strong>Organizer:</strong> {{ $event->organizer->name }} <br>
                                            <strong>Category:</strong> {{ $event->category }}<br>
                                            <strong>Price:</strong> {{ $event->fee ? 'Rp' . number_format($event->fee, 2) : 'Free' }}<br>
                                            <strong>Date:</strong> 
                                            @php
                                                $startDate = Carbon::parse($event->start_date);
                                                $endDate = Carbon::parse($event->end_date);

                                                if ($startDate->format('Y-m') === $endDate->format('Y-m')) {
                                                    echo $startDate->format('d') . ' - ' . $endDate->format('d M Y');
                                                } elseif ($startDate->format('Y') === $endDate->format('Y')) {
                                                    echo $startDate->format('d M') . ' - ' . $endDate->format('d M Y');
                                                } else {
                                                    echo $startDate->format('d M Y') . ' - ' . $endDate->format('d M Y');
                                                }
                                            @endphp
                                            <br>
                                            <strong>Time:</strong> {{ $event->start_time }} - {{ $event->end_time }} (UTC+07:00)
                                        </p>

                                        <!-- Action Buttons -->
                                        <div class="text-center">
                                            <a href="{{ route('crud-event.show', $event->id) }}" class="btn btn-info btn-sm">Details</a>

                                            @if(auth()->check() && auth()->user()->role == 'user' && $event->status)
                                                <a href="{{ url('bookings/create/' . $event->id) }}" class="btn btn-success btn-sm">Buy</a>
                                            @endif

                                            <!-- Admin Actions -->
                                            @if(auth()->check() && auth()->user()->role == 'admin')
                                                <a href="{{ route('crud-event.edit', $event->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('crud-event.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            @endif

                                            <!-- Organizer Actions -->
                                            @if(auth()->check() && auth()->user()->role == 'organizer' && auth()->id() == $event->organizer_u_id)
                                                <a href="{{ route('crud-event.edit', $event->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('crud-event.destroy', $event->id) }}" method="POST" style="display:inline-block;">
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

            @include('template.footer')
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
