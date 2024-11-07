<h1 class="mb-20 text-3xl font-bold text-center uppercase text-primary">About</h1>
<div class="text-center uppercase">
    <h2 class="pb-4 text-3xl font-extrabold text-secondary">Technical
        Stack</h2>
</div>

@if (count($skills) > 0)
    <div class="grid max-w-6xl grid-cols-2 gap-4 px-4 mx-auto mb-20 max-sm:grid-cols-1">
        @foreach ($skills as $skill)
            <div class="mb-7">
                <div class="flex justify-between py-1">
                    <span
                        class="text-base text-gray-lite font-semibold dark:text-[#A6A6A6]">{{ $skill->skill_name }}</span>
                    <span
                        class="text-base font-semibold text-gray-lite pr-5 dark:text-[#A6A6A6]">{{ $skill->percentage }}%</span>
                </div>
                <svg class="rc-progress-line" viewBox="0 0 100 1" preserveAspectRatio="none">
                    <path class="rc-progress-line-trail" d="M 0.5,0.5 L 99.5,0.5" stroke-linecap="round"
                        stroke="#D9D9D9" stroke-width="1" fill-opacity="0"></path>
                    <path class="rc-progress-line-path" d="M 0.5,0.5 L 99.5,0.5" stroke-linecap="round"
                        stroke="{{ $skill->color_code }}" stroke-width="1" fill-opacity="0"
                        style="stroke-dasharray: {{ $skill->percentage }}px, 100px; stroke-dashoffset: 0px; transition: stroke-dashoffset 0.3s ease 0s, stroke-dasharray 0.3s ease 0s, stroke 0.3s linear 0s, 0.06s;">
                    </path>
                </svg>
            </div>
        @endforeach
    </div>
@else
    <div class="flex items-center justify-center grid-cols-1 mb-7">
        <span class="text-base text-gray-lite font-semibold dark:text-[#A6A6A6]">No skills found</span>
    </div>
@endif



<div class="text-center uppercase">
    <h2 class="pb-4 text-3xl font-extrabold text-secondary">Work Experience & Education</h2>
</div>

<!-- Container for Work Experience and Education sections -->
<div class="grid grid-cols-1 gap-8 px-4 mt-8 md:grid-cols-2">

    <!-- Work Experience Section -->
    <div>
        <h3 class="mb-6 text-2xl font-extrabold text-center text-primary">Work Experience</h3>
        <div class="space-y-8">

            @foreach ($works as $work)
                <!-- Work Experience Item 1 -->
                <div class="flex flex-col items-center space-y-2">
                    <!-- Icon -->
                    {{-- <div class="p-3 bg-teal-600 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M3 21V9a2 2 0 0 1 2-2h3V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2h3a2 2 0 0 1 2 2v12">
                            </path>
                            <path d="M13 7H9"></path>
                            <path d="M9 14h6v5H9z"></path>
                            <path d="M3 19h18"></path>
                        </svg>
                    </div> --}}
                    <div class="p-3 bg-white rounded-full">
                        <i class="fas fa-building" style="font-size:24px"></i>
                    </div>
                    <!-- Job Information -->
                    <div class="text-center text-secondary">
                        <h4 class="text-xl font-bold text-third">{{ $work->job_position }}</h4>
                        @if ($work->company_name == null)
                            {{ $work->company_address }}
                        @else
                            <p class="text-sm font-semibold">{{ $work->company_name }} - {{ $work->company_address }}
                            </p>
                        @endif

                        @if ($work->work_end_date)
                            <p class="text-sm font-semibold">{{ date('F Y', strtotime($work->work_start_date)) }} -
                                {{ date('F Y', strtotime($work->work_end_date)) }}</p>
                        @else
                            <p class="text-sm font-semibold">{{ date('F Y', strtotime($work->work_start_date)) }} -
                                Present
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Education Section -->
    <div>
        <h3 class="mb-6 text-2xl font-extrabold text-center text-primary">Education</h3>
        <div class="space-y-8">

            @foreach ($educations as $education)
                <!-- Education Item-->
                <div class="flex flex-col items-center space-y-2">
                    <!-- Icon -->
                    <div class="p-3 bg-white rounded-full">
                        <i class="fa fa-graduation-cap" style="font-size:24px"></i>
                    </div>
                    <!-- Education Information -->
                    <div class="text-center text-secondary">
                        <h4 class="text-xl font-bold text-third">{{ $education->education_name }}</h4>
                        <p class="text-sm font-semibold">{{ $education->institution_name }} -
                            {{ $education->institution_address }}
                        </p>
                        @if ($education->education_end_date)
                            <p class="text-sm font-semibold">
                                {{ date('F Y', strtotime($education->education_start_date)) }} -
                                {{ date('F Y', strtotime($education->education_end_date)) }}</p>
                        @else
                            <p class="text-sm font-semibold">
                                {{ date('F Y', strtotime($education->education_start_date)) }} -
                                Present</p>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
