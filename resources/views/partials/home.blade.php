<div class="container">

    @if (count($homes) > 0)
        @foreach ($homes as $home)
            <div
                class="grid md:grid-cols-2 items-center md:gap-8 gap-6 font-[sans-serif] text-[#333] max-w-5xl max-md:max-w-md mx-auto">
                <div class="max-md:order-1 max-md:text-center">
                    <h2 class="mb-4 text-3xl font-extrabold text-white md:text-4xl md:leading-10 hover:text-primary animate__animated animate__backInLeft">
                        {{ $home->job_title }}</h2>

                    <h3 class="text-lg font-bold text-slate-300">{{ $home->intro }}</h3>
                    <p class="mt-4 text-base leading-relaxed text-slate-300">{{ $home->description }}.</p>
                    <div class="flex mt-8 max-sm:flex-col sm:space-x-4 max-sm:space-y-6">
                        <!-- <a href="javascript:void(0);"
        class="px-6 py-3 text-base font-semibold text-white transition-all duration-300 transform rounded-full bg-primary hover:bg-opacity-80 hover:scale-105 focus:ring-2 focus:ring-primary focus:outline-none focus:ring-opacity-50">
        WhatsApp</a> -->
                        <a href="{{ $home->cta_link }}" target="_blank"
                            class="px-6 py-3 text-base font-semibold transition-all duration-300 transform border rounded-full text-primary border-primary hover:text-white hover:bg-primary hover:scale-105 focus:ring-2 focus:ring-primary focus:outline-none focus:ring-opacity-50">
                            {{ $home->cta_text }}
                        </a>

                    </div>
                </div>
                {{-- <div class="md:h-[450px] py-8">
            <img src="{{ asset('img/nizar.png') }}"
                class="object-cover mx-auto shadow-2xl bg-slate-900 w-30 h-30 rounded-2xl ring-4 ring-primary"
                alt="Nizar Khan" />
        </div> --}}
                <div class="md:h-[450px] py-8">
                    {{-- wajib letak / tu kalau nak ke access dalam storage --}}
                    {{-- <img src="{{ asset('storage/uploads/nizar/' . $home->nizar_image) }}" --}}
                    <img src="{{ asset($home->nizar_image && $home->nizar_image !== 'nizar.png' ? 'storage/uploads/nizar/' . $home->nizar_image : 'img/nizar.png') }}"
                        class="object-cover mx-auto shadow-2xl bg-slate-900 w-30 h-30 rounded-2xl ring-4 ring-primary animate__animated animate__tada"
                        alt="Nizar Khan" width="360" height="360" />
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center justify-content-center">
            <div class="text-center">
                <h2 class="mb-4 text-3xl font-extrabold text-primary md:text-4xl md:leading-10">No Data Available</h2>
            </div>
        </div>
    @endif

</div>

