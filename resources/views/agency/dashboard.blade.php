@extends('admin.layouts.app')
@section('title', 'Agency - Dashboard')
@section('admin.content')
<section class="grid xl:grid-cols-4 grid-cols-3 gap-7">
    <div class="bg-white h-28 p-5 rounded-lg">
        <h1 class="text-5xl font-semibold text-secondary">{{ $agency?->approved_properties_count }}</h1>
        <p class="text-black text-sm mt-1 font-normal">Active Properties</p>
    </div>
    <div class="bg-white h-28 p-5 rounded-lg">
        <h1 class="text-5xl font-semibold text-secondary">{{ $agency?->pending_properties_count }}</h1>
        <p class="text-black text-sm mt-1 font-normal">Pending Properties</p>
    </div>
    <div class="bg-white h-28 p-5 rounded-lg">
        <h1 class="text-5xl font-semibold text-secondary">{{ $agency?->disapproved_properties_count }}</h1>
        <p class="text-black text-sm mt-1 font-normal">Disapproved Properties</p>
    </div>
    <div class="bg-white h-28 p-5 rounded-lg">
        <h1 class="text-5xl font-semibold text-secondary">{{ $agency?->agents()->count() }}</h1>
        <p class="text-black text-sm mt-1 font-normal">Agents</p>
    </div>
