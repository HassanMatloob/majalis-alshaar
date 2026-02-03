@extends('layouts.app')
@section('content')
<style>
    .tab-active {
        color: #00009F;
        border-bottom: 1px solid #00009F;
    }
    .tab-inactive {
        color: #00009F;
        opacity: 50%;
        border-bottom: 1px solid #00009F;
    }
</style>
<section class="container">
    <hr class="">
</section>
<section class="mt-8 container">
    <div class="flex gap-[6px] items-center">
        <a href="{{ route('agencies') }}" class="text-xs font-semibold text-primary">{{ __('translation.agencies') }}</a>
        <p class=" font-medium text-xs text-black">/</p>
        <p class="text-black font-medium text-xs">{{ __('translation.agency detail') }}</p>
    </div>
</section>
<section class="mt-8 container">
    <div class="grid grid-cols-12 gap-5">
        <div class="xl:col-span-8 col-span-12">
            <div class="w-full bg-[#F8F9FA] rounded-2xl">
                <div class="flex md:flex-row flex-col p-7 gap-7">
                    <div>
                        <img src="{{ asset('uploads/agencies/logos/' . $agency->image) }}"  alt="" class="w-full h-full md:w-[290px] rounded-[16px]">
                    </div>
                    <div class="w-full mt-3">
                        <div>
                            <h1 class="sm:text-[40px] text-[30px] sm:leading-[52px] text-black font-bold lg:w-[70%]">{{$agency->agency_name}}</h1>
                            <p class="text-black text-[20px] font-normal mt-1">{{$agency->address}}</p>
                            <p class="mt-1 text-primary text-base font-normal">{{$agency->city}}, {{$agency->country}}</p>
                        </div>
                        <div class="flex flex-wrap mr-9 rtl:mr-0 w-full justify-between items-center sm:mt-[62px] md:mt-[25px] mt-[20px]">
                            <div class="flex flex-wrap gap-[10px]">
                                <button class="sm:w-[181px] w-full py-[11px] text-secondary bg-[#FFEFE1] rounded-lg">{{ $agency->rent_properties_count }} {{$agency->rent_properties_count > 1 ? 'properties' : 'property'}} for rent</button>
                                <button class="sm:w-[186px] w-full py-[11px] text-secondary bg-[#FFEFE1] rounded-lg">{{ $agency->sale_properties_count }} {{$agency->rent_properties_count > 1 ? 'properties' : 'property'}} for sale</button>
                            </div>
                            <div class="lg:block hidden">
                                <i class='bx bxs-share-alt text-[24px] text-primary'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <h1 class="text-2xl text-black font-semibold">{{ __('translation.about agency') }}</h1>
                <p class="mt-8 ">{!!$agency->description!!}</p>
            </div>
            <div class="mt-10">
                <div class="flex gap-4">
                    <div id="tab-properties-btn" class="tab w-[50%] p-[10px] text-center text-2xl font-semibold cursor-pointer" onclick="activateTab(event, 'tab-properties')">
                        {{ __('translation.properties') }}
                    </div>
                    <div id="tab-agents-btn" class="tab w-[50%] p-[10px] text-center text-2xl font-semibold cursor-pointer" onclick="activateTab(event, 'tab-agents')">
                        {{ __('translation.agents') }}
                    </div>
                </div>
                
                <div id="tab-properties" class="tab-content-agency">
                    <div class="flex sm:flex-row flex-col sm:gap-0 gap-5 mt-8 justify-between items-center">
                        <div class="flex flex-wrap justify-start gap-4 w-full">
                            <button class="tab-button active w-[114px] h-[53px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg" data-tab="residential">{{ __('translation.for rent') }}</button>
                            <button class="tab-button w-[112px] h-[53px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg" data-tab="commercial">{{ __('translation.for sale') }}</button>
                        </div>
                    </div>
                    <div class="xl:col-span-8 col-span-12 mt-7">
                        <div class="tab-content" id="tab-residential">
                            <div class="grid grid-cols-12 gap-7">
                                @foreach ($agency->properties as $property)
                                    @if ($property->type == 'Rent' && $property->status == 'approved')
                                        <x-property-card-lg :property="$property"></x-property-card-lg>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-content hidden" id="tab-commercial">
                            <div class="grid grid-cols-12 gap-7">
                                @foreach ($agency->properties as $property)
                                    @if ($property->type == 'Sell' && $property->status == 'approved')
                                        <x-property-card-lg :property="$property"></x-property-card-lg>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-agents" class="tab-content-agency hidden">
                    <div class="grid grid-cols-12 gap-7 mt-7">
                        @foreach ($agents as $agent)
                            <div class="xl:col-span-12 sm:col-span-6 col-span-12">
                                <div class="flex xl:flex-row flex-col hover:shadow-[0px_2px_8px_0px_rgba(99,99,99,0.2)] border rounded-2xl">
                                    <div class="relative h-[298px] xl:w-[360px] 2xl:w-full overflow-hidden">
                                        <div>
                                            <img src="{{ asset('uploads/agents/photos/' . $agent->photo) }}" alt="Property Image" class="h-[298px] w-full object-cover rounded-tl-2xl rtl:xl:rounded-tl-none xl:rounded-bl-2xl rtl:xl:rounded-bl-none rtl:xl:rounded-tr-2xl rtl:xl:rounded-br-2xl  xl:rounded-tr-none rounded-bl-none rounded-tr-2xl">
                                        </div>    
                                    </div>
                                    <div class="p-8 xl:w-[475px] 2xl:w-full xl:rounded-tr-2xl xl:rounded-br-2xl xl:rounded-bl-none rounded-bl-2xl rounded-br-2xl xl:h-[298px] h-auto">
                                        <p class="text-[28px] font-bold text-black">{{$agent->name}}</p>
                                        <p class="text-[20px] text-black font-semibold mt-2">{{$agent->city}}, {{$agent->country}}</p>
                                        <div class="flex items-center justify-center rounded-lg w-[130px] h-[30px] mt-4 bg-[#FFEFE1] text-secondary text-xs font-normal">{{ $agent->properties_count }} {{ __('translation.active listings') }}</div>
                                        <div class="flex items-center gap-2 xl:mt-[64px] mt-[22px]">
                                            <a href="tel:{{$agent->phone_number}}" class="flex justify-center items-center gap-2 w-[127px] h-[55px] bg-primary hover:bg-primaryHover text-white text-[15px] font-semibold rounded-lg">
                                                {{ __('translation.contact') }}
                                            </a>
                                            <a href="{{ route('agent.detail', ['agent' => $agent->id]) }}">
                                                <button class="flex justify-center items-center gap-2 w-[127px] h-[55px] bg-primary hover:bg-primaryHover text-white text-[15px] font-semibold rounded-lg">
                                                    {{ __('translation.view details') }}
                                                </button>
                                            </a>  
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:col-span-4 col-span-12">
            <x-submit-form route='agencydetail' contact="{{$agency->phone_number}}" whatsapp="{{$agency->whatsapp_number}}"></x-submit-form>
        </div>
    </div>
</section>
<section class="xl:mt-28 mt-16">
    <x-start-listing></x-start-listing>
</section>
<script>
    function activateTab(event, tabId) {
        const tabs = document.querySelectorAll('.tab');
        tabs.forEach(tab => {
            tab.style.color = '#00009F';
            tab.style.borderBottom = '1px solid #00009F';
            tab.style.opacity = '50%';
        });
        event.currentTarget.style.color = '#00009F';
        event.currentTarget.style.borderBottom = '1px solid #00009F';
        event.currentTarget.style.opacity = '100%';
        const contents = document.querySelectorAll('.tab-content-agency');
        contents.forEach(content => {
            content.classList.add('hidden');
        });
        document.getElementById(tabId).classList.remove('hidden');
    }
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('tab-properties-btn').click();
    });
</script>
@endsection