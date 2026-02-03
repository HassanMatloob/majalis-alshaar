
<section class="relative overflow-hidden">
    <div class="swiper-hero-images w-full sm:h-[550px] h-[407px]">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('/images/hero-banner-1.png') }}" alt="Property Image" class="w-full sm:h-[560px] h-[407px] object-cover">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('/images/hero-banner-2.png') }}" alt="Property Image" class="w-full sm:h-[560px] h-[407px] object-cover">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('/images/hero-banner-3.png') }}" alt="Property Image" class="w-full sm:h-[560px] h-[407px] object-cover">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('/images/hero-banner-4.png') }}" alt="Property Image" class="w-full sm:h-[560px] h-[407px] object-cover">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('/images/hero-banner-5.png') }}" alt="Property Image" class="w-full sm:h-[560px] h-[407px] object-cover">
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <div class="absolute inset-0 bg-black bg-opacity-40 pointer-events-none z-10"></div>
    <div class="absolute top-0 md:mt-[200px] mt-[146px] container w-full text-white  flex flex-col justify-center items-center rounded-lg text-sm z-20">
        <h1
        class="text-[43px] lg:text-[64px] md:text-[50px] text-center font-bold sm:leading-[82px] leading-[48px] w-full">
        {{ __('translation.luxury-shade-solutions') }}</h1>
    <p class="sm:text-lg text-xs md:text-2xl mt-4 font-normal sm:leading-[32px] leading-none text-center w-full">
        {{ __('translation.engineered-for-comfort-elegance-and-last-durability') }}</p>
    </div>
</section>