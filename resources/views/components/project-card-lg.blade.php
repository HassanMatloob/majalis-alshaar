<div
    class="xl:col-span-12 sm:col-span-6 col-span-12 hover:shadow-[0px_2px_8px_0px_rgba(99,99,99,0.2)] hover:cursor-pointer rounded-2xl">
    <div class="flex xl:flex-row flex-col">
        <div class="relative swiper-property-images h-[320px] xl:w-[360px] 2xl:w-full overflow-hidden">
            <div class="swiper-wrapper">
                @foreach ($project->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset($image->path) }}" alt="Project Image"
                            class="h-[320px] w-full object-cover rounded-tl-2xl rtl:xl:rounded-tl-none rtl:xl:rounded-tr-2xl rtl:xl:rounded-bl-none rtl:xl:rounded-br-2xl xl:rounded-bl-2xl xl:rounded-tr-none rounded-bl-none rounded-tr-2xl">
                    </div>
                @endforeach
            </div>
            <!-- Add Navigation -->
            <div class="swiper-button-next browse-property-next"></div>
            <div class="swiper-button-prev browse-property-prev"></div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-browse"></div>
            @if($project->is_featured)
            <div class="absolute top-4 right-4 bg-secondary text-white w-[81px] h-[36px] flex justify-center items-center rounded-lg text-sm"
                style="z-index: 1">
                {{ __('translation.featured') }}
            </div>
            @endif
        </div>
        <div
            class="p-8 xl:rounded-tr-2xl rtl:xl:rounded-tr-none xl:rounded-br-2xl rtl:xl:rounded-br-none rtl:xl:rounded-tl-2xl rtl:rounded-bl-2xl xl:rounded-bl-none rounded-bl-2xl rounded-br-2xl border xl:h-[320px] h-auto 2xl:w-full lg:h-[280px]">
            <div class="flex justify-between">
                <p class="px-3 py-1 bg-[#FFE7F1] text-[#B5185A] text-sm font-semibold rounded">
                    {{ $project->category->name }}
                </p>
                <p class="text-black text-base font-normal">{{ $project->created_at->diffForHumans() }}</p>
            </div>
            <p class="text-base text-primary font-bold mt-3">{{ $project->title }}</p>
            <p class="text-xs text-black font-normal mt-[9px]">{{ $project->city }}, {{ $project->country }}</p>
            <div class="flex items-center gap-[18px] mt-4 text-secondary text-xs font-semibold">
                @foreach($project->tags as $tag)
                <div class="flex items-center gap-[6px]">
                    <img src="{{ asset('svgs/scale.svg') }}" class="">
                    <p class="text-xs">{{ $tag }}</p>
                </div>
                @endforeach
            </div>
            <div class="flex lg:gap-7 justify-between mt-9 lg:mt-0 xl:mt-9">
                <div
                    class="flex flex-wrap lg:flex-nowrap items-end gap-2  w-[50%] lg:w-[70%] 2xl:w-[100%] icon-width-375">
                    <a href="tel:{{ config('app.whatsapp_number') }}" target="_blank"
                        class="flex justify-center hover:bg-[#EAEAFF] items-center gap-3 w-[54px] lg:h-[55px] md:h-[40px] h-[55px] button-w-sm border border-primary rounded-lg">
                        <i class="bx bxs-phone text-primary text-[22px]"></i>
                    </a>
                    <a href="https://wa.me/{{ config('app.whatsapp_number') }}" target="_blank"
                        class="flex justify-center hover:bg-[#EAEAFF] items-center gap-3 w-[54px] lg:h-[55px] md:h-[40px] h-[55px] button-w-sm border border-primary rounded-lg">
                        <i class="bx bxl-whatsapp text-primary text-[22px]"></i>
                    </a>
                    <a href="{{ route('project.detail', $project->slug) }}"
                        class="flex sm:flex-row flex-col justify-center hover:bg-primaryHover  items-center gap-3 lg:w-[170px] w-[120px] lg:h-[55px] md:h-[40px] h-[40px] bg-primary text-white text-[15px] font-semibold rounded-lg">
                        {{ __('translation.view details') }}
                    </a>
                </div>
                <div class="">
                    <img src="{{ asset('/images/agencies-logo-122.png') }}"
                        alt="Agency Image" class="w-[90px] sm:h-[90px] h-[75px] images-height-320 rounded-lg">
                </div>
            </div>
        </div>
    </div>
</div>
