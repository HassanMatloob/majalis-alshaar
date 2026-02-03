@extends('admin.layouts.app')
@section('title', 'Agency - Revise Plan - Contact')
@section('admin.content')
<h1 class="text-4xl font-semibold text-[#575757]">Plan Revision Request</h1>
<section class="mt-16">
    <div class="grid grid-cols-12 gap-8 mb-10">
        <div class="xl:col-span-9 col-span-12">
            <div class="rounded-lg p-10 bg-white">
                <div class="w-full p-4 bg-[#F2F2F2] h-[99px]">
                    <label for="name" class="text-sm font-semibold text-[#575757]">What do you want to revise?</label>
                    <div class="custom-dropdown-container mt-2">
                        <div class="select-menu">
                            <div class="select-btn bg-[#F2F2F2]" style="background-color: #F2F2F2 !important;">
                                <span class="sBtn-text text-sm text-[#575757] opacity-50 ">Select an option (duration, no. of listings, no of featured listings)</span>
                                <i class='bx bx-caret-down'></i>
                            </div>
                            <ul class="options scroll-bar z-10">
                                <li class="option">
                                    <span class="option-text text-primary">Duration</span>
                                </li>
                                <li class="option">
                                    <span class="option-text text-primary">No. of listings</span>
                                </li>
                                <li class="option">
                                    <span class="option-text text-primary">No. of featured listings</span>
                                </li>
                                <li class="option">
                                    <span class="option-text text-primary">No. of agents</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-full p-4 bg-[#F2F2F2]  h-[94px] mt-7">
                    <label for="name" class="text-sm font-semibold text-[#575757]">Add total number you want on this plan?</label>
                    <input id="name" type="number" placeholder="00" class="w-full mt-2 text-[#575757] font-normal  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]">
                </div>
                <div class="w-full p-4 bg-[#F2F2F2]  h-[208px] mt-7">
                    <label for="name" class="text-sm font-semibold text-[#575757]">Message</label>
                    <textarea name="" id="" cols="30" rows="6" placeholder="add a message" class="w-full mt-2 text-[#575757] font-normal  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]"></textarea>
                </div>
                <div class="mt-10">
                    <a href="" class="px-5 py-3 rounded-lg bg-primary hover:bg-primaryHover text-white text-base">Submit Revision Request</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection