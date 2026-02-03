@extends('admin.layouts.app')
@section('title', 'Admin - Add Project')
@section('admin.content')
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

<form action="{{ route('admin.projects.store') }}" method="POST">
    @csrf
    <section class="flex justify-between items-center">
        <div class="flex gap-2 items-center">
            <a href="{{ route('admin.projects') }}">
            <i class="bx bx-arrow-back text-3xl text-[#575757]"></i>
            </a>
            <h1 class="text-3xl font-semibold text-[#575757]">Add Project</h1>
        </div>
        <button id="submit-form" class="px-8 py-2 text-base font-semibold bg-primary hover:bg-primaryHover  text-white rounded-lg">Save</button>
    </section>
    <section class="mt-20">
        <div class="grid grid-cols-12 gap-8">
            <div class="col-span-8">
                {{-- title and description starts--}}
                <div class="rounded-lg p-10 bg-white">
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[99px]">
                        <label for="title" class="text-base font-semibold text-[#575757]">Title</label>
                        <input id="title" name="title" type="text" placeholder="Add listing title here" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{ old('title') }}" required>
                    </div>
                    @error('title')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[99px] mt-4">
                        <label for="title" class="text-base font-semibold text-[#575757]">Arabic Title</label>
                        <input id="title" name="arabic_title" type="text" placeholder="Add listing arabic title here" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{ old('arabic_title') }}" required>
                    </div>
                    @error('arabic_title')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[161px] mt-4">
                        <label for="short_description" class="text-base font-semibold text-[#575757]">Short Description</label>
                        <textarea name="short_description" id="short_description" cols="30" rows="4" placeholder="This will show on listings page" class="w-full mt-2 text-[#575757] font-normal -none  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]"></textarea>
                    </div>
                    @error('short_description')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[161px] mt-4">
                        <label for="short_description" class="text-base font-semibold text-[#575757]">Arabic Short Description</label>
                        <textarea name="arabic_short_description" id="short_description" cols="30" rows="4" placeholder="This will show on listings page" class="w-full mt-2 text-[#575757] font-normal -none  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]"></textarea>
                    </div>
                    @error('arabic_short_description')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[280px] mt-4">
                        <label for="description" class="text-base font-semibold text-[#575757]">Detailed Description</label>
                        <x-quill-editor id="description" name="description" placeholder="Please type the porperty description ..." value="" />
                    </div>
                    @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[280px] mt-4">
                        <label for="description" class="text-base font-semibold text-[#575757]">Arabic Detailed Description</label>
                        <x-quill-editor id="arabic_description" name="arabic_description" placeholder="Please type the porperty arabic description ..." value="" />
                    </div>
                    @error('arabic_description')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                {{-- title and description ends--}}

                {{-- add images starts --}}
                <div class="rounded-lg p-10 bg-white mt-7">
                    <div class="w-full p-4 bg-[#F2F2F2]">
                        <h1 class="text-base text-[#575757] font-semibold">Add Images</h1>
                        <div class="w-full mt-4 p-4 bg-white rounded-2xl border text-center dropzone" id="document-dropzone">
                            
                        </div>
                    </div>
                    <p class="mt-2">You can add at least 3 and maximum 10 images</p>
                </div>
                @error('images')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
                {{-- add images ends --}}

                {{-- location detail starts --}}

                    <div class="rounded-lg px-10 py-5 bg-white my-7">
                        <div class="w-full">
                            <div>
                                <label class="text-base font-semibold text-[#575757]">Locations</label>
                                <div class="grid xl:grid-cols-2 2xl:grid-cols-3 mt-2 gap-4">
                                    <div>
                                        <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                            <label for="country" class="text-sm font-semibold text-[#575757]">Country</label>
                                            <input type="text" name="country" id="country" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{ old('title') }}" placeholder="country" required>
                                        </div>
                                        @error('country')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                            <label for="province" class="text-sm font-semibold text-[#575757]">Province</label>
                                            <input type="text" name="province" id="province" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" placeholder="province" value="{{ old('title') }}" required>
                                        </div>
                                        @error('province')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                            <label for="city" class="text-sm font-semibold text-[#575757]">City</label>
                                            <input type="text" name="city" id="city" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" placeholder="city" value="{{ old('title') }}" required>
                                        </div>
                                        @error('city')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="w-full p-5 bg-[#F2F2F2]  h-[99px]">
                                            <label for="address" class="text-sm font-semibold text-[#575757]">Property Location</label>
                                            <input id="address" name="property_location" value="{{ old('title') }}" type="text" placeholder="Google Maps link" class="w-full mt-2 text-[#575757] font-normal  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                                        </div>
                                        @error('property_location')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full p-5 mt-4 bg-[#F2F2F2]">
                                    <label for="tags" class="text-sm font-semibold text-[#575757]">Project Tags</label>
                                    <input id="tags" name="tags" type="text" 
                                        placeholder="Type and separate tags with commas (e.g. luxury, beachfront, family)" 
                                        class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:border-primary placeholder-gray-400 bg-[#F2F2F2] rounded-lg" 
                                        value="{{ old('tags') }}">
                                    <div class="mt-2 flex flex-wrap gap-2" id="tags-preview"></div>
                                    <p class="text-xs text-gray-500 mt-1">Tags help users find relevant projects. Example: <span class="font-semibold">luxury, beachfront, family</span></p>
                                </div>
                                @error('tags')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                {{-- location detail ends --}}
            </div>
            <div class="col-span-4 bg-white rounded-lg px-7 py-10 h-[437px]">
                <div class="w-full p-5 bg-[#F2F2F2]  h-[99px] mt-7">
                    <label for="category" class="text-sm font-semibold text-[#575757]">Category</label>
                    <select name="category" id="category" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                        <option value="" hidden>select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
                <div class="w-full p-5 bg-[#F2F2F2]  h-[99px] mt-7">
                    <label for="featured" class="text-sm font-semibold text-[#575757]">Is Featured</label>
                    <select name="is_featured" id="featured" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                        <option value="" hidden>Yes/No</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                @error('is_featured')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </section>
</form>
<script>
  var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = {
    url: "{{ route('admin.projects.image.store') }}",
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    acceptedFiles: ".jpeg,.jpg,.png, .webp",
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.name !== 'undefined') {
        name = file.name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="images[]"][value="' + name + '"]').remove()
    }
  }

  // Simple live preview for tags
    document.getElementById('tags').addEventListener('input', function(e) {
        const tags = e.target.value.split(',').map(t => t.trim()).filter(t => t);
        const preview = document.getElementById('tags-preview');
        preview.innerHTML = '';
        tags.forEach(tag => {
            const span = document.createElement('span');
            span.className = 'inline-block bg-primary text-white text-xs px-3 py-1 rounded-full';
            span.textContent = tag;
            preview.appendChild(span);
        });
    });
</script>
@endsection