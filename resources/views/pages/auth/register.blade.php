@extends('layouts.app')
@section('content')
</style>
<section class="relative text-center text-white lg:h-[243px] h-auto bg-cover bg-center" style="background-image: url('{{ asset('/images/residential-banner.png') }}');">
    <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 flex flex-col  h-full">
            <div class="mt-[130px] lg:mb-0 mb-5 container flex items-start">
                <h1 class="md:text-[56px] text-[30px] font-bold">{{ __('translation.register your agency') }}</h1>
            </div>
        </div>   
</section>
<section class="mt-[76px] container">
    <div class="grid grid-cols-12 xl:gap-8">
        <div class="xl:col-span-8 col-span-12">
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
            <div class="w-full h-auto bg-[#F8F9FA] rounded-2xl ">
                <div class="px-[30px] py-[42px]">
                    <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid sm:grid-cols-2 grid-cols-1 gap-5">
                            <div>
                                <div class="w-full p-4 bg-white rounded-2xl border h-[99px]">
                                    <label for="firstName" class="text-sm font-semibold text-black">{{ __('translation.first name') }}*</label>
                                    <input id="firstName" name="first_name" type="text" placeholder="{{ __('translation.first name') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" required>
                                </div>
                                @error('first_name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="w-full p-4 bg-white rounded-2xl border h-[99px]">
                                    <label for="lastName" class="text-sm font-semibold text-black">{{ __('translation.last name') }}*</label>
                                    <input id="lastName" name="last_name" type="text" placeholder="{{ __('translation.last name') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" required>
                                </div>
                                @error('last_name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="w-full p-4 bg-white rounded-2xl border h-[99px] sm:col-span-2 col-span-1">
                                    <label for="email" class="text-sm font-semibold text-black">{{ __('translation.email address') }}*</label>
                                    <input id="email" name="email" type="email" placeholder="{{ __('translation.email address') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" required>
                                </div>
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="w-full p-4 bg-white rounded-2xl border h-[99px] sm:col-span-2 col-span-1">
                                    <label for="phoneNumber" class="text-sm font-semibold text-black">{{ __('translation.phone number') }}*</label>
                                    <input id="phoneNumber" name="phone" type="text" placeholder="{{ __('translation.phone number') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" required>
                                </div>
                                @error('phone')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="w-full p-4 bg-white rounded-2xl border h-[99px]">
                                    <label for="agencyName" class="text-sm font-semibold text-black">{{ __('translation.agency name') }}*</label>
                                    <input id="agencyName" name="agency_name" type="text" placeholder="{{ __('translation.name of agency') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" required>
                                </div>
                                @error('agency_name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="w-full p-4 bg-white rounded-2xl border h-[99px]">
                                    <label for="numberOfListings" class="text-sm font-semibold text-black">{{ __('translation.number of listings') }}*</label>
                                    <input id="numberOfListings" name="number_of_listing" type="number" placeholder="{{ __('translation.listings you have') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" required>
                                </div>
                                @error('number_of_listing')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <div class="w-full p-4 bg-white rounded-2xl border h-[99px]">
                                    <label for="country" class="text-sm font-semibold text-black">{{ __('translation.country') }}*</label>
                                    <input id="country" name="country" type="text" placeholder="{{ __('translation.country') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" required>
                                </div>
                                @error('country')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>  
                                <div class="w-full p-4 bg-white rounded-2xl border h-[99px]">
                                    <label for="city" class="text-sm font-semibold text-black">{{ __('translation.city') }}*</label>
                                    <input id="city" name="city" type="text" placeholder="{{ __('translation.city') }}" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400" required>
                                </div>
                                @error('city')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="sm:col-span-2 col-span-1">
                                <div class="w-full p-4 bg-white rounded-2xl border text-center dropzone" id="document-dropzone">
                                    {{--<label for="file-upload" class="inline-block text-sm font-semibold text-primary ">
                                        Upload Documents
                                    </label>
                                    <p class="text-xs font-normal mt-1">Upload license or some legal certificate for varification</p>
                                    <p class="text-[10px] text-black opacity-50">supports png, jpg, pdf</p>--}}
                                </div>
                                @error('document')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-10 flex md:justify-between flex-wrap items-center">
                            <div class="w-full sm:w-[335px]">
                                <button class="sm:w-[335px] w-full h-[50px] bg-primary hover:bg-primaryHover text-white sm:text-base text-sm rounded-lg" id="register-btn">{{ __('translation.submit your registration request') }}</button>
                            </div>
                            <div class="sm:mt-0 mt-4">
                                <p class="text-black font-normal text-base text-center items-center">{{ __('translation.have an account already') }}<span class="flip">?</span> 
                                    <a href="{{ route('login') }}">
                                    <span class="text-base font-bold text-primary ">
                                        {{ __('translation.login') }}
                                    </span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="xl:col-span-4 col-span-12 xl:mt-0 mt-8">
            <div class="relative bg-cover bg-center rounded-2xl xl:h-[866px] h-auto" style="background-image: url('{{ asset('images/property-grid-2.png') }}');">
                <div class="padding-mobile-sm p-10 relative flex flex-col  h-full  text-white">
                    <h1 class="text-[40px] font-bold sm:leading-[52px] max-w-2xl">
                    {{ __('translation.reach thousands') }}
                    </h1>
                    <p class="text-base font-normal mt-7 max-w-2xl sm:leading-[24px]">
                    {{ __('translation.easily list your property and connect with a vast audience. We ensure attracting serious buyers and renters quickly. Start today and take the first step toward a successful sale or rental!') }}
                    </p>
                    <a href="#" class="bg-primary hover:bg-primaryHover text-white font-semibold mt-7 w-[224px] lg:h-[55px] md:h-[40px] h-[55px] button-w-sm flex justify-center items-center rounded-lg text-[15px]">
                    {{ __('translation.register Now - Start Listing') }}
                    </a>
                </div>
            </div> 
        </div>
    </div>
</section>
<section class="xl:mt-[142px] mt-[76px] container">
    <h1 class="text-[32px] font-bold">{{ __('translation.why Should You Join Us') }} <span class="flip">?</span></h1>
    <div class="grid sm:grid-cols-3 grid-cols-1 xl:gap-9 gap-7 xl:mt-28 mt-20">
        <div class="text-center">
            <div class="flex justify-center items-center">
                <img src="{{ asset('svgs/documents.svg') }}" alt="">
            </div>
            <h1 class="mt-11 text-2xl font-semibold text-black">{{ __('translation.extensive listings') }}</h1>
            <p class="mt-9 text-base font-normal">{{ __('translation.explore a wide range of properties, from residential to commercial, with new listings added regularly. Find exactly what you need.') }}</p>
        </div>
        <div class="text-center">
            <div class="flex justify-center items-center">
                <img src="{{ asset('svgs/searching.svg') }}" alt="">
            </div>
            <h1 class="mt-11 text-2xl font-semibold text-black">{{ __('translation.user-friendly search') }}</h1>
            <p class="mt-9 text-base font-normal">{{ __('translation.quickly find your ideal property with easy-to-use search filters and interactive maps. Enjoy a seamless and efficient search experience') }}</p>
        </div>
        <div class="text-center">
            <div class="flex justify-center items-center">
                <img src="{{ asset('svgs/time24.svg') }}" alt="">
            </div>
            <h1 class="mt-11 text-2xl font-semibold text-black">{{ __('translation.round-the-clock support') }}</h1>
            <p class="mt-9 text-base font-normal">{{ __('translation.get expert help whenever you need it, day or night. Our 24/7 support team is always here to ensure a smooth, hassle-free experience') }}</p>
        </div>
    </div>
</section>
<section class="xl:mt-40 mt-[76px]">
    <x-start-listing></x-start-listing>
</section>
<script>
  var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = {
    url: "{{ route('register.document.store') }}",
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="document[]"][value="' + name + '"]').remove()
    },
    init: function () {
      @if(isset($project) && $project->document)
        var files =
          {!! json_encode($project->document) !!}
        for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
        }
      @endif
    }
  }
</script>
@endsection