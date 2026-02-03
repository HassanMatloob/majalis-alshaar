@extends('layouts.app')
@section('content')
<section class="relative text-center text-white lg:h-[244px] h-auto bg-cover bg-center" style="background-image: url('{{ asset('/images/residential-banner.png') }}');">
    <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 flex flex-col h-full">
            <div class="mt-[70px] lg:mb-0 mb-5 container  items-start justify-start sm:text-left">
                <h1 class="lg:text-[40px] xl:text-[56px] md:w-[80%] w-full sm:text-[30px] text-[21px] font-bold lg:leading-[57px] leading-normal rtl:text-right">{{ __('translation.lorem ipsum dolor sit amet consectetur adipiscing') }}</h1>
                <p class="mt-3 text-sm font-medium rtl:text-right">{{ __('translation.published') }}: 12/07/2024</p>
            </div>
        </div>   
</section>
<section class="mt-14 container">
    <h1 class="text-[22px] font-bold text-black">{{ __('translation.lorem ipsum dolo') }}</h1>
    <p class="mt-6">{{ __('translation.lorem ipsum dolor sit amet consectetur adipiscing eli mattis sit phasellus mollis sit aliquam sit nullam neque ultrices.') }}</p>
</section>
<section class="mt-14 container">
    <h1 class="text-[22px] font-bold text-black">{{ __('translation.lorem ipsum dolo') }}</h1>
    <p class="mt-6">{{ __('translation.lorem ipsum dolor sit amet consectetur adipiscing eli mattis sit phasellus mollis sit aliquam sit nullam neque ultrices.') }}</p>
</section>
<section class="container mt-14">
    <img src="/images/media-details.png" alt="" class="w-full h-full">
</section>
<section class="mt-14 container">
    <h1 class="text-[22px] font-bold text-black">{{ __('translation.lorem ipsum dolo') }}</h1>
    <p class="mt-6">{{ __('translation.lorem ipsum dolor sit amet consectetur adipiscing eli mattis sit phasellus mollis sit aliquam sit nullam neque ultrices.') }}</p>
</section>
<section class="mt-14 container">
    <h1 class="text-[22px] font-bold text-black">{{ __('translation.lorem ipsum dolo') }}</h1>
    <p class="mt-6">{{ __('translation.lorem ipsum dolor sit amet consectetur adipiscing eli mattis sit phasellus mollis sit aliquam sit nullam neque ultrices.') }}</p>
    <p class="mt-5">{{ __('translation.lorem ipsum dolor sit amet consectetur adipiscing eli mattis sit phasellus mollis sit aliquam sit nullam neque ultrices.') }}</p>
    <p class="mt-5">{{ __('translation.lorem ipsum dolor sit amet consectetur adipiscing eli mattis sit phasellus mollis sit aliquam sit nullam neque ultrices.') }}</p>
</section>
<section class="mt-32 container mb-[139px]">
    <h1 class="text-[32px] font-bold text-black">{{ __('translation.related news') }}</h1>
    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
        @foreach ([1, 2, 3,] as $index)
        <div class="flex  flex-col  h-auto hover:shadow-[0px_2px_8px_0px_rgba(99,99,99,0.2)] rounded-2xl hover:cursor-pointer">
            <div class=" w-full  h-[202px]  overflow-hidden">
                <img src="{{ asset('/images/media-center-2.png') }}" alt="Property Image"
                class="w-full object-cover h-full rounded-tl-2xl rounded-tr-2xl  rounded-l-none">
            </div>
            <div class="p-4 rounded-bl-2xl  rounded-br-2xl border">
                <p class="text-[20px] font-semibold text-primary leading-[26px]">{{ __('translation.lorem ipsum dolor sit amet consectetur adipiscing') }}</p>
                <p class="text-sm text-black font-normal leading-[24px] mt-4">{{ __('translation.lorem ipsum dolor sit amet consectetur adipiscing eli mattis sit phasellus mollis sit aliquam sit nullam neque ultrices.') }}</p>
                <div class="flex  justify-between mt-4">
                    <div class="flex items-center gap-3">
                        <p class="text-xs text-secondary font-semibold">{{ __('translation.brian clark') }}</p>
                        <hr class="w-[12px]">
                        <p class="text-xs text-secondary font-semibold">{{ __('translation.jan 24, 2024') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection