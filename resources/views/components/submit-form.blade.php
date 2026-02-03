<div class="w-full  h-auto bg-[#F8F9FA] rounded-2xl mt-10">
    @session('success')
        <div class="col-span-12 px-5 pt-5">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endsession
    @session('error')
        <div class="col-span-12 px-5 pt-5">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        </div>
    @endsession
    <div class="px-5 py-[20px]">
        <form action="{{ route('contact.store') }}" method="post">
        @csrf
        @method('POST')
            <div class="grid md:grid-cols-2 lg:grid-cols-1 mt-0 gap-5 grid-cols-1">
                <div>
                    <div class="w-full p-4 bg-white rounded-2xl border h-[99px]">
                        <label for="name" class="text-sm font-semibold text-black">{{ __('translation.your name') }}*</label>
                        <input id="name" type="text" name="name" placeholder="{{ __('translation.write your name here') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400">
                    </div>
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="w-full p-4 bg-white rounded-2xl border h-[99px]">
                        <label for="phone" class="text-sm font-semibold text-black">{{ __('translation.phone-number') }}*</label>
                        <input id="phone" type="text" name="phone_number" placeholder="{{ __('translation.phone_number') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400">
                    </div>
                    @error('phone_number')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="w-full p-4 bg-white rounded-2xl border h-[99px]">
                        <label for="email" class="text-sm font-semibold text-black">{{ __('translation.email-address') }}*</label>
                        <input id="email" type="email" name="email" placeholder="{{ __('translation.email_address') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400">
                    </div>
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="w-full p-4 bg-white rounded-2xl border h-[99px]">
                        <label for="subject" class="text-sm font-semibold text-black">{{ __('translation.subject') }}*</label>
                        <input id="subject" type="text" name="subject" placeholder="{{ __('translation.general-inquiry') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400">
                    </div>
                    @error('subject')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="w-full p-4 bg-white rounded-2xl border">
                        <label for="message" class="text-sm font-semibold text-black">{{ __('translation.message') }}*</label>
                        <textarea id="message" name="message" placeholder="{{ __('translation.write your message here') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" rows="5"></textarea>
                    </div>
                    @error('message')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="md:col-span-2 lg:col-span-1">
                    <button class="w-full sm:w-[144px] h-[50px] bg-primary hover:bg-primaryHover  rounded-lg text-white">{{ __('translation.submit') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>