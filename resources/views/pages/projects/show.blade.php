@extends('layouts.app')
@section('content')
<style>
    .location > iframe {
        width: 100%;
        border-radius: 1rem;
    }
</style>
<section class="container">
    <hr class="">
</section>
<section class="mt-8 container">
    <div class="flex gap-[6px] items-center">
        <a href="{{ route('projects') }}" class="text-xs font-semibold text-primary">{{ __('translation.projects') }}</a>
        <p class=" font-medium text-xs text-black">/</p>
        <p class="text-black font-medium text-xs">{{ __('translation.project-detail') }}</p>
    </div>
</section>
<section class="mt-8 container">
        <div class="swiper thumbnailswiper">
            <div class="swiper-wrapper main">
                @foreach($project->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset($image->path) }}" alt="Project Image" />
                    </div>
                @endforeach
            </div>
        </div>
        <div class=" bg-[#F8F9FA] rounded-2xl p-6 sm:mt-9 mt-16 flex items-center">
            <div class="swiper thumbnailswiperslider thumbnail-slider" style="margin-left: 0px">
                <div class="swiper-wrapper overflow-x-auto scroll-bar">
                    @foreach($project->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset($image->path) }}" alt="Project Image" />
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="absolute left-sm-mobile sm:left-[80%] md:left-[75%] lg:left-[80%] xl:left-[83%] left-[55%] flex w-[130px] sm:mt-10 mt-[-140px]">
                <div class="swiper-button-next thumbnail-swipper-next"></div>
                <div class="swiper-pagination font-semibold lg:text-[20px] text-base"></div>
                <div class="swiper-button-prev thumbnail-swipper-prev"></div>
            </div>
        </div>
</section>
<section class="mt-11 container">
    <div class="flex gap-[10px]">
        <span class="bg-[#EAEAFF] cursor-auto rounded-lg text-primary font-semibold px-3 py-1">@if($project->is_featured) {{ __('translation.featured') }} @endif</span>
        <span class="bg-[#FFE5F9] cursor-auto rounded-lg text-[#811269] font-semibold px-2 py-1">{{ $project->category->name }}</span>
    </div>
</section>
<section class="container mt-5">
    <div class="grid grid-cols-12 xl:gap-10">
        <div class="xl:col-span-8 col-span-12">
            <div>
                <h1 class="text-black font-bold text-[32px] ">{{ $project->title }}</h1>
                <p class="text-black font-normal mt-1 text-[20px]">{{ $project->city }}</p>
                <p class="text-base font-medium mt-1 text-primary">{{ $project->province }}, {{ $project->country }}</p>
            </div>
            <div class="mt-7 flex gap-8 text-secondary">
                @foreach($project->tags as $tag)
                <div class="flex">
                    <i class="bx bx-tag bx-flip-horizontal"></i>
                    <p class="ml-2 font-medium leading-none text-[16px]">{{ $tag }}</p>
                </div>
                @endforeach
            </div>
            <div class="mt-10">
                <h1 class="font-semibold text-2xl">{{ __('translation.description') }}</h1>
                <div class="mt-8">
                    {!! $project->description !!}
                </div>
            </div>
        </div>
        <div class="xl:col-span-4 col-span-12">
            <div class="xl:float-right float-left">
            <div class="xl:mt-[-71px] mt-10 bg-[#F8F9FA] sm:w-[408px] h-[282px] rounded-2xl">
                <div class="px-[32px] py-[20px]">
                    <h1 class="text-black font-semibold text-2xl">{{ __('translation.get in touch') }}</h1>
                    <button class="mt-7 sm:w-[344px] hover:bg-primaryHover  w-full h-[50px] flex bg-primary rounded-lg text-white gap-4 items-center text-center justify-center">
                        <i class="bx bxs-phone text-[22px]"></i>
                        <p class="text-base font-semibold text-white">{{ config('app.whatsapp_number') }}</p>
                    </button>
                    <button class="mt-4 sm:w-[344px] hover:bg-primaryHover  w-full h-[50px] flex bg-primary rounded-lg text-white gap-4 items-center text-center justify-center">
                        <i class="bx bxl-whatsapp text-[22px]"></i>
                        <p class="text-base font-semibold text-white">{{ config('app.whatsapp_number') }}</p>
                    </button>
                    <button class="mt-4 sm:w-[344px] hover:bg-primaryHover  w-full h-[50px] flex bg-primary rounded-lg text-white gap-2 items-center text-center justify-center">
                        <i class="bx bx-envelope sm:text-[22px] text-[20px]"></i>
                        <p class="sm:text-base text-sm font-semibold text-white">hello@majalialshaar.com</p>
                    </button>
                </div>
            </div> 
            <div class="mt-[30px] sm:w-[409px] h-[120px] border rounded-2xl px-[20px] hover:shadow-[0px_2px_8px_0px_rgba(99,99,99,0.2)]">
               <div class="flex justify-between mt-4 items-center">
                    <div>
                        <h1 class="text-[20px] font-semibold text-primary w-[100%] leading-none">{{ __('translation.warsha-jawda-alqima') }}</h1>
                        <p class="mt-3 text-xs font-normal">Jazan, KSA</p>
                    </div>
                    <div>
                        <img src="{{ asset('/images/agencies-logo-122.png') }}" alt="Agency Image" class="rounded-2xl w-[100px] h-[85px]">
                    </div>
               </div>
            </div>
            </div>              
        </div>  
    </div>
</section>
@if(isset($project->property_location))
<section class="mt-10 container">
    <h1 class="text-black font-bold text-2xl">{{ __('translation.location') }}</h1>
    <div class="mt-8 location">
        {!!$project->property_location!!}
    </div>
</section>
@endif
@if($similarProjects->isNotEmpty())
<section class="container mx-auto mt-10">
    <h1 class="sm:text-[32px] text-2xl font-bold text-black">{{ __('translation.similar-projects-in-area') }}</h1>
    <div class="relative mt-8">
        <div class="swiper-featured-properties overflow-hidden p-1">
            <div class="swiper-wrapper">
               @foreach ($similarProjects as $similarProject)
                    <div class="swiper-slide">
                        <a href="{{ route('project.detail', $similarProject->slug) }}">
                            <x-project-card :project="$similarProject"></x-project-card>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-navigation-sm">
                <div class="swiper-button-next featured-section-next right-to-left-next"></div>
                <div class="swiper-button-prev featured-section-prev right-to-left-prev"></div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="xl:mt-28 mt-16">
    <x-start-listing></x-start-listing>
</section>
@endsection