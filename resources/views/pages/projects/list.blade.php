@extends('layouts.app')
@section('content')
    <section class="relative text-center text-white lg:h-[243px] h-auto bg-cover bg-center lg:block hidden"
        style="background-image: url('{{ asset('/images/residential-banner.png') }}');">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center h-full">
            <div class="py-10 lg:mb-0 mb-5 container">
                <h1 class="text-[43px] lg:text-[64px] md:text-[50px] text-center font-bold sm:leading-[82px] leading-[48px] w-full">
                    {{ __('translation.explore-our-projects') }}
                </h1>
                <p class="sm:text-lg text-xs md:text-2xl mt-4 font-normal sm:leading-[32px] leading-none text-center w-full">
                    {{ __('translation.shading-systems-custom-structures') }}
                </p>
            </div>
        </div>
    </section>
    <section class="lg:mt-[58px] mt-[12px] container">
        <div class="flex flex-wrap justify-between">
            <h1 class="text-[24px] text-black font-normal" id="property-count">
                @if ($projects->count() > 1)
                    {{ $projects->count() }} {{ __('translation.projects') }}
                @elseif ($projects->count() == 1)
                    1 {{ __('translation.project') }}
                @else
                    {{ __('translation.no-project') }}
                @endif
            </h1>
            {{--<div class="custom-dropdown-container sm:mt-0 mt-2"
                style="width:115px; height:50px; border: 1px solid #00009F; border-radius:8px">
                <div class="select-menu" style="margin-top: 14px;">
                    <div class="select-btn" style="display: flex; justify-content:center; gap:5px; margin-left:10px;">
                        <span class="sBtn-text font-semibold text-sm text-primary">{{ __('translation.sort by') }}</span>
                        <i class='bx bx-caret-down'></i>
                    </div>
                    <ul class="options scroll-bar z-10" style="min-width: 7rem; margin-top:10px;">
                        <li class="option">
                            <span class="option-text text-primary">{{ __('translation.low') }}</span>
                        </li>
                        <li class="option">
                            <span class="option-text text-primary">{{ __('translation.high') }}</span>
                        </li>
                        <li class="option">
                            <span class="option-text text-primary">{{ __('translation.new') }}</span>
                        </li>

                    </ul>
                </div>
            </div>--}}
        </div>
    </section>
    <section class="container mx-auto mt-[48px]">
        <div class="flex sm:flex-row flex-col sm:gap-0 gap-5 mt-8 justify-between items-center">
            <div class="flex flex-wrap justify-start gap-4 w-full">
                @foreach ($categories as $key => $category)
                    <a href="{{ route('projects') }}?cat={{ $category->name }}">
                        <button
                            class="tab-button {{ request()->query('cat') == $category->name ? 'active' : '' }} py-3 px-5 text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg"
                            data-tab="{{ $category->name }}">{{ $category->name }}</button>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="grid grid-cols-12 gap-7 mt-8">
            <div class="xl:col-span-8 col-span-12">
                <div class="grid grid-cols-12 gap-7" id="properties-container">
                    @if ($projects->count() == 0)
                        <p class="text-center text-black col-span-12">
                            {{ __('translation.no-projects-found') }}
                        </p>
                    @endif
                    @foreach ($projects as $project)
                        <x-project-card-lg :project="$project"></x-project-card-lg>
                    @endforeach
                </div>
            </div>

            <div class="xl:col-span-4 col-span-12">
                <section class="relative bg-cover bg-center rounded-2xl xl:h-[973px] h-auto"
                    style="background-image: url('{{ asset('images/property-grid-2.png') }}');">
                    <div class="padding-mobile-sm p-10 relative flex flex-col  h-full  text-white">
                        <h1 class="text-[40px] font-bold sm:leading-[52px] max-w-2xl">
                            {{ __('translation.reach thousands') }}
                        </h1>
                        <p class="text-base font-normal mt-7 max-w-2xl sm:leading-[24px]">
                            {{ __('translation.Our tailored canopies and structures deliver practical comfort while adding value and beauty to your property') }}
                        </p>
                        <a href="https://wa.me/{{ config('app.whatsapp_number') }}" target="_blank"
                            class="inline-flex gap-2 bg-primary hover:bg-primaryHover text-white font-semibold mt-7 w-[254px] lg:h-[55px] md:h-[40px] h-[55px] button-w-sm flex justify-center items-center rounded-lg text-[15px]">
                            <i class="bx bxl-whatsapp text-xl"></i>
                            {{ __('translation.talk-to-us-now') }}
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <section class="xl:mt-32 mt-16">
        <x-start-listing></x-start-listing>
    </section>
@endsection
