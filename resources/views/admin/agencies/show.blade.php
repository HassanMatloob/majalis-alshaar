@extends('admin.layouts.app')
@section('title', 'Admin - Agency Detail')
@section('admin.content')
@session('success')
    <div class="col-span-12 mb-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    </div>
@endsession
@session('error')
    <div class="col-span-12 mb-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    </div>
@endsession
<section>
    <div class="flex justify-between items-center">
        <a href="{{ route('admin.agencies') }}">
        <i class='bx bx-arrow-back text-[30px]'></i>
        </a>
        @if($agency->status == 'active')
        <form action="{{ route('admin.agency.request.update.status', ['id' => $agency->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to disable this agency?')">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="disable">
            <button class="px-6 py-4 text-sm font-semibold bg-primary hover:bg-primaryHover text-white text-[20px] rounded-lg">Disable Agency</button>
        </form>
        @else
        <button type="button" class="px-6 py-4 text-sm font-semibold bg-gray-500 hover:bg-gray-700 text-white text-[20px] rounded-lg" disabled>Disabled</button>
        @endif
    </div>
</section>
<section class="mt-5 grid grid-cols-12 gap-5">
    <div class="xl:col-span-6 col-span-12">
        <img src="{{asset('uploads/agencies/logos/' . $agency->image)}}" alt="" class="w-[152px] h-[152px] object-cover rounded-2xl">
        <div class="mt-10">
            <h1 class="text-[#575757] text-[40px] font-bold">{{$agency->agency_name}}</h1>
            <p class="mt-2 text-[#575757] text-[20px] font-normal">{{$agency->address}}</p>
            <p class="mt-2 text-[#575757] text-base opacity-50 font-normal">{{$agency->city}}, {{$agency->country}}</p>
        </div>
        <div class="mt-20">
            <h1 class="text-2xl font-semibold text-[#575757]">About  Agency</h1>
            <p class="mt-8">{!!$agency->description!!}</p>
        </div>
    </div>
    <div class="xl:col-span-6 col-span-12">
        <div class="bg-white h-[296px] px-12 py-9 rounded-[10px]">
            <h1 class="text-[#575757] font-semibold text-2xl">Contact Information</h1>
            <div class="flex gap-[10px] items-center mt-9">
                <i class='bx bxs-phone text-[20px] text-[#575757] font-semibold'></i>
                <p class="text-[20px] text-[#575757] font-semibold">{{$agency->phone_number}}</p>
            </div>
            <div class="flex gap-[10px] items-center mt-4">
                <i class='bx bxs-envelope text-[20px] text-[#575757] font-semibold'></i>
                <p class="text-[20px] text-[#575757] font-semibold">{{$agency->email}}</p>
            </div>
            <div class="flex gap-[10px] mt-4">
                <i class='bx bxs-map text-[20px] text-[#575757] font-semibold'></i>
                <p class="text-[20px] text-[#575757] font-normal">{{$agency->address}}, {{$agency->city}}, {{$agency->country}}</p>
            </div>
        </div>
        <div class="bg-white px-12 py-9 rounded-[10px] mt-5">
            <h1 class="text-[#575757] font-semibold text-2xl">More Information</h1>
            <div class="flex justify-between items-center mt-9">
                <h1 class="text-[20px] text-[#575757] font-semibold">Joined</h1>
                <p class="text-[20px] text-[#575757] font-normal">{{ $agency->created_at->format('d M, Y') }}</p>
            </div>
            <div class="flex justify-between items-center mt-5">
                <h1 class="text-[20px] text-[#575757] font-semibold">Manager</h1>
                <p class="text-[20px] text-[#575757] font-normal">{{ $agency->user?->name }}</p>
            </div>
            <div class="flex justify-between items-center mt-5">
                <h1 class="text-[20px] text-[#575757] font-semibold">Active Plan</h1>
                <p class="text-[20px] text-[#575757] font-normal">{{ $agency->plan?->name }}</p>
            </div>
            <div class="flex justify-between items-center mt-5">
                <h1 class="text-[20px] text-[#575757] font-semibold">Plan Start Date</h1>
                <p class="text-[20px] text-[#575757] font-normal">{{ $agency->plan?->created_at->format('d M, Y') }}</p>
            </div>
            <div class="flex justify-between items-center mt-5">
                <h1 class="text-[20px] text-[#575757] font-semibold">Plan Expiry Date</h1>
                <p class="text-[20px] text-[#575757] font-normal">{{ $agency->plan?->created_at->addMonths((int)$agency->plan?->duration ?? 0)->format('d M, Y') }}</p>
            </div>
        </div>
    </div>
