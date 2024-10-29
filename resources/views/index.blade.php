<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nizar Khan - Portfolio</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>

<body class="bg-black">
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
    <section id="services" class="pt-40 pb-32">
        @include('partials.services')
    </section>
    <!-- Services Section End -->

    <!-- Footer Section Start -->
    <footer class="px-10 py-10 font-sans tracking-wide" id="contact">
        @include('partials.footer')
    </footer>
    <!-- Footer Section End -->

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
