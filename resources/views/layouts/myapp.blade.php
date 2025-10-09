<!DOCTYPE html>

<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel News')</title>


    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- (Tùy chọn) Font Awesome cho icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    {{-- (Tuỳ chọn) CSS riêng của bạn --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


</head>

<body>
    {{-- Header --}}
    @include('partials.header')


    {{-- Nội dung chính --}}
    <main class="container my-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- (Tuỳ chọn) JS riêng của bạn --}}
    <script src="{{ asset('js/app.js') }}"></script>


</body>

</html>