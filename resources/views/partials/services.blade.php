<h1 class="mb-20 text-3xl font-bold text-center uppercase text-primary">Services</h1>
<div class="font-[sans-serif]">
    <div class="max-w-6xl px-4 py-6 mx-auto">

        <h2 class="mb-16 text-4xl font-extrabold text-center text-secondary">{{ $serviceMainTitle }}</h2>

        <!-- <div class="grid grid-cols-1 gap-8 mx-auto md:grid-cols-2 lg:grid-cols-3 max-md:max-w-md"> -->
        <!--Slider wrapper-->
        <div class="text-center swiper mySwiper">
            <div class="swiper-wrapper">

                @foreach ($services as $service)
                    <div
                        class="overflow-hidden transition-all shadow-md bg-secondary swiper-slide rounded-2xl hover:shadow-lg">
                        <div class="p-8">
                            <h3 class="mb-3 text-xl font-semibold text-white">{{ $service->service_title }}</h3>
                            <p class="text-sm leading-relaxed text-slate-300">{{ $service->service_description }}</p>
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- <!-- If we need navigation buttons -->
            <div class="flex justify-center gap-8 mt-8">
                <button id="slider-button-left"
                    class="flex items-center justify-center w-12 h-12 transition-all duration-500 border border-teal-600 border-solid rounded-full swiper-button-prev group hover:bg-teal-600 "
                    data-carousel-prev>
                    <svg class="w-6 h-6 text-teal-600 group-hover:text-white" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20.9999 12L4.99992 12M9.99992 6L4.70703 11.2929C4.3737 11.6262 4.20703 11.7929 4.20703 12C4.20703 12.2071 4.3737 12.3738 4.70703 12.7071L9.99992 18"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button id="slider-button-right"
                    class="flex items-center justify-center w-12 h-12 transition-all duration-500 border border-teal-600 border-solid rounded-full swiper-button-next group hover:bg-teal-600"
                    data-carousel-next>
                    <svg class="w-6 h-6 text-teal-600 group-hover:text-white" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 12L19 12M14 18L19.2929 12.7071C19.6262 12.3738 19.7929 12.2071 19.7929 12C19.7929 11.7929 19.6262 11.6262 19.2929 11.2929L14 6"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div> --}}

        </div>
    </div>
</div>
