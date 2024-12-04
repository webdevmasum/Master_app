<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="frontend/images/favicon.png" type="">
    <title>@yield('title')</title>

    {{-- style css --}}
    @include('frontend.partials.style')
</head>

<body>

    {{-- hero_area --}}
    <div class="hero_area">
        @include('frontend.partials.header')
    </div>

    <div>
        @yield('content')
    </div>

    <!-- footer start -->
    @include('frontend.partials.footer')
    <!-- footer end -->

    {{-- javascript --}}
    @include('frontend.partials.script')

</body>

</html>
