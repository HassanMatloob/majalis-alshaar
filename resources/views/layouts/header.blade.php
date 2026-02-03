<header
    class="container bg-white flex justify-between @if (request()->is('properties') ||
            request()->routeIs('property.detail') ||
            request()->routeIs('agency.detail') ||
            request()->routeIs('agent.detail') ||
            request()->is('agencies')) w-full gap-2 @endif items-center py-4 relative"
    x-data="{ modelOpen: false }">
    @if (
        !request()->is('properties') &&
            !request()->routeIs('property.detail') &&
            !request()->is('agencies') &&
            !request()->routeIs('agency.detail') &&
            !request()->routeIs('agent.detail'))
        <button class="block lg:hidden focus:outline-none" id="mobile-menu-button">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    @endif
    <a href="{{ route('home') }}" ><img
            src="{{ asset('images/majalis-alshaar-logo.png') }}" alt="" class="sm:w-[100px] w-[100px]"></a>
    <ul
        class="text-primary font-medium md:text-sm lg:text-base text-base lg:flex items-center hidden gap-6 md:gap-4 xl:gap-6">
        <li class="hover:text-secondary {{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}">{{ __('translation.home') }}</a>
        </li>
        @foreach($categories as $category)
        @if($category->parent_id == 0)
        <li class="relative hover:text-secondary {{ request()->routeIs('projects') ? 'active' : '' }}">
            <div class="text-primary hover:text-secondary font-medium cursor-pointer" id="propertiesToggle">
                <a href="{{ route('projects') }}?cat={{ $category->name }}">
                    {{ $category->name }}
                </a>
                @if($category->subCategories->isNotEmpty())
                <i class="bx bx-chevron-down"></i>
                @endif
            </div>
            <div id="dropdown" class="absolute bg-white rounded-lg w-[200px] mt-10 hidden z-20 shadow-lg p-2">
                <div class="relative group">
                    @foreach($category->subCategories as $subCategory)
                    <a href="{{ route('projects') }}?cat={{ $subCategory->name }}" class="px-3 py-2 hover:bg-primary/10 rounded-lg flex justify-between items-center cursor-pointer text-primary font-medium">
                        {{ $subCategory->name }}
                    </a>
                    @endforeach
                </div>
            </div>
        </li>
        @endif
        @endforeach
        <li class="hover:text-secondary {{ request()->routeIs('about') ? 'active' : '' }}"><a
                href="{{ route('about') }}">{{ __('translation.about-us') }}</a></li>
        <li class="hover:text-secondary {{ request()->routeIs('contact') ? 'active' : '' }}"><a
                href="{{ route('contact') }}">{{ __('translation.contact-us') }}</a></li>
    </ul>
    <div class="lg:flex lg:gap-8 gap-4 items-center hidden">
        <div class="custom-dropdown">
            <button onclick="toggleOptions(event)"
                class="flex gap-2 md:text-sm lg:text-base text-base font-medium text-primary hover:text-secondary">
                <?php
                if (session('locale') == 'ar') {
                    echo 'عربي';
                } else {
                    echo 'English';
                }
                ?>
            </button>
            <div class="flex flex-col absolute hidden bg-white shadow-md border border-gray-300 rounded-md top-[65px] w-20 dropdownOptions"
                style="z-index: 999">
                <div onclick="selectOption('en')"
                    class="{{ session('locale') == 'ar' ? '' : '' }}flex justify-center p-2 text-primary hover:bg-[#EAEAFF] hover:text-secondary">
                    English</div>
                <div onclick="selectOption('ar')"
                    class="{{ session('locale') == 'ar' ? '' : '' }}flex justify-center p-2 text-primary hover:bg-[#EAEAFF] hover:text-secondary">
                    عربي</div>
            </div>
        </div>
        <a href="https://wa.me/{{ config('app.whatsapp_number') }}" target="_blank"
            class="inline-flex items-center gap-2 bg-primary hover:bg-primaryHover active:bg-primaryHover
                transition-all duration-200 ease-out rounded-lg shadow-md sm:py-[10px] sm:px-6 py-2 px-4 
                 text-white text-base font-medium">
            <i class="bx bxl-whatsapp text-xl"></i>
            {{ __('translation.call-us-now') }}
        </a>
    </div>
        <a href="https://wa.me/{{ config('app.whatsapp_number') }}" target="_blank"
            class="inline-flex items-center gap-2 bg-primary hover:bg-primaryHover lg:hidden block transition-all duration-200 ease-out rounded-lg sm:py-[10px] sm:px-6 py-2 px-4 text-white sm:text-base text-xs">
            <i class="bx bxl-whatsapp text-xl"></i>
            <span class="">{{ __('translation.call-us-now') }}</span>
        </a>
