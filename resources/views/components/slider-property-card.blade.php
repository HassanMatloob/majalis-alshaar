

<div class="overflow-hidden hover:shadow-[0px_2px_8px_0px_rgba(99,99,99,0.2)] rounded-2xl hover:cursor-pointer">
    <div class="relative">
        <div class=" swiper-property-images outline-property w-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('/images/featured-property-1.png') }}" alt="Property Image" class="w-full h-[200px] object-cover rounded-t-2xl">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('/images/featured-property-2.png') }}" alt="Property Image" class="w-full h-[200px] object-cover rounded-t-2xl">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('/images/browse-property-1.png') }}" alt="Property Image" class="w-full h-[200px] object-cover rounded-t-2xl">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('/images/browse-property-0.png') }}" alt="Property Image" class="w-full h-[200px] object-cover rounded-t-2xl">
                </div>
            </div>
            <!-- Add Navigation -->
            <div class="swiper-button-next browse-property-next"></div>
            <div class="swiper-button-prev browse-property-prev"></div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-browse"></div>
        </div>
        <!-- For rent -->
        <div class="absolute top-4 right-4 bg-secondary text-white w-[81px] h-[36px] flex justify-center items-center rounded-lg text-sm" style="z-index: 1">
            {{ __('translation.for rent') }}
        </div>
    </div>
    <div class="p-4 rounded-b-2xl border overflow-hidden">
        <p class="text-2xl font-bold text-primary">480,000 <span class="text-[18px] font-normal text-black">{{ __('translation.AED') }}</span></p>
        <p class="text-base text-primary font-bold mt-3">{{ __('translation.furnished villa with sea view') }}</p>
        <p class="text-xs text-black font-normal mt-[9px]">{{ __('translation.Dubai, UAE') }}</p>
        <div class="flex items-center gap-[18px] mt-4 text-secondary text-xs font-semibold">
            <div class="flex items-center gap-[6px]">
                <img src="{{ asset('svgs/bed.svg') }}" alt="Property Image" class="">
                <p class="text-xs">4</p>
            </div>
            <div class="flex items-center gap-[6px]">
                <img src="{{ asset('svgs/bath.svg') }}" alt="Property Image" class="">
                <p class="text-xs">4</p>
            </div>
            <div class="flex items-center gap-[6px]">
                <img src="{{ asset('svgs/scale.svg') }}" alt="Property Image" class="">
                <p class="text-xs">1250 sqm</p>
            </div>
        </div>
    </div>
    
</div>  