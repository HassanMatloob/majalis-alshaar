<div class="mx-auto">
    <div class="w-full lg:h-[244px] h-auto bg-primary">
        <div class="grid grid-cols-12 container mx-auto">
            <div class="md:col-span-8 lg:col-span-9 xl:col-span-10 col-span-12 mt-12">
            <a href="{{ route('home') }}"><img src="{{ asset('images/majalis-alshaar-logo-white.png') }}" alt="" class="w-[100px]"></a>
                <div class="flex flex-wrap gap-3 lg:gap-5 text-white mt-8">
                    <p class="text-sm font-normal">{{ __('translation.locations:') }}</p>
                    <p class="text-sm font-bold">{{ __('translation.Jazan') }}</p>
                    <p class="text-sm font-bold">{{ __('translation.Abha') }}</p>
                    <p class="text-sm font-bold">{{ __('translation.Riyadh') }}</p>
                    <p class="text-sm font-bold">{{ __('translation.Jeddah') }}</p>
                    <p class="text-sm font-bold">{{ __('translation.Dammam') }}</p>
                    <p class="text-sm font-bold">{{ __('translation.Madinah') }}</p>
                </div>
            </div>
            <div class="md:col-span-4 lg:col-span-3 xl:col-span-2 col-span-12 md:mt-20 mt-10">
                <h1 class="text-white font-normal text-[18px]">{{ __('translation.follow us') }}</h1>
                <div class="mt-5 flex gap-4">
                    <div class="w-[32px] h-[32px] bg-white hover:bg-[#EAEAFF] cursor-pointer flex justify-center items-center rounded">
                        <i class='bx bxl-facebook text-[18px] text-primary'></i>
                    </div>
                    <div class="w-[32px] h-[32px] bg-white hover:bg-[#EAEAFF] cursor-pointer flex justify-center items-center rounded">
                        <i class='bx bxl-instagram-alt text-[18px] text-primary'></i>
                    </div>
                    <div class="w-[32px] h-[32px] bg-white hover:bg-[#EAEAFF] cursor-pointer flex justify-center items-center rounded">
                        <i class='bx bxl-linkedin text-[18px] text-primary'></i>
                    </div>
                    <div class="w-[32px] h-[32px] bg-white hover:bg-[#EAEAFF] cursor-pointer flex justify-center items-center rounded">
                        <i class='bx bxl-twitter text-[18px] text-primary'></i>
                    </div>
                    <div class="w-[32px] h-[32px] bg-white hover:bg-[#EAEAFF] cursor-pointer flex justify-center items-center rounded">
                        <i class='bx bxl-youtube text-[18px] text-primary' ></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto opacity-20">
            <hr class="mt-[14px]">
        </div>
        <div class="flex flex-wrap gap-2 container mx-auto text-white mt-6">
            <p class="text-sm font-bold">{{ __('translation.privacy policy') }}</p>
            <p class="text-sm font-bold">{{ __('translation.terms & conditions') }}</p>
            <p class="text-sm font-normal lg:mb-0 mb-5">© {{ date('Y') }} {{ __('translation.majalisalshaar all rights reserved. developed by') }} <a href="https://www.instagram.com/hassanmatloob1.0" target="_blank" class="text-sm font-bold">Hassan Matloob</a></p>
        </div>
    </div>
</div>