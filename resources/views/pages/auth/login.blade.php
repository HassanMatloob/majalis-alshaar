@extends('layouts.app')
@section('content')
<section class="relative text-center text-white h-[868px] bg-cover bg-center" style="background-image: url('{{ asset('/images/login-page.png') }}');">
        <div class="relative z-10 flex flex-col justify-center items-center  h-full">
            <div class="container items-center justify-center">
                <h1 class="lg:text-[56px] sm:text-[40px] text-[36px] font-bold leading-10">{{ __('translation.login-in-to-you-administration-hub') }}</h1>
                <p class="mt-5 sm:text-[24px] text-[20px]">{{ __('translation.unlock your business potential') }}</p>
                <div class="w-full sm:flex justify-center mt-10">
                    <form method="POST" action="{{route('login')}}">
                    @csrf
                        <div class="sm:w-[450px] w-full sm:h-[455px] h-auto bg-white rounded-2xl p-7">
                            @error('invalid')
                            <div class="text-red-500 text-left mb-2">{{ $message }}</div>
                            @enderror
                            @if (session('invalid'))
                                <div class="text-red-500 text-left mb-2">{{ session('invalid') }}</div>
                            @endif
                            @if ($errors->has('invalid'))
                            <div class="text-red-500 text-left mb-2">{{ $errors->first('invalid') }}</div>
                            @endif
                            <div class="w-full p-4 bg-white rounded-2xl border h-[99px]">
                                <label for="email" class="text-sm text-left flex font-semibold text-black">{{ __('translation.email') }}</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('translation.enter your email') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" required autofocus autocomplete="username">
                            </div>
                            @error('email')
                            <div class="text-red-500 text-left mt-2">{{ $message }}</div>
                            @enderror
                            <div class="w-full p-4 mt-5 bg-white rounded-2xl border h-[99px]">
                                <label for="password" class="text-sm text-left flex font-semibold text-black">{{ __('translation.password') }}</label>
                                <input id="password" type="password" name="password" placeholder="{{ __('translation.enter your password') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" required autocomplete="current-password">
                            </div>
                            @error('password')
                            <div class="text-red-500 text-left mt-2">{{ $message }}</div>
                            @enderror
                            <div class="mt-5 flex flex-wrap justify-between items-center">
                                <div class="flex sm:gap-3 gap-2 items-center">
                                    <input type="checkbox" id="custom-checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <p class="text-black sm:text-base text-xs">{{ __('translation.remember me') }}</p>
                                </div>
                                <div>
                                    <a href="{{ route('password.request') }}">
                                        <p class="text-primary sm:text-base text-xs font-semibold">{{ __('translation.forgot password') }} <span class="flip">?</span></p>
                                    </a>
                                </div>
                            </div>
                            <div  class="mt-10">
                                <button type="submit" class="w-full h-[50px] px-full bg-primary hover:bg-primaryHover  rounded-lg text-white text-base font-semibold">{{ __('translation.login') }}</button>
                            </div>
                            {{-- <div class="mt-5">
                                <p class="text-sm font-normal text-black">{{ __('translation.do not have an account') }} <span class="flip">?</span>
                                    <a href="{{ route('register') }}" class="text-primary font-bold text-sm">{{ __('translation.request a new account') }}
                                    </a>
                                </p>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>   
</section>
@endsection