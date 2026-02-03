<div class="relative bg-cover bg-center xl:h-[188px] h-auto" style="background-image: url('{{ asset('images/register-now-bg.png') }}');">
    <div class="absolute inset-0 bg-black opacity-60"></div>
    <div class="container relative flex sm:flex-row flex-col sm:justify-between gap-5 sm:pb-0 pb-6 pt-6 items-center  h-full  text-white">
        <h1 class="md:text-[26px] lg:text-[32px]  text-[20px] flex text-center sm:text-start font-bold lg:leading-[41px] lg:max-w-[40%] sm:max-w-[50%]">
            {{ __('translation.elevating-spaces-with-innovative-outdoor-solutions') }}
        </h1>
        <a href="https://wa.me/{{ config('app.whatsapp_number') }}" target="_blank" 
            class="inline-flex gap-2 bg-primary hover:bg-primaryHover text-white font-semibold  lg:w-[311px] w-[250px] h-[50px] lg:h-[75px] flex justify-center items-center rounded-lg md:text-[18px] text-sm">
            <i class="bx bxl-whatsapp text-xl"></i>
            {{ __('translation.talk-to-us-now') }}
        </a>
    </div>
</div> 