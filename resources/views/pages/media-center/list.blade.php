@extends('layouts.app')
@section('content')
<section class="relative text-center text-white lg:h-[243px] h-auto bg-cover bg-center" style="background-image: url('{{ asset('/images/residential-banner.png') }}');">
    <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 flex flex-col  h-full">
            <div class="mt-[130px] lg:mb-0 mb-5 container flex items-start">
                <h1 class="md:text-[56px] text-[30px] font-bold">{{ __('translation.media center') }}</h1>
            </div>
        </div>   
</section>
<section class="container mt-[72px]">
    <h1 class="text-[32px] font-bold text-black">{{ __('translation.recent posts') }}</h1>
    <x-media-center-blogs></x-media-center-blogs>
</section>
<section class="mt-[72px] container mb-[106px]">
    <h1 class="text-[32px] font-bold text-black">Blog List</h1>
    <div class="grid xl:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 grid-cols-1 gap-[47px] mt-8">
        @foreach ([1, 2, 3, 4, 5, 6,] as $index)
       <a href="{{ route('media.detail', ['media' => 1]) }}">
        <x-media-blog-list></x-media-blog-list>
       </a>
       @endforeach
    </div>
</section>
@endsection