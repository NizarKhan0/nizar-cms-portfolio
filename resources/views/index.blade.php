<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth"> --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nizar Khan - Portfolio</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
</head>

<style>
    .swiper-slide {
        height: auto;
        /* ... other styles from the provided code ... */
    }
</style>

<body class="bg-black">

    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fas fa-angle-up"></i>
    </button>

    <!-- Header Section Start -->
    <header class='sticky top-0 flex border-b py-4 px-4 sm:px-10 bg-black font-sans min-h-[70px] tracking-wide z-50'>
        @include('partials.header')
    </header>
    <!-- Header Section End -->

    <!-- Home Section Start -->
    <section id="home" class="pt-28 pb-30">
        @include('partials.home')
    </section>
    <!-- Home Section End -->

    <!-- About Section Start -->
    <section id="about" class="pt-40 pb-32">
        @include('partials.about')
    </section>
    <!-- About Section End -->

    <!-- Portfolio Section Start -->
    <section id="portfolio" class="pt-40 pb-32">
        @include('partials.portfolio')
    </section>
    <!-- Portfolio Section End -->

    <!-- Services Section Start -->
    @if (count($services) > 0)
        <section id="services" class="pt-40 pb-32">
            @include('partials.services')
        </section>
    @else
    @endif
    <!-- Services Section End -->

    <!-- Footer Section Start -->
    <footer class="px-10 py-10 font-sans tracking-wide" id="contact">
        @include('partials.footer')
    </footer>
    <!-- Footer Section End -->

    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
