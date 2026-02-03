@extends('layouts.app')
@section('content')
<section class="container">
    <hr class="">
</section>
<section class="mt-8 container">
    <div class="flex gap-[6px] items-center">
        <a href="{{ route('properties') }}" class="text-xs font-semibold text-primary">{{ __('translation.properties') }}</a>
        <p class=" font-medium text-xs text-black">/</p>
        <p class="text-black font-medium text-xs">{{ __('translation.property detail') }}</p>
    </div>
</section>
<section class="mt-8 container">
        <div class="swiper thumbnailswiper">
            <div class="swiper-wrapper main">
                @foreach($property->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset($image->path) }}" alt="Property Image" />
                    </div>
                @endforeach
            </div>
        </div>
        <div class=" bg-[#F8F9FA] rounded-2xl p-6 sm:mt-9 mt-16 flex items-center">
            <div class="swiper thumbnailswiperslider thumbnail-slider" style="margin-left: 0px">
                <div class="swiper-wrapper overflow-x-auto scroll-bar">
                    @foreach($property->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset($image->path) }}" alt="Property Image" />
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
        <span class="bg-[#EAEAFF] cursor-auto rounded-lg text-primary font-semibold px-3 py-1">@if($property->type == 'Rent') {{ __('translation.for rent') }} @elseif($property->type == 'Sell') {{ __('translation.for sale') }} @endif</span>
        <span class="bg-[#FFE5F9] cursor-auto rounded-lg text-[#811269] font-semibold px-2 py-1">{{ $property->category->name }}</span>
    </div>
</section>
<section class="container mt-5">
    <div class="grid grid-cols-12">
        <div class="xl:col-span-8 col-span-12">
            <div>
                <h1 class="text-black font-bold text-[32px] ">{{ $property->title }}</h1>
                <p class="text-black font-normal mt-1 text-[20px]">{{ $property->property_location }}, {{ $property->city }}</p>
                <p class="text-base font-medium mt-1 text-primary">{{ $property->state }}, {{ $property->country }}</p>
            </div>
            <div class="mt-7 flex gap-8">
                <div>
                    <img src="/svgs/bed.svg" alt="" class="w-[22px] h-[19px]">
                    <p class="text-secondary mt-2 font-medium text-[18px]">{{ $property->bedrooms }} Bedrooms</p>
                </div>
                <div>
                    <img src="/svgs/bath.svg" alt=""  class="w-[22px] h-[19px]">
                    <p class="text-secondary mt-2 font-medium text-[18px]">{{ $property->bathrooms }} Bathrooms</p>
                </div>
                <div>
                    <img src="/svgs/scale.svg" alt=""  class="w-[22px] h-[19px]">
                    <p class="text-secondary mt-2 font-medium text-[18px]">{{ $property->area }} sqm</p>
                </div>
            </div>
        </div>
        <div class="xl:col-span-4 col-span-12">
            <div>
                <p class="font-semibold text-[40px] xl:justify-end justify-start flex xl:mt-0 mt-5">{{number_format($property->price, 0)}} <span class="text-[32px] mt-3 ml-1 font-normal">{{ $property->currency }}</span></p>
            </div> 
        </div>
    </div>
    <div class="grid grid-cols-12 xl:gap-10">
        <div class="xl:col-span-8 col-span-12">
            <div class="mt-10">
                <h1 class="font-semibold text-2xl">{{ __('translation.description') }}</h1>
                <div class="mt-8">
                    {!! $property->description !!}
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
                        <p class="text-base font-semibold text-white">{{ $property->agent->phone_number }}</p>
                    </button>
                    <button class="mt-4 sm:w-[344px] hover:bg-primaryHover  w-full h-[50px] flex bg-primary rounded-lg text-white gap-4 items-center text-center justify-center">
                        <i class="bx bxl-messenger text-[22px]"></i>
                        <p class="text-base font-semibold text-white">{{ $property->agent->phone_number }}</p>
                    </button>
                    <button class="mt-4 sm:w-[344px] hover:bg-primaryHover  w-full h-[50px] flex bg-primary rounded-lg text-white gap-2 items-center text-center justify-center">
                        <i class="bx bx-envelope sm:text-[22px] text-[20px]"></i>
                        <p class="sm:text-base text-sm font-semibold text-white">{{ $property->agent->email }}</p>
                    </button>
                </div>
            </div> 
            <div class="mt-[30px] sm:w-[409px] h-[120px] border rounded-2xl px-[20px] hover:shadow-[0px_2px_8px_0px_rgba(99,99,99,0.2)]">
               <div class="flex justify-between mt-4 items-center">
                    <div>
                        <h1 class="text-[20px] font-semibold text-primary w-[95%] leading-none">{{ $property->agent->agency->agency_name }}</h1>
                        <p class="mt-3 text-xs font-normal">{{ $property->agent->agency->city }}, {{ $property->agent->agency->country }}</p>
                    </div>
                    <div>
                        <img src="{{ asset('uploads/agencies/logos/' . $property->agent->agency->image) }}" alt="Agency Image" class="rounded-2xl w-[100px] h-[85px]">
                    </div>
               </div>
            </div>
            </div>              
        </div>  
    </div>
</section>
<section class="container mx-auto mt-10">
    <h1 class="sm:text-[32px] text-2xl font-bold text-black">{{ __('translation.similar properties In area') }}</h1>
    <div class="relative mt-8">
        <div class="swiper-featured-properties overflow-hidden p-1">
            <div class="swiper-wrapper">
                @foreach ([1, 2, 3, 4, 5, 6] as $index)
                    <div class="swiper-slide">
                        {{-- <x-property-card :index='$index'></x-property-card> --}}
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
<section class="mt-10 container">
    <h1 class="text-black font-bold text-[32px]">{{ __('translation.location') }}</h1>
    <div class="mt-8">
        <iframe class="w-full rounded-2xl"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.64880575195!2d-122.4194153064925!3d37.7749295096503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808580d64f4d186f%3A0x7f07e19a43f81275!2sSan%20Francisco%2C%20CA%2C%20USA!5e0!3m2!1sen!2sin!4v1623798089351!5m2!1sen!2sin"
            height="400" style="border:0;" loading="lazy"></iframe>
    </div>
</section>
<section class="xl:mt-28 mt-16">
    <x-start-listing></x-start-listing>
</section>
@endsection