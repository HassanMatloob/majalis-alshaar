@extends('layouts.app')
@section('content')
    <section class="container">
        <hr class="">
    </section>
    <section class="mt-8 container">
        <div class="flex gap-[6px] items-center">
            <a href="{{ route('agencies') }}" class="text-xs font-semibold text-primary">{{ __('translation.agencies') }}</a>
            <p class=" font-medium text-xs text-black">/</p>
            <a href="{{ route('agency.detail', ['agency' => $agent->agency_id]) }}"
                class="text-primary font-semibold text-xs">{{ __('translation.agency detail') }}</a>
            <p class=" font-medium text-xs text-black">/</p>
            <p class="text-black font-medium text-xs">{{ __('translation.agent detail') }}</p>
        </div>
    </section>
    <section class="mt-8 container">
        <div class="grid grid-cols-12 gap-5">
            <div class="xl:col-span-8 col-span-12">
                {{-- <div class="w-full bg-[#F8F9FA] rounded-2xl">
                <div class="flex md:flex-row flex-col">
                    <div class="px-7 sm:py-7 py-3">
                        <img src="/images/agent-detail.png" alt="" class="w-full">
                    </div>
                    <div class="sm:py-[40px] py-[10px] sm:px-0 px-7">
                        <div>
                            <h1 class="sm:text-[40px] text-[30px] sm:leading-[52px] text-black font-bold">Jack Mayers</h1>
                            <p class="text-black text-[20px] font-normal mt-1">G Floor, Sh Jasm building, Abu Shagara</p>
                        </div>
                        <div class="flex justify-between lg:gap-[350px] sm:mt-16 mt-8">
                            <p class="mt-1 text-primary text-base font-normal">Dubai, UAE</p>
                            <i class='bx bx-cog text-[24px] text-primary'></i>
                        </div>
                    </div>
                </div>
            </div> --}}
                <div class="w-full bg-[#F8F9FA] rounded-2xl">
                    <div class="flex md:flex-row flex-col p-7">
                        <div class="">
                            <img src="{{ asset('uploads/agents/photos/' . $agent->photo) }}" alt=""
                                class="w-full h-full md:w-[290px] rounded-[16px]">
                        </div>
                        <div class="w-full sm:px-7 sm:py-2 py-5 px-2">
                            <div>
                                <h1 class="sm:text-[40px] text-[30px] sm:leading-[52px] text-black font-bold lg:w-[70%]">
                                    {{ $agent->name }}</h1>
                                <p class="text-black text-[20px] font-normal mt-1">{{ $agent->address }}</p>
                            </div>
                            <div class="flex flex-wrap mr-9 rtl:mr-0 w-full justify-between items-center sm:mt-16 mt-8">
                                <p class="mt-1 text-primary text-base font-normal">{{ $agent->city }},
                                    {{ $agent->country }}</p>
                                <i class='bx bxs-share-alt text-[24px] text-primary'></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <h1 class="text-2xl text-black font-semibold">{{ __('translation.about agent') }}</h1>
                    <p class="mt-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vulputate odio nisl, in
                        blandit nibh maximus id. Pellentesque elementum purus vitae dolor viverra pharetra. Vestibulum ante
                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur est arcu, lacinia
                        ac purus eget, convallis gravida nunc. Aenean suscipit massa viverra risus lobortis pellentesque.
                        Duis vel mauris quis magna sodales sagittis. Quisque id dolor lorem. In sem ante, luctus in turpis
                        in, pulvinar rutrum nisl. Vestibulum sed interdum sapien. Sed rutrum augue id odio lobortis mattis.
                        Pellentesque lacinia elementum mi ut tempor. Morbi quis odio quis elit egestas bibendum vel et
                        justo. Cras at sollicitudin leo, porta pretium sem. In porta quam quis tincidunt ultricies. Quisque
                        faucibus nulla vitae lectus fringilla elementum.</p>
                </div>
                <div class="mt-14">
                    <h1 class="text-black font-semibold text-2xl">{{ __('translation.properties') }}
                        ({{ $properties->count() }})</h1>
                    <div class="flex sm:flex-row flex-col sm:gap-0 gap-5 mt-[30px] justify-between items-center">
                        <div class="flex flex-wrap justify-start gap-4 w-full">
                            <button
                                class="tab-button active w-[114px] h-[53px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg"
                                data-tab="residential" data-filter="Rent">{{ __('translation.for rent') }}</button>
                            <button
                                class="tab-button w-[112px] h-[53px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg"
                                data-tab="commercial" data-filter="Sell">{{ __('translation.for sale') }}</button>
                        </div>
                    </div>
                    <div class="xl:col-span-8 col-span-12 mt-[30px]">
                        <div class="tab-content" id="tab-residential">
                            <div class="grid grid-cols-12 gap-7">
                                @foreach ($properties as $property)
                                    @if ($property->type == 'Rent')
                                        <x-property-card-lg :property="$property"></x-property-card-lg>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-content hidden" id="tab-commercial">
                            <div class="grid grid-cols-12 gap-7">
                                @foreach ($properties as $property)
                                    @if ($property->type == 'Sell')
                                        <x-property-card-lg :property="$property"></x-property-card-lg>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:col-span-4 col-span-12">
                <x-submit-form route='agentdetail' contact="{{ $agent->phone_number }}" whatsapp=""></x-submit-form>
            </div>
        </div>
    </section>
    <section class="xl:mt-28 mt-16">
        <x-start-listing></x-start-listing>
    </section>

    <script>
        function activateTab(event, tabId) {
            const tabs = document.querySelectorAll('.tab-button');
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
