@extends('backend.app')

@section('content')

    <h1>Welcome! {{ auth()->user()->name }}</h1>

    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="mb-2 stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-semibold text-muted">Total Skills</h6>
                                    <h6 class="mb-0 font-extrabold">{{ $skills->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="mb-2 stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-semibold text-muted">Total Work Experiences</h6>
                                    <h6 class="mb-0 font-extrabold">{{ $works->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="mb-2 stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-semibold text-muted">Total Educations</h6>
                                    <h6 class="mb-0 font-extrabold">{{ $educations->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="mb-2 stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-semibold text-muted">Total Portfolios</h6>
                                    <h6 class="mb-0 font-extrabold">{{ $portfolios->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="px-4 card-body py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="mb-2 stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-semibold text-muted">Total Services</h6>
                                    <h6 class="mb-0 font-extrabold">{{ $services->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Visitors Profile</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-visitors-profile"></div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

    </section>
@endsection
