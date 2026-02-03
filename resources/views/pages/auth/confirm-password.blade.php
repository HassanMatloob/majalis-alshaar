@extends('layouts.app')
@section('content')
<section class="relative text-center text-white h-[868px] bg-cover bg-center" style="background-image: url('{{ asset('/images/login-page.png') }}');">
        <div class="relative z-10 flex flex-col justify-center items-center h-full">
            <div class="container items-center justify-center">
                <h1 class="lg:text-[56px] sm:text-[40px] text-[36px] font-bold leading-10">{{ __('translation.confirm password') }}</h1>
                <div class="w-full text-center items-center flex justify-center">
                    <p class="mt-5 md:text-[24px] text-base text lg:w-[50%] sm:leading-7">{{ __('translation.this is a secure area of the application. Please confirm your password before continuing.') }}</p>
                </div>
                <div class="w-full flex justify-center mt-10">
                    <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                        <div class="sm:w-[450px] w-full h-auto bg-white rounded-2xl p-7">

                            <!-- Password -->
                            <div class="w-full p-4 mt-5 bg-white rounded-2xl border h-[99px]">
                                <label for="password" class="text-sm text-left flex font-semibold text-black">{{ __('translation.password') }}</label>
                                <input id="password" type="password" name="password" placeholder="{{ __('translation.enter your current password') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" required autocomplete="current-password">
                            </div>
                            @error('password')
                            <div class="text-red-500 text-left mt-2">{{ $message }}</div>
                            @enderror

                            <div  class="mt-10">
                                <button class="w-full h-[50px] bg-primary hover:bg-primaryHover  rounded-lg text-white text-base font-semibold">{{ __('translation.confirm') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
</section>
@endsection