@extends('layouts.app')
@section('content')
    <section class="relative text-center text-white lg:h-[243px] h-auto bg-cover bg-center lg:block hidden"
        style="background-image: url('{{ asset('/images/residential-banner.png') }}');">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center h-full">
            <div class="mt-[68px] lg:mb-0 mb-5 container">
                <div class="bg-white text-black p-6 rounded-bl-lg rounded-tl-lg rounded-r-lg shadow-lg w-full">
                    <x-filters route="properties"></x-filters>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-[58px] container">
        <div class="flex flex-wrap justify-between">
            <h1 class="text-[24px] text-black font-normal" id="property-count">
                @if ($properties->count() > 1)
                    {{ $properties->count() }} properties
                @elseif ($properties->count() == 1)
                    1 property
                @else
                    No property
                @endif
            </h1>
            <div class="custom-dropdown-container sm:mt-0 mt-2"
                style="width:115px; height:50px; border: 1px solid #00009F; border-radius:8px">
                <div class="select-menu" style="margin-top: 14px;">
                    <div class="select-btn" style="display: flex; justify-content:center; gap:5px; margin-left:10px;">
                        <span class="sBtn-text font-semibold text-sm text-primary">{{ __('translation.sort by') }}</span>
                        <i class='bx bx-caret-down'></i>
                    </div>
                    <ul class="options scroll-bar z-10" style="min-width: 7rem; margin-top:10px;">
                        <li class="option">
                            <span class="option-text text-primary">{{ __('translation.low') }}</span>
                        </li>
                        <li class="option">
                            <span class="option-text text-primary">{{ __('translation.high') }}</span>
                        </li>
                        <li class="option">
                            <span class="option-text text-primary">{{ __('translation.new') }}</span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="container mx-auto mt-[48px]">
        <div class="flex sm:flex-row flex-col sm:gap-0 gap-5 mt-8 justify-between items-center">
            <div class="flex flex-wrap justify-start gap-4 w-full">
                @foreach ($categories as $key => $category)
                    <a href="{{ route('properties') }}?cat={{ $category->name }}">
                        <button
                            class="tab-button {{ request()->query('cat') == $category->name ? 'active' : '' }} py-3 px-5 text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg"
                            data-tab="{{ $category->name }}">{{ $category->name }}</button>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="grid grid-cols-12 gap-7 mt-8">
            <div class="xl:col-span-8 col-span-12">
                <div class="grid grid-cols-12 gap-7" id="properties-container">
                    @if ($properties->count() == 0)
                        <p class="text-center text-black col-span-12">
                            No properties found
                        </p>
                    @endif
                    @foreach ($properties as $property)
                        <x-property-card-lg :property="$property"></x-property-card-lg>
                    @endforeach
                </div>
            </div>

            <div class="xl:col-span-4 col-span-12">
                <section class="relative bg-cover bg-center rounded-2xl xl:h-[973px] h-auto"
                    style="background-image: url('{{ asset('images/property-grid-2.png') }}');">
                    <div class="padding-mobile-sm p-10 relative flex flex-col  h-full  text-white">
                        <h1 class="text-[40px] font-bold sm:leading-[52px] max-w-2xl">
                            {{ __('translation.reach thousands') }}
                        </h1>
                        <p class="text-base font-normal mt-7 max-w-2xl sm:leading-[24px]">
                            {{ __('translation.easily list your property and connect with a vast audience. We ensure attracting serious buyers and renters quickly. Start today and take the first step toward a successful sale or rental!') }}
                        </p>
                        <a href="#"
                            class="bg-primary hover:bg-primaryHover text-white font-semibold mt-7 w-[254px] lg:h-[55px] md:h-[40px] h-[55px] button-w-sm flex justify-center items-center rounded-lg text-[15px]">
                            {{ __('translation.register Now - Start Listing') }}
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <section class="xl:mt-36 mt-12 container">
        <h1 class="text-black font-bold text-[32px]">{{ __('translation.map of the area') }}</h1>
        <div class="mt-10">
            <iframe class="w-full rounded-2xl"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.64880575195!2d-122.4194153064925!3d37.7749295096503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808580d64f4d186f%3A0x7f07e19a43f81275!2sSan%20Francisco%2C%20CA%2C%20USA!5e0!3m2!1sen!2sin!4v1623798089351!5m2!1sen!2sin"
                height="400" style="border:0;" loading="lazy"></iframe>
        </div>
    </section>
    <section class="xl:mt-32 mt-16">
        <x-start-listing></x-start-listing>
    </section>

    <script>
        $(document).ready(function() {
            $('.tab-button').click(function(e) {
                e.preventDefault();

                var categoryName = $(this).data('tab');
                console.log("Category:", categoryName);

                $.ajax({
                    url: '/properties-ajax',
                    data: {
                        cat: categoryName
                    },
                    type: 'GET',
                    success: function(data) {
                        console.log(data)

                        $('#properties-container').empty();
                        $('#property-count').empty();

                        function getRelativeTime(date) {
                            const now = new Date();
                            const diffInSeconds = Math.floor((now - date) / 1000);
                            const diffInMinutes = Math.floor(diffInSeconds / 60);
                            const diffInHours = Math.floor(diffInMinutes / 60);
                            const diffInDays = Math.floor(diffInHours / 24);

                            if (diffInDays > 0)
                                return `${diffInDays} day${diffInDays > 1 ? 's' : ''} ago`;
                            if (diffInHours > 0)
                                return `${diffInHours} hour${diffInHours > 1 ? 's' : ''} ago`;
                            if (diffInMinutes > 0)
                                return `${diffInMinutes} minute${diffInMinutes > 1 ? 's' : ''} ago`;
                            return `${diffInSeconds} second${diffInSeconds > 1 ? 's' : ''} ago`;
                        }

                        if (data.properties.length === 0) {
                            $('#properties-container').html(
                                '<p class="text-center text-black col-span-12">No properties found</p>'
                            );

                            $('#property-count').html('No property');
                        } else {
                            if (data.properties.length == 1) {
                                $('#property-count').html('1 Property');
                            } else {
                                $('#property-count').html(
                                    `${data.properties.length} properties`);
                            }

                            data.properties.forEach(function(property) {
                                var propertyHtml = `
                                    <div class="xl:col-span-12 sm:col-span-6 col-span-12 hover:shadow-[0px_2px_8px_0px_rgba(99,99,99,0.2)] hover:cursor-pointer rounded-2xl">
                                                <div class="flex xl:flex-row flex-col">
                                                    <div class="relative swiper-property-images h-[360px] xl:w-[360px] 2xl:w-full overflow-hidden">
                                                        <div class="swiper-wrapper">
                                                            ${property.images.map(image => `
                                                                                                <div class="swiper-slide">
                                                                                                    <img src="${image.path}" alt="Property Image" class="h-[360px] w-full object-cover rounded-tl-2xl rtl:xl:rounded-tl-none rtl:xl:rounded-tr-2xl rtl:xl:rounded-bl-none rtl:xl:rounded-br-2xl xl:rounded-bl-2xl xl:rounded-tr-none rounded-bl-none rounded-tr-2xl">
                                                                                                </div>
                                                                                            `).join('')}
                                                        </div>
                                                        <!-- Add Navigation -->
                                                        <div class="swiper-button-next browse-property-next"></div>
                                                        <div class="swiper-button-prev browse-property-prev"></div>
                                                        <!-- Add Pagination -->
                                                        <div class="swiper-pagination swiper-pagination-browse"></div>
                                                        <div class="absolute top-4 right-4 bg-secondary text-white w-[81px] h-[36px] flex justify-center items-center rounded-lg text-sm" style="z-index: 1">
                                                            ${property.type === 'Rent' ? 'For Rent' : 'For Sale'}
                                                        </div>
                                                    </div>
                                                    <div class="p-8 xl:rounded-tr-2xl rtl:xl:rounded-tr-none xl:rounded-br-2xl rtl:xl:rounded-br-none rtl:xl:rounded-tl-2xl rtl:rounded-bl-2xl xl:rounded-bl-none rounded-bl-2xl rounded-br-2xl border xl:h-[360px] h-auto 2xl:w-full lg:h-[330px]">
                                                        <div class="flex justify-between">
                                                            <p class="px-3 py-1 bg-[#FFE7F1] text-[#B5185A] text-sm font-semibold rounded">
                                                                ${property.category.name}
                                                            </p>
                                                            <p class="text-black text-base font-normal">${getRelativeTime(new Date(property.created_at))}</p>
                                                        </div>
                                                        <p class="text-2xl font-bold mt-[10px] text-primary">${Number(property.price).toLocaleString()} <span class="text-xl font-semibold text-black">${property.currency}</span></p>
                                                        <p class="text-base text-primary font-bold mt-3">${property.title}</p>
                                                        <p class="text-xs text-black font-normal mt-[9px]">${property.city}, ${property.country}</p>
                                                        <div class="flex items-center gap-[18px] mt-4 text-secondary text-xs font-semibold">
                                                            <div class="flex items-center gap-[6px]">
                                                                <img src="/svgs/bed.svg" alt="Property Image" class="">
                                                                <p class="text-xs">${property.bedrooms}</p>
                                                            </div>
                                                            <div class="flex items-center gap-[6px]">
                                                                <img src="/svgs/bath.svg" alt="Property Image" class="">
                                                                <p class="text-xs">${property.bathrooms}</p>
                                                            </div>
                                                            <div class="flex items-center gap-[6px]">
                                                                <img src="/svgs/scale.svg" alt="Property Image" class="">
                                                                <p class="text-xs">${property.area} sqm</p>
                                                            </div>
                                                        </div>
                                                        <div class="flex lg:gap-7 justify-between mt-9 lg:mt-0 xl:mt-9">
                                                            <div class="flex flex-wrap lg:flex-nowrap items-end gap-2 w-[50%] lg:w-[70%] 2xl:w-[100%] icon-width-375">
                                                                <a href="tel:${property.agent.phone_number}" target="_blank" class="flex justify-center hover:bg-[#EAEAFF] items-center gap-3 w-[54px] lg:h-[55px] md:h-[40px] h-[55px] button-w-sm border border-primary rounded-lg">
                                                                    <i class="bx bxs-phone text-primary text-[22px]"></i>
                                                                </a>
                                                                <a href="https://wa.me/${property.agent.phone_number}" target="_blank" class="flex justify-center hover:bg-[#EAEAFF] items-center gap-3 w-[54px] lg:h-[55px] md:h-[40px] h-[55px] button-w-sm border border-primary rounded-lg">
                                                                    <i class="bx bxl-whatsapp text-primary text-[22px]"></i>
                                                                </a>
                                                                <a href="/properties/${property.id}" class="flex sm:flex-row flex-col justify-center hover:bg-primaryHover items-center gap-3 lg:w-[170px] w-[120px] lg:h-[55px] md:h-[40px] h-[40px] bg-primary text-white text-[15px] font-semibold rounded-lg">
                                                                    View Details
                                                                </a>
                                                            </div>
                                                            
                                                        </div> 
                                                    </div>
                                                </div>
                                    </div>`;
                                $('#properties-container').append(propertyHtml);
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error:", textStatus, errorThrown);
                    }
                });
            });
        });
    </script>
@endsection
