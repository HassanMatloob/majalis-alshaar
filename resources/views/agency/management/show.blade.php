@extends('admin.layouts.app')
@section('title', 'Agency - Management')
@section('admin.content')

<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<style>
    ::-webkit-file-upload-button {
   display: none;
}
</style>
<h1 class="text-4xl font-semibold text-[#575757]">Agency</h1>
<section class="mt-16">
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
    <form action="{{ route('agency.management.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-12 gap-8">
            <div class="col-span-8">
                {{-- add title and description starts--}}
                <div class="rounded-lg p-10 bg-white">
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[99px]">
                        <label for="name" class="text-base font-semibold text-[#575757]">Title</label>
                        <input id="name" type="text" name="agency_name" value="{{ $agency->agency_name }}" class="w-full mt-2 text-[#575757] font-normal  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]">
                    </div>
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[280px] mt-4">
                        <label for="description" class="text-base font-semibold text-[#575757]">Detailed Description</label>
                        <x-quill-editor id="description" name="description" placeholder="Please type your agency description ..." value="{!! $agency->description !!}" />
                    </div>
                    @error('description')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    {{--<div class="w-full p-5 bg-[#F2F2F2]  h-[99px] mt-4">
                        <label for="name" class="text-sm font-semibold text-[#575757]">User Type</label>
                        <select name="status" id="status" class="w-full mt-2 text-black font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                            <option value="" hidden>Select User Type</option>
                            <option value="Sell">Sell</option>
                            <option value="Rent">Rent</option>
                        </select>
                    </div>
                    @error('status')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror--}}
                </div>
                {{-- add title and description ends--}}

                {{-- add logo starts --}}
                <div class="rounded-lg p-10 bg-white mt-7">
                    <div class="w-full p-4 bg-[#F2F2F2]">
                        <h1 class="text-base text-[#575757] font-semibold">Add Logo</h1>
                        <div class="border-2 border-dashed border-[#d3d3d3] py-10 justify-center w-full flex flex-col items-center rounded-xl mt-6 bg-white">
                            <label for="imageUpload" class="cursor-pointer flex justify-center items-center w-[174px] h-[49px] bg-primary text-white rounded-lg">
                                Upload Image
                            </label>
                            <input type="file" id="imageUpload" name="logo" accept="image/png, image/jpeg, image/jpg" class="pl-[190px] pt-4">
                            <p class="mt-3">Click to upload images from your computer</p>
                            <p class="mt-2">supports png, jpg and jpeg</p>
                        </div>
                    </div>
                    @if($agency->image)
                        <div class="w-full mt-4">
                            <img src="{{ asset('uploads/agencies/logos/' . $agency->image) }}" alt="logo" class="w-[100px] h-[100px] object-cover rounded-lg">
                        </div>
                    @endif
                    @error('logo')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                {{-- add logo ends --}}

                {{-- add documents starts --}}
                <div class="rounded-lg p-10 bg-white mt-7">
                    <div class="w-full p-4 bg-[#F2F2F2]">
                        <div class="w-full p-4 bg-white rounded-2xl border text-center dropzone mt-4" id="document-dropzone">
                        </div>
                        <p class="mt-2">You can upload multiple files</p>
                    </div>
                    @error('document')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                {{-- add documents ends --}}

                {{-- agency documents start --}}
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
                {{-- agency documents end --}}

                {{-- location detail pricing form starts --}}
                <div class="rounded-lg px-10 py-5 bg-white mt-7">
                    <div class="w-full">
                        <div>
                            <label for="name" class="text-base font-semibold text-[#575757]">Locations</label>
                            <div class="grid xl:grid-cols-2 2xl:grid-cols-3 mt-2 gap-4">
                                <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                    <label for="country" class="text-sm font-semibold text-[#575757]">Country</label>
                                    <input type="text" name="country" id="country" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" placeholder="country" value="{{ $agency->country }}">
                                </div>
                                @error('country')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                    <label for="state" class="text-sm font-semibold text-[#575757]">State</label>
                                    <input type="text" name="state" id="state" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" placeholder="state" value="{{ $agency->state }}">
                                </div>
                                @error('state')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                    <label for="city" class="text-sm font-semibold text-[#575757]">City</label>
                                    <input type="text" name="city" id="city" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" placeholder="city" value="{{ $agency->city }}">
                                </div>
                                @error('city')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full p-4 bg-[#F2F2F2] h-[99px] mt-3">
                                <label for="address" class="text-sm font-semibold text-[#575757]">Agency Location</label>
                                <input type="text" name="address" id="address" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" placeholder="address" value="{{ $agency->address }}">
                            </div>
                            @error('address')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- location detail pricing form ends --}}
            </div>
            <div class="col-span-4">
                <div class="w-full bg-white rounded-lg px-7 py-10">
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[99px]">
                        <label for="phone" class="text-sm font-semibold text-[#575757]">Phone</label>
                        <input id="phone" type="number" name="phone" placeholder="phone number" class="w-full mt-2 text-[#575757] font-normal  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{ $agency->phone_number }}">
                    </div>
                    @error('phone')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[99px] mt-3">
                        <label for="whatsapp" class="text-sm font-semibold text-[#575757]">Whatsapp</label>
                        <input id="whatsapp" type="number" name="whatsapp" placeholder="whatsapp number" class="w-full mt-2 text-[#575757] font-normal  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]"  value="{{ $agency->whatsapp_number }}">
                    </div>
                    @error('whatsapp')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[99px] mt-3">
                        <label for="email" class="text-sm font-semibold text-[#575757]">Email</label>
                        <input id="email" type="text" name="email" placeholder="email" readonly class="w-full mt-2 text-[#575757] font-normal  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{$agency->email}}">
                    </div>
                </div>
                <div class="w-full mt-7">
                    <button type="submit" class="w-full px-8 py-3 text-[16px] font-semibold bg-primary hover:bg-primaryHover  text-white rounded-lg">Update</a>
                </div>
            </div>
        </div>
    </form>
    <div class="grid grid-cols-12 gap-8 mb-4">
        <div class="col-span-12">
        {{-- agents images starts --}}
        <div class="rounded-lg px-10 py-8 bg-white mt-7">
            <label for="name" class="text-base font-semibold text-[#575757]">Agents</label>
            <div class="grid grid-cols-2 2xl:grid-cols-4 mt-7 gap-4">
                @foreach($agency->agents as $agent)
                <div>
                    <img src="{{ asset('uploads/agents/photos/' . $agent->photo) }}" alt="Agent Photo" class="w-full rounded-t-lg">
                    <div class="border-r border-l border-b rounded-b-lg p-5">
                        <h1 class="text-primary text-[18px] font-semibold">{{ $agent->name }}</h1>
                        <p class="text-xs font-normal mt-3">{{ $agent->city }}, {{ $agent->country }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- agents images ends --}}
        </div>
    </div>
</section>
<script>
    var uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
        url: "{{ route('agency.document.store') }}",
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