</section>
<section class="grid grid-cols-12 mt-10 gap-7">
    <div class=" p-5 bg-white rounded-[10px] col-span-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-black font-semibold text-base">Recent Properties</h1>
            </div>
            <div>
                <div class="flex flex-wrap justify-start gap-[10px] w-full tab-buttons">
                    <button
                        class="tab-button hover:bg-[#EAEAFF] active w-[56px] h-[36px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg"
                        data-tab="1">All</button>
                    <button
                        class="tab-button hover:bg-[#EAEAFF] w-[90px] h-[36px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg"
                        data-tab="2">For Rent</button>
                    <button
                        class="tab-button hover:bg-[#EAEAFF] w-[88px] h-[36px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg"
                        data-tab="3">For Sale</button>
                </div>
            </div>
        </div>
        <div class="w-full mt-12">
            <div class="tab-content" id="tab-1">
                <div class="overflow-x-auto scroll-bar">
                    <table class="w-full min-w-[990px] bg-white">
                        <thead>
                            <tr>
                                <th class="text-left text-xs font-medium text-black opacity-50">ID</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">IMAGE</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">NAME</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">AGENCY</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">STATUS</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">CATEGORY</th>
                                <th class="text-right text-xs font-medium text-black opacity-50">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Repeat this block for each row -->
                            @foreach($agency?->properties()->latest()->limit(5)->get() as $property)
                                <tr>
                                    <td class="pt-10 text-xs font-bold text-secondary">{{ $property->id }}</td>
                                    <td class="pt-10 ">
                                        <img src="{{ asset($property->images[0]->path)}}" alt="Property Image" class="w-16 h-10 object-cover">
                                    </td>
                                    <td class="pt-10 text-xs font-bold text-primary">{{ $property->title }}</td>
                                    <td class="pt-10 text-xs font-bold text-primary">{{ $agency->agency_name }}</td>
                                    <td class="pt-10  text-sm">
                                        @if ($property->type == 'Sell')
                                            <span class="inline-block px-2 py-1 text-[10px] text-primary font-normal bg-[#EAEAFF] rounded-2xl">For Sale</span>
                                        @else
                                            <span class="inline-block px-2 py-1 text-[10px] text-primary font-normal bg-[#EAEAFF] rounded-2xl">For Rent</span>
                                        @endif
                                    </td>
                                    <td class="pt-10 text-xs font-bold text-black">{{ $property->category->name }}</td>
                                    <td class="pt-10  text-sm justify-end flex">
                                        <a href="{{ route('agency.listing.edit', ['id' => $property->id]) }}">
                                            <button class="text-xs font-semibold text-white w-[57px] h-[30px] rounded-[6px] bg-primary hover:bg-primaryHover ">View</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-content hidden" id="tab-2">
                <div class="overflow-x-auto scroll-bar">
                    <table class="w-full min-w-[990px] bg-white">
                        <thead>
                            <tr>
                                <th class="text-left text-xs font-medium text-black opacity-50">ID</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">IMAGE</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">NAME</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">AGENCY</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">STATUS</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">CATEGORY</th>
                                <th class="text-right text-xs font-medium text-black opacity-50">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agency?->properties()->where('type', 'rent')->latest()->limit(5)->get() as $property)
                                <tr>
                                    <td class="pt-10 text-xs font-bold text-secondary">{{ $property->id }}</td>
                                    <td class="pt-10 ">
                                        <img src="{{ asset($property->images[0]->path)}}" alt="Property Image" class="w-16 h-10 object-cover">
                                    </td>
                                    <td class="pt-10 text-xs font-bold text-primary">{{ $property->title }}</td>
                                    <td class="pt-10 text-xs font-bold text-primary">{{ $agency->agency_name }}</td>
                                    <td class="pt-10  text-sm">
                                        <span class="inline-block px-2 py-1 text-[10px] text-primary font-normal bg-[#EAEAFF] rounded-2xl">For Rent</span>
                                    </td>
                                    <td class="pt-10 text-xs font-bold text-black">{{ $property->category->name }}</td>
                                    <td class="pt-10  text-sm justify-end flex">
                                        <button class="text-xs font-semibold text-white w-[57px] h-[30px] rounded-[6px] bg-primary hover:bg-primaryHover ">View</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-content hidden" id="tab-3">
                <div class="overflow-x-auto scroll-bar">
                    <table class="w-full min-w-[990px] bg-white">
                        <thead>
                            <tr>
                                <th class="text-left text-xs font-medium text-black opacity-50">ID</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">IMAGE</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">NAME</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">AGENCY</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">STATUS</th>
                                <th class="text-left text-xs font-medium text-black opacity-50">CATEGORY</th>
                                <th class="text-right text-xs font-medium text-black opacity-50">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agency?->properties()->where('type', 'sell')->latest()->limit(5)->get() as $property)
                                <tr>
                                    <td class="pt-10 text-xs font-bold text-secondary">{{ $property->id }}</td>
                                    <td class="pt-10 ">
                                        <img src="{{ asset($property->images[0]->path)}}" alt="Property Image" class="w-16 h-10 object-cover">
                                    </td>
                                    <td class="pt-10 text-xs font-bold text-primary">{{ $property->title }}</td>
                                    <td class="pt-10 text-xs font-bold text-primary">{{ $agency?->agency_name }}</td>
                                    <td class="pt-10  text-sm">
                                        <span class="inline-block px-2 py-1 text-[10px] text-primary font-normal bg-[#EAEAFF] rounded-2xl">For Sale</span>
                                    </td>
                                    <td class="pt-10 text-xs font-bold text-black">{{ $property->category->name }}</td>
                                    <td class="pt-10  text-sm justify-end flex">
                                        <button class="text-xs font-semibold text-white w-[57px] h-[30px] rounded-[6px] bg-primary hover:bg-primaryHover ">View</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-4 px-6 py-7 bg-white rounded-[10px]">
        <div>
            <h1 class="text-[20px] font-semibold text-[#575757]">Your Plan</h1>
            <p class="text-base font-normal text-[#575757] mt-1">Your Subscription plan</p>
        </div>
        <div class="bg-[#D9D9D9] p-5 mt-4 rounded-lg">
            <h1 class="text-[20px] font-semibold text-[#575757]">{{$agency?->plan?->name}}</h1>
            <div class="flex justify-between mt-7">
                <h1 class="text-base font-semibold text-[#575757]">Total Listings</h1>
                <p class="text-base font-normal text-[#575757]">{{$agency?->plan?->allowed_listings}}</p>
            </div>
            <div class="flex justify-between mt-5">
                <h1 class="text-base font-semibold text-[#575757]">Featured Listings</h1>
                <p class="text-base font-normal text-[#575757]">{{$agency?->plan?->allowed_featured_listings}}</p>
            </div>
            <div class="flex justify-between mt-5">
                <h1 class="text-base font-semibold text-[#575757]">Duration</h1>
                <p class="text-base font-normal text-[#575757]">{{ number_format($agency?->plan?->duration) }} months</p>
            </div>
            <div class="flex justify-between mt-5">
                <h1 class="text-base font-semibold text-[#575757]">Agents</h1>
                <p class="text-base font-normal text-[#575757]">{{ number_format($agency?->plan?->allowed_agents) }}</p>
            </div>
            <div class="mt-7 w-full">
                <a href="{{ route('agency.revise.plan') }}" class="bg-primary w-full h-[36px] flex items-center text-center justify-center rounded-lg text-white hover:bg-primaryHover">Revise Plan</a>
            </div>
        </div>
        <div class="mt-6">
            <h1 class="text-[20px] font-semibold text-[#575757]">Details</h1>
            <p class="text-base font-normal mt-3 text-[#575757]">Purchased on: <span class="text-base font-semibold text-[#575757]">{{$agency?->plan_started_at_formatted}}</span></p>
            {{-- <p class="text-base font-normal mt-3 text-[#575757]">Listings used: <span class="text-base font-semibold text-[#575757]">21/100</span></p> --}}
            <p class="text-base font-normal mt-3 text-[#575757]">Listings used: <span class="text-base font-semibold text-[#575757]">{{ $agency?->properties->where('status', 'approved')->count() }}/{{ $agency?->plan->allowed_listings }}</span></p>
            {{-- <p class="text-base font-normal mt-3 text-[#575757]">Featured listings used: <span class="text-base font-semibold text-[#575757]">10/16</span></p> --}}
            <p class="text-base font-normal mt-3 text-[#575757]">Featured listings used: <span class="text-base font-semibold text-[#575757]">{{ $agency?->properties->where('is_featured', 1)->count() }}/{{ $agency?->plan->allowed_featured_listings }}</span></p>
            <p class="text-base font-normal mt-3 text-[#575757]">Agents used: <span class="text-base font-semibold text-[#575757]">{{ $agency?->agents->count() }}/{{ $agency?->plan->allowed_agents }}</span></p>
            <p class="text-base font-normal mt-3 text-[#575757]">Expires on: <span class="text-base font-semibold text-[#575757]">{{$agency?->plan_expired_at_formatted}}</span></p>
        </div>
    </div>
</section>
<section class="mt-10 bg-white p-6 rounded-[10px] mb-9">
    <h1 class="text-[#575757] font-semibold text-base">Top Agents</h1>
    <div class="grid grid-cols-5 mt-7 gap-4">
        @foreach($agency?->agents->where('top_agent', 1) as $agent)
            <div>
                <img src="{{ asset('uploads/agents/photos/' . $agent->photo) }}" alt="Agent Photo" class="w-full rounded-t-lg">
                <div class="border-r border-l border-b rounded-b-lg p-5">
                    <h1 class="text-primary text-[18px] font-semibold">{{ $agent->name }}</h1>
                    <p class="text-xs font-normal mt-3">{{ $agent->city }}, {{ $agent->country }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection