@extends('layouts.app')
@section('content')
<section class="relative text-center text-white h-[868px] bg-cover bg-center" style="background-image: url('{{ asset('/images/login-page.png') }}');">
        <div class="relative z-10 flex flex-col justify-center items-center h-full">
            <div class="container items-center justify-center">
                <h1 class="lg:text-[56px] sm:text-[40px] text-[36px] font-bold leading-10">{{ __('translation.your forgot password') }}</h1>
                <div class="w-full text-center items-center flex justify-center">
                    <p class="mt-5 md:text-[24px] text-base text lg:w-[50%] sm:leading-7">{{ __('translation.please enter your email address. We will send you an email to reset your password') }}</p>
                </div>
                <div class="w-full sm:flex justify-center mt-10">
                    <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                        <div class="sm:w-[450px] w-full h-auto bg-white rounded-2xl p-7">
                            @if(session('status'))
                            <div class="text-green-500 text-left mb-2">{{ session('status') }}</div>
                            @endif
                            <div class="w-full p-4 bg-white rounded-2xl border h-[99px]">
                                <label for="email" class="text-sm text-left flex font-semibold text-black">{{ __('translation.email') }}</label>
                                <input id="email" type="email" name="email" placeholder="{{ __('translation.enter your email') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" value="{{ old('email') }}" required autofocus>
                            </div>
                            @error('email')
                            <div class="text-red-500 text-left mt-2">{{ $message }}</div>
                            @enderror
                            <div  class="mt-10">
                                <button class="w-full h-[50px] bg-primary hover:bg-primaryHover  rounded-lg text-white text-base font-semibold">{{ __('translation.send') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
</section>
@endsection