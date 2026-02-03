@extends('admin.layouts.app')
@section('title', 'Admin - Request Detail')
@section('admin.content')

<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>


@session('success')
    <div class="col-span-12 mb-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    </div>
@endsession
<section  x-data="{ modelOpen: false }">
    <div class="flex justify-between items-center">
        <a href="{{route('admin.agencies.requests')}}">
            <i class='bx bx-arrow-back text-[30px]'></i>
        </a>
        <div class="flex gap-3">
            @if($agencyRequest->status == 'pending')
            <form action="{{ route('admin.agency.request.update.status', ['id' => $agencyRequest->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to disapprove this request?')">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="disapprove">
                <button class="px-6 py-4 text-sm font-semibold bg-primary hover:bg-primaryHover  text-white text-[20px] rounded-lg">Disapprove</button>
            </form>
            @endif
            <button class="px-6 py-4 text-sm font-semibold bg-primary hover:bg-primaryHover  text-white text-[20px] rounded-lg" @click="modelOpen =!modelOpen">Approve</button>
       </div>
    </div>
    <div x-show="modelOpen" class="alpine-modal fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 h-full overflow-hidden w-full" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen text-start md:items-center sm:block">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                aria-hidden="true">
            </div>

            <div x-cloak x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative mx-auto shadow-xl rounded-md bg-[#f7f7f7] max-w-[1146px] p-10 sm:h-[95vh] h-[100vh] sm:top-5 overflow-y-auto scroll-bar">
                <div class="flex justify-between">
                    <div class="w-full">
                        <p class="text-[#575757] font-bold text-3xl text-left">Approved Agency</p>
                    </div>
                    <button @click="modelOpen = false"
                        class="text-[#575757] focus:outline-none hover:text-gray-700">
                        <i class="bx bx-x text-[24px]"></i>
                    </button>
                </div>
                <div class="mt-[53px]">
                    <h1 class="text-[#575757] text-2xl font-semibold">Select Plan</h1>
                </div>
                <form action="{{ route('admin.agency.request.approve', ['id' => $agencyRequest->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="w-full p-5 bg-white  border h-[99px] mt-8">
                        <label for="plan" class="text-sm font-semibold text-black">Plan</label>
                        <select name="plan" id="plan" class="w-full mt-2 text-black font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                            <option value="" hidden>Select Plan</option>
                            @foreach($plans as $plan)
                            <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                            @endforeach
                        </select>
                        @error('plan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{--<div class="grid grid-cols-3 gap-5 mt-6">
                        <div class="w-full p-5 bg-white  border h-[99px]">
                            <label for="name" class="text-sm font-semibold text-black">Duration</label>
                            <div class="custom-dropdown-container mt-2">
                                <div class="select-menu">
                                    <div class="select-btn">
                                        <span class="sBtn-text text-sm text-black opacity-50">Select Duration</span>
                                        <i class='bx bx-caret-down'></i>
                                    </div>
                                    <ul class="options scroll-bar z-10">
                                        <li class="option">
                                            <span class="option-text text-primary">Sharja</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Abu Dhabi</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Ajman</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Oman</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Al Ain</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Ras Al-Khaimah</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="w-full p-5 bg-white  border h-[99px]">
                            <label for="name" class="text-sm font-semibold text-black">Listings</label>
                            <div class="custom-dropdown-container mt-2">
                                <div class="select-menu">
                                    <div class="select-btn">
                                        <span class="sBtn-text text-sm text-black opacity-50">Add Number of Listings</span>
                                        <i class='bx bx-caret-down'></i>
                                    </div>
                                    <ul class="options scroll-bar z-10">
                                        <li class="option">
                                            <span class="option-text text-primary">Sharja</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Abu Dhabi</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Ajman</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Oman</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Al Ain</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Ras Al-Khaimah</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="w-full p-5 bg-white  border h-[99px]">
                            <label for="name" class="text-sm font-semibold text-black">Featured Listings</label>
                            <div class="custom-dropdown-container mt-2">
                                <div class="select-menu">
                                    <div class="select-btn">
                                        <span class="sBtn-text text-sm text-black opacity-50">Add Number of Featured Listings</span>
                                        <i class='bx bx-caret-down'></i>
                                    </div>
                                    <ul class="options scroll-bar z-10">
                                        <li class="option">
                                            <span class="option-text text-primary">Sharja</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Abu Dhabi</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Ajman</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Oman</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Al Ain</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text text-primary">Ras Al-Khaimah</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                    <div class="w-full p-4 bg-white border h-[99px] mt-6">
                        <label for="email" class="text-sm font-semibold text-black">Username</label>
                        <input id="email" name="email" type="email" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" required value="{{$agencyRequest->email}}" readonly>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full p-4 bg-white border h-[99px] mt-6">
                        <label for="password" class="text-sm font-semibold text-black">Password</label>
                        <input id="password" type="password" placeholder="********" name="password" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400">
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <button class="px-5 py-3 hover:bg-primaryHover bg-primary rounded-lg text-white font-semibold text-[16px]">Approve & Send Credentials</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="mt-20">
    <h1 class="text-[#575757] text-[40px] font-bold">{{ $agencyRequest->agency_name }}</h1>
    <p class="mt-2 text-[20px] font-normal">{{ $agencyRequest->city }}, {{ $agencyRequest->country }}</p>
</section>
<section class="mt-14 bg-white rounded-[6px] p-14 mb-32">
    <div class="flex gap-16">
        <div>
            <h1 class="text-[#575757] font-semibold text-2xl">Contact Information</h1>
            <div class="flex gap-2 items-center mt-9">
                <i class="bx bxs-phone text-[20px]"></i>
                <p class="text-[20px] font-semibold text-[#575757]">{{ $agencyRequest->phone_number }}</p>
            </div>
            <div class="flex gap-2 items-center mt-4">
                <i class="bx bxs-envelope text-[20px]"></i>
                <p class="text-[20px] font-semibold text-[#575757]">{{ $agencyRequest->email }}</p>
            </div>
        </div>
        <div>
            <h1 class="text-[#575757] font-semibold text-2xl">Contact Person</h1>
            <p class="text-[20px] font-semibold text-[#575757] mt-9">{{ $agencyRequest->contact_person_first_name }} {{ $agencyRequest->contact_person_last_name }}</p>
        </div>
        <div>
            <h1 class="text-[#575757] font-semibold text-2xl">Request Date</h1>
            <p class="text-[20px] font-semibold text-[#575757] mt-9">{{ $agencyRequest->created_at->format('d M, Y') }}</p>
        </div>
        <div>
            <h1 class="text-[#575757] font-semibold text-2xl">Listing</h1>
            <p class="text-[20px] font-semibold text-[#575757] mt-9">{{ $agencyRequest->number_of_listing }}</p>
        </div>
    </div>

    <div class="mt-10">
        <h1 class="text-[#575757] font-semibold text-2xl mb-5">Documents</h1>
        @foreach($documents as $document)
            @php
                $fileExtension = pathinfo($document->file_path, PATHINFO_EXTENSION);
                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
            @endphp

            @if(in_array(strtolower($fileExtension), $imageExtensions))
                <a data-fancybox="gallery" href="{{ asset($document->file_path) }}" data-caption="{{ $document->file_name }}">
                    <img src="{{ asset($document->file_path) }}" alt="{{ $document->file_name }}" class="my-9 w-44 h-44">
                </a>
            @else
                <a href="{{ asset($document->file_path) }}" target="_blank" class="text-md font-semibold text-[#575757] underline mt-9">
                    {{ $document->file_name }}
                </a>
            @endif
        @endforeach
    </div>
</section>

@endsection