</header>
<!-- Mobile Menu -->
<div class="fixed top-0 left-0 w-full bg-white z-20 h-full shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out"
    id="mobile-menu">
    <div class="flex items-center p-4 border-b">
        <button class="focus:outline-none" id="mobile-menu-close-button">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
        <div class="w-full flex justify-center">
            <a href="{{ route('home') }}"><img src="{{ asset('images/majalis-alshaar-logo.png') }}" alt=""
                    class="sm:w-[175px] w-[140px] justify-center"></a>
        </div>
    </div>
    <ul class="text-primary font-medium text-base flex flex-col gap-3 p-4 overflow-y-auto">
        <li>
            <a href="https://wa.me/{{ config('app.whatsapp_number') }}" target="_blank"
                class="inline-flex gap-2 bg-primary hover:bg-primaryHover transition duration-150 ease-out rounded-lg w-full h-12 flex justify-center items-center text-white text-base">
                <i class="bx bxl-whatsapp text-xl"></i>
                {{ __('translation.call-us-now') }}
            </a>
        </li>
        <li class="relative">
            <a href="{{ route('home') }}"
                class="block p-2 rounded-lg hover:bg-primary/10 transition-colors">{{ __('translation.home') }}</a>
        </li>
        <li class="relative">
            @foreach($categories as $category)
            @if($category->parent_id == 0)
            <div class="flex justify-between items-center p-2 rounded-lg hover:bg-primary/10 cursor-pointer"
                id="mobile-properties-toggle">
                {{$category->name}}
                @if($category->subCategories->isNotEmpty())
                <i class="bx bx-chevron-down text-primary"></i>
                @endif
            </div>
            <ul id="mobile-dropdown" class="bg-white p-2 w-full hidden">
                @foreach($category->subCategories as $subCategory)
                <li class="flex justify-between items-center p-2 rounded-lg hover:bg-gray-100 cursor-pointer category-toggle">
                    <a href="" class="!text-primary w-full">{{$subCategory->name}}</a>
                </li>
                @endforeach
            </ul>
            @endif
            @endforeach
        </li>
        <li>
            <a href="{{ route('about') }}"
                class="block p-2 rounded-lg hover:bg-primary/10 transition-colors">{{ __('translation.about-us') }}</a>
        </li>
        <li>
            <a href="{{ route('contact') }}"
                class="block p-2 rounded-lg hover:bg-primary/10 transition-colors">{{ __('translation.contact-us') }}</a>
        </li>
        <li>
            <div class="lg:flex lg:gap-8 gap-4 items-center">
                <div class="custom-dropdown !block">
                    <button onclick="toggleOptions(event)"
                        class="md:text-sm lg:text-base text-base text-start font-medium text-primary w-full hover:bg-primary/10 rounded-lg">
                        <?php
                        if (session('locale') == 'ar') {
                            echo 'عربي';
                        } else {
                            echo 'English';
                        }
                        ?>
                    </button>
                    <div class="flex flex-col absolute hidden bg-white shadow-md border border-gray-300 rounded-md top-100 w-20 dropdownOptions"
                        style="z-index: 999">
                        <div onclick="selectOption('en')"
                            class="{{ session('locale') == 'ar' ? '' : '' }}flex justify-center p-2 text-primary hover:bg-[#EAEAFF] hover:text-secondary">
                            English</div>
                        <div onclick="selectOption('ar')"
                            class="{{ session('locale') == 'ar' ? '' : '' }}flex justify-center p-2 text-primary hover:bg-[#EAEAFF] hover:text-secondary">
                            عربي</div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>

<script>
    function toggleOptions() {
        var options = event.currentTarget.nextElementSibling;
        console.log('options', options);
        
        options.style.display = (options.style.display === "block") ? "none" : "block";
        options.style.cursor = "pointer";
    }

    function selectOption(option) {
        var button = document.querySelector(".custom-dropdown button");
        $.ajax({
            url: "/lang/" + option,
            type: 'GET',
            success: function(data) {
                const country = "{{ session('country_code') }}";
                location.reload();
            }
        })
    }
</script>
