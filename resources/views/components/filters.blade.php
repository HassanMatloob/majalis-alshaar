<div class="grid grid-cols-12 gap-4 items-center" x-data="{ modelOpen: false }">
    <div class="col-span-12 items-center md:col-span-6 @if($route == 'properties')lg:col-span-2 @elseif($route == 'agencies')lg:col-span-5 @else lg:col-span-4 @endif  sm:border-r">
        <div class="flex gap-2 items-center justify-center">
            <i class='bx bx-search searching-icons text-primary'></i>
            <input type="text" id="search" placeholder="{{ __('translation.search with keywords') }}"
            class="w-full text-black text-sm focus:outline-none rounded h-[52px] sm:h-full">
            <i class='bx bx-search text-primary searching-icons-sm bg-[#EAEAFF] p-2 rounded-full'  @click="modelOpen =!modelOpen"></i> 
       </div>
    </div>
    @if($route == 'properties')
    <div class="col-span-12 md:col-span-6 lg:col-span-2 sm:border-r sm:block hidden">
        <div class="custom-dropdown-container">
            <div class="select-menu">
                <div class="select-btn">
                    <span class="sBtn-text text-sm text-black opacity-50">{{ __('translation.buy/rent') }}</span>
                    <i class='bx bx-caret-down'></i>
                </div>
                <ul class="options scroll-bar z-10">
                    <li class="option">
                        <span class="option-text text-primary ">{{ __('translation.buy') }}</span>
                    </li>
                    <li class="option">
                        <span class="option-text text-primary ">{{ __('translation.rent') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    @if($route !== 'agencies')
    <div class="col-span-12 md:col-span-6 lg:col-span-2 sm:border-r sm:block hidden">
        <div class="custom-dropdown-container">
            <div class="select-menu">
                <div class="select-btn">
                    <span class="sBtn-text text-sm text-black opacity-50">{{ __('translation.categories') }}</span>
                    <i class='bx bx-caret-down'></i>
                </div>
                <ul class="options scroll-bar z-10">
                    <li class="option residential-filters">
                        <span class="option-text text-primary ">{{ __('translation.residential') }}</span>
                    </li>
                    <li class="option commercial-filters">
                        <span class="option-text text-primary ">{{ __('translation.commercial') }}</span>
                    </li>
                    <li class="option hotel-filters">
                        <span class="option-text text-primary ">{{ __('translation.hotel') }}</span>
                    </li>
                    <li class="option development-filters">
                        <span class="option-text text-primary ">{{ __('translation.new development') }}</span>
                    </li>
                    <li class="option">
                        <span class="option-text text-primary">{{ __('translation.restaurents') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    <div class="col-span-12 md:col-span-6 @if($route == 'agencies')lg:col-span-5 @else lg:col-span-2 @endif sm:border-r sm:block hidden">
        <div class="custom-dropdown-container">
            <div class="select-menu">
                <div class="select-btn">
                    <span class="sBtn-text text-sm text-black opacity-50">{{ __('translation.location') }}</span>
                    <i class='bx bx-caret-down'></i>
                </div>
                <ul class="options scroll-bar z-10">
                    <li class="option">
                        <span class="option-text text-primary">{{ __('translation.sharja') }}</span>
                    </li>
                    <li class="option">
                        <span class="option-text text-primary">{{ __('translation.abu dhabi') }}</span>
                    </li>
                    <li class="option">
                        <span class="option-text text-primary">{{ __('translation.ajman') }}</span>
                    </li>
                    <li class="option">
                        <span class="option-text text-primary">{{ __('translation.oman') }}</span>
                    </li>
                    <li class="option">
                        <span class="option-text text-primary">{{ __('translation.al ain') }}</span>
                    </li>
                    <li class="option">
                        <span class="option-text text-primary">{{ __('translation.ras al-khaimah') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @if($route !== 'agencies')
    <div class="col-span-12 md:col-span-6 lg:col-span-2 sm:block hidden">
        <div>
            <div class="w-full gap-3 p-2 rounded flex items-center cursor-pointer justify-start">
                <img src="/svgs/filter-home.svg" alt="">
                <p class="text-black font-semibold text-sm" @click="modelOpen =!modelOpen">{{ __('translation.more filters') }}</p>
            </div> 
        </div>
    </div>
    @endif
    <div class="col-span-12 lg:col-span-2 sm:block hidden">
        <button class="w-full  @if($route == 'home') bg-primary text-white hover:bg-primaryHover @else text-primary bg-[#EAEAFF]  @endif duration-150 ease-out  h-[54px] rounded-lg">{{ __('translation.search') }}</button>
    </div>
   <x-more-filters-popup/>
</div>
<div class="flex-wrap gap-1 mt-4 filter-section hidden">
    <button
        class="filter-button w-[147px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.furnished apartment') }}</p>
    </button>
    <button
        class="filter-button w-[86px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.apartment') }}</p>
    </button>
    <button
        class="filter-button w-[64px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.houses') }}</p>
    </button>
    <button
        class="filter-button w-[52px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.villas') }}</p>
    </button>
    <button
        class="filter-button w-[86px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.banglows') }}</p>
    </button>
    <button
        class="filter-button w-[93px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.town house') }}</p>
    </button>
    <button
        class="filter-button w-[89px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.compound') }}</p>
    </button>
    <button
        class="filter-button w-[80px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.top roof') }}</p>
    </button>
    <button
        class="filter-button w-[71px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.bulk unit') }}</p>
    </button>
    <button
        class="filter-button w-[80px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.hold floor') }}</p>
    </button>
    <button
        class="filter-button w-[77px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.bulk land') }}</p>
    </button>
    <button
        class="filter-button w-[84px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.farm land') }}</p>
    </button>
</div>
<div class="flex-wrap gap-1 mt-4 filter-section-2 hidden">
    <button
        class="filter-button w-[89px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.warehouse') }}</p>
    </button>
    <button
        class="filter-button w-[90px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.shops') }}</p>
    </button>
    <button
        class="filter-button w-[72px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.garages') }}</p>
    </button>
    <button
        class="filter-button w-[62px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.offices') }}</p>
    </button>
    <button
        class="filter-button w-[85px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.showroom') }}</p>
    </button>
    <button
        class="filter-button w-[115px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.retail spaces') }}</p>
    </button>
    <button
        class="filter-button w-[80px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.hold floor') }}</p>
    </button>
    <button
        class="filter-button w-[77px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.bulk unit') }}</p>
    </button>
    <button
        class="filter-button w-[77px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.bulk land') }}</p>
    </button>
    <button
        class="filter-button w-[85px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.land bolds') }}</p>
    </button>
    <button
        class="filter-button w-[84px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.farm land') }}</p>
    </button>
</div>
<div class="flex-wrap gap-1 mt-4 filter-section-3 hidden">
    <button
        class="filter-button w-[51px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.hotel') }}</p>
    </button>
    <button
        class="filter-button w-[153px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.furnished apartment') }}</p>
    </button>
    <button
        class="filter-button w-[116px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.bed & breakfast') }}</p>
    </button>
    <button
        class="filter-button w-[211px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.short stay furnished apartment') }}</p>
    </button>
</div>
<div class="flex-wrap gap-1 mt-4 filter-section-4 hidden">
    <button
        class="filter-button w-[110px] h-[26px] items-center flex justify-center border border-primary rounded-md">
        <p class="text-primary text-xs font-normal">{{ __('translation.new development') }}</p>
    </button>
</div>