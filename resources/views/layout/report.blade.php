<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include CSS Files -->
    @stack('before-styles')
    <link href="{{ asset('assets/css/report-header.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">
        @yield('content')
    </div>

    <!-- Include JS Files -->
    @stack('before-scripts')
</body>

</html>
