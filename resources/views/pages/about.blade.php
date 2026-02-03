@extends('layouts.app')
@section('content')
<section class="relative text-center text-white lg:h-[243px] h-auto bg-cover bg-center" style="background-image: url('{{ asset('/images/residential-banner.png') }}');">
    <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 flex flex-col  h-full">
            <div class="mt-[90px] lg:mb-0 mb-5 container flex items-start">
                <h1 class="md:text-[56px] text-[30px] font-bold">{{ __('translation.about-majalisalshaar') }}</h1>
            </div>
        </div>   
</section>
<section class="sm:mt-32 mt-20 container">
    <div class="grid grid-cols-12">
        <div class="xl:col-span-8 col-span-12">
            <p class="text-base text-secondary font-normal">{{ __('translation.who are we') }}</p>
            <h1 class="text-[32px] text-black font-bold mt-2">{{ __('translation.introduction') }}</h1>
            <p class="mt-6 sm:w-[80%]">{{ __('translation.about-car-parking-shades-pergolas-roof-tiles-solutions') }}</p>
            <p class="mt-6 sm:w-[80%]">{{ __('translation.our-mission-quality-craftsmanship-outdoor-solutions') }}</p>
        </div>
        <div class="xl:col-span-4 col-span-12 xl:mt-0 mt-10">
            <img src="/images/about-us.png" alt="" class="w-full h-[457px] xl:h-full rounded-2xl object-cover">
        </div>
    </div>
</section>
<section class="sm:mt-[108px] mt-20 container">
    <h1 class="text-[32px] font-bold text-black">{{ __('translation.statistics') }}</h1>
    <div class="grid md:grid-cols-2 grid-cols-1 gap-7 mt-11">
        <div class="flex">
            <div class="bg-primary text-white rounded-l-2xl rtl:rounded-l-none rtl:rounded-r-2xl flex justify-center items-center xl:w-[250px] lg:w-[160px] md:w-[140px] w-[120px] p-5">
                <h2 class="sm:text-[32px] text-[26px] font-normal">{{ __('translation.projects') }}</h2>
            </div>
            <div class="relative">
                <img src="/images/about-card-1.png" alt="Building Image" class="object-cover h-full w-full rounded-r-2xl rtl:rounded-r-none rtl:rounded-l-2xl">
                <div class="absolute inset-0 flex justify-center items-center">
                    <span class="text-white sm:text-[64px] text-[35px] font-bold">41K+</span>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="bg-primary text-white rounded-l-2xl rtl:rounded-l-none rtl:rounded-r-2xl flex justify-center items-center xl:w-[250px] lg:w-[160px] md:w-[140px] w-[120px] p-5">
                <h2 class="sm:text-[32px] text-[26px] font-normal">{{ __('translation.places') }}</h2>
            </div>
            <div class="relative">
                <img src="/images/about-card-2.png" alt="Building Image" class="object-cover h-full w-full rounded-r-2xl rtl:rounded-r-none rtl:rounded-l-2xl">
                <div class="absolute inset-0 flex justify-center items-center">
                    <span class="text-white sm:text-[64px] text-[35px] font-bold">890+</span>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="bg-primary text-white rounded-l-2xl rtl:rounded-l-none rtl:rounded-r-2xl flex justify-center items-center xl:w-[250px] lg:w-[160px] md:w-[140px] w-[120px] p-5">
                <h2 class="sm:text-[32px] text-[26px] font-normal">{{ __('translation.cities') }}</h2>
            </div>
            <div class="relative">
                <img src="/images/about-card-3.png" alt="Building Image" class="object-cover h-full w-full rounded-r-2xl rtl:rounded-r-none rtl:rounded-l-2xl">
                <div class="absolute inset-0 flex justify-center items-center">
                    <span class="text-white sm:text-[64px] text-[35px] font-bold">30+</span>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="bg-primary text-white rounded-l-2xl rtl:rounded-l-none rtl:rounded-r-2xl flex justify-center items-center xl:w-[250px] lg:w-[160px] md:w-[140px] w-[120px] p-5">
                <h2 class="sm:text-[32px] text-[26px] font-normal">{{ __('translation.clients') }}</h2>
            </div>
            <div class="relative">
                <img src="/images/about-card-4.png" alt="Building Image" class="object-cover h-full w-full rounded-r-2xl rtl:rounded-r-none rtl:rounded-l-2xl">
                <div class="absolute inset-0 flex justify-center items-center">
                    <span class="text-white sm:text-[64px] text-[35px] font-bold">100+</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sm:mt-40 mt-32">
    <x-start-listing></x-start-listing>
</section>
@endsection