<h1 class="mb-20 text-3xl font-bold text-center uppercase text-primary">Portfolio</h1>
<div class="px-4 py-4 font-san">
    <div class="max-w-6xl mx-auto max-lg:max-w-3xl max-sm:max-w-sm">
        <div class="text-center uppercase">
            <h2 class="text-3xl font-extrabold text-secondary">Latest
                Projects</h2>
        </div>

        <!-- Navigation Arrows -->

        {{-- <div class="flex justify-center gap-8 pt-10">
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


        <div class="mt-10 swiper mySwiper">
            <div class="swiper-wrapper">

                @foreach ($portfolios as $portfolio)
                    <!-- Slide -->
                    <div class="p-4 overflow-hidden transition-all duration-300 rounded-md swiper-slide bg-secondary">
                        {{-- <img src="https://readymadeui.com/images/food44.webp" alt=""
                            class="object-cover w-full h-64 rounded-md" /> --}}
                        <img src="{{ asset('storage/uploads/projects/' . $portfolio->project_image) }}"
                            alt="" class="object-cover w-full h-64 rounded-md" />
                        <div class="text-center">
                            {{-- <span class="block mt-4 mb-2 text-sm text-slate-100"></span> --}}
                            <h3 class="mb-4 text-xl font-bold text-slate-100">{{ $portfolio->project_title }}</h3>
                            <p class="text-sm text-slate-100">
                                {{ $portfolio->project_description }}
                            </p>
                            <div class="mt-4">
                                @foreach ($portfolio->skills as $skill)
                                    <span
                                        class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md text-slate-600 bg-teal-50 ring-1 ring-inset ring-gray-500/10">{{ $skill->skill_name }}</span>
                                @endforeach
                            </div>
                            <button type="button"
                                class="px-5 py-2.5 text-white text-sm tracking-wider border-none outline-none rounded-md bg-teal-500 hover:bg-purple-teal mt-6"
                                onclick="window.open('{{ $portfolio->project_link }}', '_blank')">
                                View Project
                            </button>
                            {{-- <button type="button"
                                class="px-5 py-2.5 text-white text-sm tracking-wider border-none outline-none rounded-md bg-teal-500 hover:bg-purple-teal mt-6">Visit {{ $portfolio->project_link}}
                            </button> --}}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
