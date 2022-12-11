<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ url('backend/images/default/favicon.png') }}">
    {{-- <link rel="icon" href="{{ url('backend/images/default/favicon.jpg') }}"> --}}
    <!-- CSS  -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
    <div class="bg-light">
        <div class="container shadow">
            @include('frontend.layouts.header')
            @yield('main_slider')

            @include('frontend.layouts.menu')
            @yield('marquee_notice')

            <section>
                <!-- body start -->
                @yield('body_content')
                <!-- body end -->
            </section>
            <!-- footer start -->
            @include('frontend.layouts.footer')

            <!-- footer end -->

        </div>
        <!-- container end div -->

    </div>
    {{-- @yield('scripts') --}}
</body>
</html>
