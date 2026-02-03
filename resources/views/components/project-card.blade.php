<div class="hover:shadow-[0px_2px_8px_0px_rgba(99,99,99,0.2)] rounded-2xl hover:cursor-pointer">
    <div class="relative">
        <div class="relative swiper-property-images h-auto 2xl:w-full overflow-hidden">
            <div class="swiper-wrapper">
                @foreach ($project->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset($image->path) }}" alt="Project Image"
                            class="w-full h-[200px] object-cover rounded-t-2xl">
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
    </div>

    <div class="p-4 rounded-b-2xl border">
        <span
            class="text-xs bg-successed text-success font-semibold p-2 rounded">
            {{$project->category->name}}
        </span>
        <p class="text-base text-primary font-semibold mt-3">{{ $project->title }}</p>
        <p class="text-xs text-black font-normal mt-[9px]">{{ $project->city }},
            {{ $project->country }}</p>
        <div class="flex items-center gap-[18px] mt-4 text-secondary text-xs font-semibold">
            @foreach($project->tags as $key => $tag)
            @if($key < 3)
            <div class="flex items-center gap-[6px]">
                <i class="bx bx-tag bx-flip-horizontal"></i>
                <p class="text-xs">{{ $tag }}</p>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
