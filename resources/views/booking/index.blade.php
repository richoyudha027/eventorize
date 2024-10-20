@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transactions - Eventorize</title>
    @include('template.head')
</head>

<body id="page-top min-vh-100">

    <div id="wrapper">
        @include('template.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            @include('template.header')

            <!-- Main Content -->
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="h3 font-weight-bold text-gray-800">Booking History</h1>
                </div>

                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th>Event Name</th>
                            <th>User</th>
                            <th>Total Tickets</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'organizer')
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr id="booking-row-{{ $booking->id }}">
                                <td class="align-middle">{{ $booking->event->name ?? 'Event Not Found' }}</td>
                                <td class="align-middle">{{ $booking->user->name ?? 'Unknown User' }}</td>
                                <td class="text-center align-middle">{{ $booking->total }}</td>
                                <td class="text-center align-middle">
                                    {{ Carbon::parse($booking->time)->format('d-m-Y H:i') }}
                                </td>
                                <td class="text-center align-middle">
                                    <span id="status-badge-{{ $booking->id }}" 
                                        class="badge {{ $booking->verified ? 'badge-success' : 'badge-warning' }}">
                                        {{ $booking->verified ? 'Verified' : 'Pending' }}
                                    </span>
                                </td>

                                @if (auth()->user()->role === 'admin' || auth()->user()->role === 'organizer')
                                    <td class="text-center align-middle">
                                        @if (!$booking->verified)
                                            <button 
                                                class="btn btn-sm btn-primary verify-booking" 
                                                data-id="{{ $booking->id }}">
                                                Verify
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn-secondary" disabled>Verified</button>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($bookings->isEmpty())
                    <div class="col-12 text-center">
                        <p>No bookings found.</p>
                    </div>
                @endif
            </div>

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

    <script>
        // Handle click on Verify button
        $('.verify-booking').on('click', function() {
            var button = $(this);
            var bookingId = button.data('id');

            // AJAX request to verify booking
            $.ajax({
                url: `/bookings/${bookingId}/verify`,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.verified) {
                        $('#status-badge-' + bookingId)
                            .removeClass('badge-warning')
                            .addClass('badge-success')
                            .text('Verified');

                        button.removeClass('btn-success').addClass('btn-secondary').text('Verified').prop('disabled', true);
                    }
                },
                error: function(xhr) {
                    alert('Failed to verify booking.');
                }
            });
        });
    </script>
</body>

</html>
