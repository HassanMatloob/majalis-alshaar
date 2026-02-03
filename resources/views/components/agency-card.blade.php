@foreach($agencies as $agency)
<a href="{{ route('agency.detail', ['agency' => $agency->id]) }}">
    <div class="flex xl:flex-row flex-col xl:h-[202px] h-auto hover:shadow-[0px_2px_8px_0px_rgba(99,99,99,0.2)] rounded-2xl hover:cursor-pointer border">
        <div class="xl:max-w-[208px] w-full  h-[202px]  overflow-hidden">
            <img src="{{ asset('uploads/agencies/logos/' . $agency->image) }}" alt="Property Image"
                class="w-full object-cover h-full  xl:rounded-tl-2xl rtl:xl:rounded-tl-none rtl:xl:rounded-tr-2xl rtl:xl:rounded-br-2xl xl:rounded-bl-2xl  rtl:xl:rounded-bl-none rounded-tl-2xl rounded-tr-2xl xl:rounded-tr-none rounded-l-none">
        </div>
        <div class="p-6 2xl:p-7 xl:rounded-tr-2xl xl:rounded-br-2xl rounded-bl-2xl xl:rounded-bl-none rounded-br-2xl">
            <p class="text-[20px] font-semibold text-primary leading-[26px]">{{ $agency->agency_name }}</p>
            {{-- <p class="text-sm text-black font-normal leading-[24px] mt-3">{{ $agency->description }}</p> --}}
            <button class="mt-5 w-[130px] h-[30px] bg-[#FFEFE1] text-secondary text-xs rounded-lg">{{ $agency->approved_properties }} listings</button>
        </div>
    </div>
</a>
@endforeach