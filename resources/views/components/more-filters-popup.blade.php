<div 
    x-show="modelOpen"
    class="alpine-modal fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 h-full overflow-hidden w-full"
    aria-labelledby="modal-title" 
    role="dialog" 
    aria-modal="true"
>
    <div
        class="flex items-end justify-center min-h-screen text-center md:items-center sm:block">
        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
            aria-hidden="true"></div>

        <div x-cloak x-show="modelOpen"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative mx-auto shadow-xl rounded-md bg-white max-w-[865px]  sm:h-[95vh] h-[100vh] sm:top-5 overflow-y-auto scroll-bar">
            <div class="p-10 flex justify-between">
                <div class="w-full gap-4 rounded flex items-center justify-start">
                    <img src="/svgs/orange-filter.svg" alt="">
                    <p class="text-black font-bold text-2xl">{{ __('translation.more filters') }}</p>
                </div>
                <button @click="modelOpen = false"
                    class="text-gray-600 focus:outline-none hover:text-gray-700">
                    <i class="bx bx-x text-[24px]"></i>
                </button>
            </div>
            <hr>
            <div class="px-[39px] py-[34px]  justify-start items-start text-start">
                {{-- <div class="custom-dropdown-container">
                    <div class="select-menu">
                        <div class="select-btn">
                            <span class="sBtn-text text-sm text-black opacity-50">Categories</span>
                            <i class='bx bx-caret-down'></i>
                        </div>
                        <ul class="options scroll-bar z-10">
                            <li class="option residential-filters">
                                <span class="option-text text-primary ">Residential</span>
                            </li>
                            <li class="option commercial-filters">
                                <span class="option-text text-primary ">Commercial</span>
                            </li>
                            <li class="option hotel-filters">
                                <span class="option-text text-primary ">Hotels</span>
                            </li>
                            <li class="option development-filters">
                                <span class="option-text text-primary ">New Developments</span>
                            </li>
                            <li class="option">
                                <span class="option-text text-primary">Restaurents</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="mt-6"> --}}
                <div class="flex flex-wrap lg:gap-[112px] gap-6">
                    <div>
                        <h1 class="text-black font-semibold text-base">{{ __('translation.price range') }}</h1>
                        <div class="flex items-center gap-[10px] mt-5">
                            <input type="text"
                                class="sm:w-[150px] w-[120px] h-[39px] border border-primary rounded-lg flex items-center text-center focus:outline-none text-black text-sm"
                                placeholder="0$"
                                onkeypress="return isNumber(event)" />
                            <span class="text-secondary w-[8px]">-</span>
                            <input type="text"
                                class="sm:w-[150px] w-[120px] h-[39px] border border-primary rounded-lg flex items-center text-center focus:outline-none text-black text-sm"
                                placeholder="0$" onkeypress="return isNumber(event)">
                        </div>
                    </div>
                    <div>
                        <h1 class="text-black font-semibold text-base">{{ __('translation.payment method') }}
                        </h1>
                        <div class="flex items-center gap-[10px] mt-5 button-group-1">
                            <button
                                class="w-[62px] h-[39px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-1">{{ __('translation.all') }}</button>
                            <button
                                class="w-[80px] h-[39px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-1">{{ __('translation.cash') }}</button>
                            <button
                                class="sm:w-[122px] w-[110px] h-[39px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-1">{{ __('translation.installments') }}</button>
                        </div>
                    </div>
                </div>
                <hr class="mt-6">
                <div class="mt-6">
                    <h1 class="text-black font-semibold text-base">{{ __('translation.view') }}</h1>
                    <div
                        class="flex flex-wrap items-center gap-[10px] mt-5 button-group-2">
                        <button
                            class="w-[62px] h-[39px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-2">{{ __('translation.all') }}</button>
                        <button
                            class="w-[116px] h-[39px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-2">{{ __('translation.main street') }}</button>
                        <button
                            class="w-[112px] h-[39px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-2">{{ __('translation.side street') }}</button>
                        <button
                            class="w-[103px] h-[39px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-2">{{ __('translation.sea view') }}</button>
                        <button
                            class="w-[125px] h-[39px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-2">{{ __('translation.garden view') }}</button>
                    </div>
                </div>
                <hr class="mt-6">
                <div class="mt-6">
                    <h1 class="text-black font-semibold text-base">{{ __('translation.furnishing') }}</h1>
                    <div
                        class="flex flex-wrap items-center gap-[10px] mt-5 button-group-3">
                        <button
                            class="w-[62px] h-[39px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-3">{{ __('translation.all') }}</button>
                        <button
                            class="w-[107px] h-[39px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-3">{{ __('translation.furnished') }}</button>
                        <button
                            class="w-[120px] h-[39px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-3">{{ __('translation.unfurnished') }}</button>
                    </div>
                </div>
                <hr class="mt-6">
                <div class="mt-6">
                    <h1 class="text-black font-semibold text-base">{{ __('translation.bedrooms') }}</h1>
                    <div
                        class="flex flex-wrap items-center gap-[10px] mt-5 button-group-4">
                        <button
                            class="w-[86px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal">{{ __('translation.studio') }}</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-4">1</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-4">2</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-4">3</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-4">4</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-4">5</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-4">6</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-4">7</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-4">8</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-4">9</button>
                    </div>
                </div>
                <hr class="mt-6">
                <div class="mt-6">
                    <h1 class="text-black font-semibold text-base">{{ __('translation.bathrooms') }}</h1>
                    <div
                        class="flex flex-wrap items-center gap-[10px] mt-5 button-group-5">
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-5">1</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-5">2</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-5">3</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-5">4</button>
                        <button
                            class="w-[40px] h-[38px] border border-primary rounded-lg text-primary text-xs font-normal select-btn-5">5</button>
                    </div>
                </div>
                <hr class="mt-6">
                <div class="mt-6">
                    <h1 class="text-black font-semibold text-base">{{ __('translation.amenities') }}</h1>
                    <div class="flex flex-wrap sm:gap-[30px] gap-4 items-center mt-5">
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <div class="flex gap-[6px]">
                                <img src="/svgs/amenties-1.svg" alt="">
                                <p class="text-black text-sm font-normal">{{ __('translation.balcony') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <div class="flex gap-[6px]">
                                <img src="/svgs/amenties-2.svg" alt="">
                                <p class="text-black text-sm font-normal">{{ __('translation.central a/c') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <div class="flex gap-[6px]">
                                <img src="/svgs/amenties-3.svg" alt="">
                                <p class="text-black text-sm font-normal">{{ __('translation.swimming pool') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <div class="flex gap-[6px]">
                                <img src="/svgs/amenties-4.svg" alt="">
                                <p class="text-black text-sm font-normal">{{ __('translation.water fountain') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-6">
                <div class="mt-6">
                    <h1 class="text-black font-semibold text-base">{{ __('translation.property') }}</h1>
                    <div class="flex flex-wrap lg:gap-[30px] gap-4 items-center mt-5">
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <p class="text-black text-sm font-normal">{{ __('translation.built in wardrobes') }}</p>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <p class="text-black text-sm font-normal">{{ __('translation.kitchen appliances') }}</p>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <p class="text-black text-sm font-normal">{{ __('translation.gym') }}</p>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <p class="text-black text-sm font-normal">{{ __('translation.jacuzzi') }}</p>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <p class="text-black text-sm font-normal">{{ __('translation.walk-in shopping mall') }}</p>
                        </div>
                    </div>
                </div>
                <hr class="mt-6">
                <div class="mt-6">
                    <h1 class="text-black font-semibold text-base">{{ __('translation.community area') }}</h1>
                    <div class="flex flex-wrap lg:gap-[30px] gap-4 items-center mt-5">
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <p class="text-black text-sm font-normal">{{ __('translation.children’s play garden') }}</p>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <p class="text-black text-sm font-normal">{{ __('translation.parking') }}</p>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <p class="text-black text-sm font-normal">{{ __('translation.mosque') }}</p>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <p class="text-black text-sm font-normal">{{ __('translation.security') }}</p>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <p class="text-black text-sm font-normal">{{ __('translation.shared exercise area') }}</p>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <p class="text-black text-sm font-normal">{{ __('translation.barbecue area') }}</p>
                        </div>
                        <div class="flex items-center gap-[14px]">
                            <input type="checkbox" id="custom-checkbox" />
                            <p class="text-black text-sm font-normal">{{ __('translation.swimming pool facilities') }}</p>
                        </div>
                    </div>
                </div>
                <hr class="mt-6">
                <div class="flex justify-end mt-6 gap-3">
                    <button
                        class="w-[111px] h-[55px] border border-primary hover:bg-[#EAEAFF] rounded-lg text-primary text-[15px] font-semibold">{{ __('translation.clear all') }}</button>
                    <button
                        class="w-[202px] h-[55px] bg-primary hover:bg-primaryHover text-white rounded-lg text-[15px] font-semibold">{{ __('translation.show properties') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>