</section>
<div class="mt-[135px]">
    <h1 class="text-[#575757] text-2xl font-semibold">Properties by Agency</h1>
    <div class="flex flex-wrap justify-start gap-[10px] w-full tab-buttons mt-8">
        <button class="tab-button active hover:bg-[#EAEAFF] active w-[90px] h-[36px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg" data-tab="rent">For Rent</button>
        <button class="tab-button hover:bg-[#EAEAFF] w-[90px] h-[36px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg" data-tab="sell">For Sale</button>
    </div>
</div>
<div class="w-full mt-8 mb-20">
    <div class="tab-content" id="tab-rent">
        <div class="grid grid-cols-12 gap-7 mt-8">
            <div class="col-span-12">
                <div>
                    <div class="grid grid-cols-12 gap-7">
                        {{-- @foreach ($agency->properties as $property) --}}
                        @foreach ($rent_properties as $property)
                            <div class="sm:col-span-6 col-span-12 hover:shadow-[0px_2px_8px_0px_rgba(99,99,99,0.2)] hover:cursor-pointer rounded-2xl">
                                <div class="flex xl:flex-row flex-col">
                                    <div class="relative swiper-property-images h-[360px] xl:w-[360px] 2xl:w-full overflow-hidden">
                                        <div class="swiper-wrapper">
                                            @foreach ($property->images as $image)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset($image->path) }}" alt="Property Image" class="h-[360px] w-full object-cover rounded-tl-2xl xl:rounded-bl-2xl xl:rounded-tr-none rounded-bl-none rounded-tr-2xl">
                                                </div>
                                            @endforeach
                                            {{-- <div class="swiper-slide">
                                                <img src="{{ asset('/images/properties-crop-img-1.png') }}" alt="Property Image" class="h-[360px] w-full object-cover rounded-tl-2xl xl:rounded-bl-2xl xl:rounded-tr-none rounded-bl-none rounded-tr-2xl">
                                            </div> --}}
                                        </div>
                                        <!-- Add Navigation -->
                                        <div class="swiper-button-next browse-property-next"></div>
                                        <div class="swiper-button-prev browse-property-prev"></div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination swiper-pagination-browse"></div>
                                    </div>
                                    <div class="p-8 xl:rounded-tr-2xl xl:rounded-br-2xl xl:rounded-bl-none rounded-bl-2xl rounded-br-2xl border xl:h-[360px] h-auto lg:h-[330px] xl:w-[60%] w-full">
                                        <div class="inline w-auto h-auto bg-[#FFE7F1] text-[#B5185A] text-sm font-semibold text-center rounded px-4 py-2">
                                            {{ $property->category->name }}
                                        </div>
                                        <p class="text-2xl font-bold mt-[10px] text-primary">{{ Number_format($property->price) }} <span class="text-xl font-semibold text-black">{{ $property->currency }}</span></p>
                                        <p class="text-base text-primary font-bold mt-3">{{ $property->title }}</p>
                                        <p class="text-xs text-black font-normal mt-[9px]">{{ $property->city }}, {{ $property->country }}</p>
                                        <div class="flex items-center gap-[18px] mt-4 text-secondary text-xs font-semibold">
                                            <div class="flex items-center gap-[6px]">
                                                <img src="{{ asset('svgs/bed.svg') }}" alt="Property Image" class="">
                                                <p class="text-xs">{{  $property->bedrooms }}</p>
                                            </div>
                                            <div class="flex items-center gap-[6px]">
                                                <img src="{{ asset('svgs/bath.svg') }}" alt="Property Image" class="">
                                                <p class="text-xs">{{  $property->bathrooms }}</p>
                                            </div>
                                            <div class="flex items-center gap-[6px]">
                                                <img src="{{ asset('svgs/scale.svg') }}" alt="Property Image" class="">
                                                <p class="text-xs">{{ $property->area }} sqm</p>
                                            </div>
                                        </div>
                                        <p class="text-xs text-black font-normal mt-7">Added {{ date('j F, Y', strtotime($property->created_at)) }}</p>
                                        <div class="flex lg:gap-7 justify-between xl:mt-9 mt-5">
                                            <div class="flex  items-end gap-2">
                                                <a href="" class="flex sm:flex-row flex-col justify-center hover:bg-primaryHover  items-center gap-3 w-[124px] h-[50px] bg-primary text-white text-[15px] font-semibold rounded-lg">
                                                    Remove
                                                </a>
                                                <a href="" class="flex sm:flex-row flex-col justify-center hover:bg-primaryHover  items-center gap-3 w-[124px] h-[50px] bg-primary text-white text-[15px] font-semibold rounded-lg">
                                                    View Details
                                                </a>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-content hidden" id="tab-sell">
        <div class="grid grid-cols-12 gap-7 mt-8">
            <div class="col-span-12">
                <div>
                    <div class="grid grid-cols-12 gap-7">
                        @foreach ($sell_properties as $property)
                            <div class="sm:col-span-6 col-span-12 hover:shadow-[0px_2px_8px_0px_rgba(99,99,99,0.2)] hover:cursor-pointer rounded-2xl">
                                <div class="flex xl:flex-row flex-col">
                                    <div class="relative swiper-property-images h-[360px] xl:w-[360px] 2xl:w-full overflow-hidden">
                                        <div class="swiper-wrapper">
                                            @foreach ($property->images as $image)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset($image->path) }}" alt="Property Image" class="h-[360px] w-full object-cover rounded-tl-2xl xl:rounded-bl-2xl xl:rounded-tr-none rounded-bl-none rounded-tr-2xl">
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Add Navigation -->
                                        <div class="swiper-button-next browse-property-next"></div>
                                        <div class="swiper-button-prev browse-property-prev"></div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination swiper-pagination-browse"></div>
                                    </div>
                                    <div class="p-8 xl:rounded-tr-2xl xl:rounded-br-2xl xl:rounded-bl-none rounded-bl-2xl rounded-br-2xl border xl:h-[360px] h-auto lg:h-[330px] xl:w-[60%] w-full">
                                        <div class="inline w-auto h-auto bg-[#FFE7F1] text-[#B5185A] text-sm font-semibold text-center rounded px-4 py-2">
                                            {{ $property->category->name }}
                                        </div>
                                        <p class="text-2xl font-bold mt-[10px] text-primary">{{ Number_format($property->price) }} <span class="text-xl font-semibold text-black">{{ $property->currency }}</span></p>
                                        <p class="text-base text-primary font-bold mt-3">{{ $property->title }}</p>
                                        <p class="text-xs text-black font-normal mt-[9px]">{{ $property->city }}, {{ $property->country }}</p>
                                        <div class="flex items-center gap-[18px] mt-4 text-secondary text-xs font-semibold">
                                            <div class="flex items-center gap-[6px]">
                                                <img src="{{ asset('svgs/bed.svg') }}" alt="Property Image" class="">
                                                <p class="text-xs">{{  $property->bedrooms }}</p>
                                            </div>
                                            <div class="flex items-center gap-[6px]">
                                                <img src="{{ asset('svgs/bath.svg') }}" alt="Property Image" class="">
                                                <p class="text-xs">{{  $property->bathrooms }}</p>
                                            </div>
                                            <div class="flex items-center gap-[6px]">
                                                <img src="{{ asset('svgs/scale.svg') }}" alt="Property Image" class="">
                                                <p class="text-xs">{{ $property->area }} sqm</p>
                                            </div>
                                        </div>
                                        <p class="text-xs text-black font-normal mt-7">Added {{ date('j F, Y', strtotime($property->created_at)) }}</p>
                                        <div class="flex lg:gap-7 justify-between xl:mt-9 mt-5">
                                            <div class="flex  items-end gap-2">
                                                <a href="" class="flex sm:flex-row flex-col justify-center hover:bg-primaryHover  items-center gap-3 w-[124px] h-[50px] bg-primary text-white text-[15px] font-semibold rounded-lg">
                                                    Remove
                                                </a>
                                                <a href="" class="flex sm:flex-row flex-col justify-center hover:bg-primaryHover  items-center gap-3 w-[124px] h-[50px] bg-primary text-white text-[15px] font-semibold rounded-lg">
                                                    View Details
                                                </a>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection