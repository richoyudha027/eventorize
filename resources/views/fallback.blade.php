<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.head')
    <title>Page Not Found</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" class="d-flex justify-content-center align-items-center vh-100 bg-gray-100" >

            <!-- Main Content -->
        <div id="content">
            <div class="container-fluid">

                <!-- 404 Error Text -->
                <div class="text-center">
                    <div class="error mx-auto" data-text="404">404</div>
                    <p class="lead text-gray-800 mb-5">Page Not Found</p>
                    <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                    <a href="{{ route('dashboard') }}">&larr; Back to Dashboard</a>
                </div>

            </div>
                <!-- /.container-fluid -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

</body>

</html>
