@extends('layouts.app')
@section('content')
<section class="relative text-center text-white lg:h-[243px] h-auto bg-cover bg-center" style="background-image: url('{{ asset('/images/residential-banner.png') }}');">
    <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 flex flex-col  h-full">
            <div class="mt-[130px] lg:mb-0 mb-5 container flex items-start">
                <h1 class="md:text-[56px] text-[30px] font-bold">{{ __('translation.contact-us') }}</h1>
            </div>
        </div>   
</section>
<section class="mt-[113px] container">
    <div class="grid grid-cols-12 lg:gap-10">
        <div class="lg:col-span-4 col-span-12">
            <h1 class="text-black text-[32px] font-semibold">{{ __('translation.contacts') }}</h1>
            <div class="relative lg:h-[706px]  bg-[#F8F9FA] rounded-2xl mt-10 p-[30px]">
                <div>
                    <a href="mailto:hello@majalialshaar.com" target="_blank" class="text-primary font-semibold xl:text-[20px] lg:text-[18px] sm:text-[20px] text-base">hello@majalialshaar.com</a>
                </div>
                <div class="mt-3">
                    <a href="tel:{{ config('app.whatsapp_number') }}" target="_blank" class="text-primary font-semibold  xl:text-[20px] lg:text-[18px] sm:text-[20px] text-base">{{ config('app.whatsapp_number') }}</a>
                </div>
                <div>
                    <h1 class="mt-12 font-semibold text-black  xl:text-[20px] lg:text-[18px] sm:text-[20px] text-base">{{ __('translation.headquarters address') }}</h1>
                    <p class="mt-4 text-black font-normal  xl:text-[20px] lg:text-[18px] sm:text-[20px] text-base">{{ __('translation.company-address') }}</p>
                </div>
                <div class="lg:absolute lg:bottom-7 bottom-0 lg:mt-0 mt-8">
                    <h1 class="text-[18px] font-normal text-black">{{ __('translation.follow us') }}</h1>
                    <div class="mt-4 flex gap-4">
                        <div class="w-[32px] h-[32px] bg-primary hover:bg-primaryHover cursor-pointer flex justify-center items-center rounded">
                            <i class='bx bxl-facebook text-[18px] text-white'></i>
                        </div>
                        <div class="w-[32px] h-[32px] bg-primary hover:bg-primaryHover cursor-pointer flex justify-center items-center rounded">
                            <i class='bx bxl-instagram-alt text-[18px] text-white'></i>
                        </div>
                        <div class="w-[32px] h-[32px] bg-primary hover:bg-primaryHover cursor-pointer flex justify-center items-center rounded">
                            <i class='bx bxl-linkedin text-[18px] text-white'></i>
                        </div>
                        <div class="w-[32px] h-[32px] bg-primary hover:bg-primaryHover cursor-pointer flex justify-center items-center rounded">
                            <i class='bx bxl-twitter text-[18px] text-white'></i>
                        </div>
                        <div class="w-[32px] h-[32px] bg-primary hover:bg-primaryHover cursor-pointer flex justify-center items-center rounded">
                            <i class='bx bxl-youtube text-[18px] text-white' ></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-8 col-span-12 lg:mt-0 mt-10">
            <h1 class="text-black text-[32px] font-semibold">{{ __('translation.get in touch') }}</h1>
            <x-submit-form route='contact'></x-submit-form>
        </div>
    </div>
</section>
<section class="mt-28 container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3813.165363771878!2d42.670823999999996!3d17.113431199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15fd51f0a14fa9d1%3A0xb0fafa87b0cdc4c1!2z2YXYudix2LYg2KzZitiy2KfZhiDZhNmE2K7Zitin2YUg2Ygg2KjZitmI2Kog2KfZhNi02LnYsSDZhdi42YTYp9iq!5e0!3m2!1sen!2s!4v1781330494563!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<section class="mt-28">
    <x-start-listing></x-start-listing>
</section>
@endsection