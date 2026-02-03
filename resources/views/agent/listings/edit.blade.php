@extends('admin.layouts.app')
@section('title', 'Agency - Edit Listing')
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

<div class="col-span-12 mb-4" id="error_message">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">You cannot submit the form as the maximum limit of featured properties has been reached.</span>
    </div>
</div>

<form action="{{ route('agent.listing.update', ['id' => $property->id]) }}" method="post">
    @method('PUT')
    @csrf
    <section class="flex justify-between items-center">
        <div class="flex gap-2 items-center">
            <a href="{{ route('agent.listings') }}">
            <i class="bx bx-arrow-back text-3xl text-[#575757]"></i>
            </a>
            <h1 class="text-3xl font-semibold text-[#575757]">Edit Listing</h1>
        </div>
        <button id="submit-form" class="px-8 py-2 text-base font-semibold bg-primary hover:bg-primaryHover  text-white rounded-lg">Update</button>
    </section>
    <section class="mt-20">
        <div class="grid grid-cols-12 gap-8">
            <div class="col-span-8">
                {{-- title and description starts--}}
                <div class="rounded-lg p-10 bg-white">
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[99px]">
                        <label for="title" class="text-base font-semibold text-[#575757]">Title</label>
                        <input id="title" name="title" type="text" placeholder="Add listing title here" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{ $property->title }}" required>
                    </div>
                    @error('title')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[99px] mt-4">
                        <label for="title" class="text-base font-semibold text-[#575757]">Arabic Title</label>
                        <input id="title" name="arabic_title" type="text" placeholder="Add listing arabic title here" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{ $property->arabic_title }}" required>
                    </div>
                    @error('arabic_title')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[161px] mt-4">
                        <label for="short_description" class="text-base font-semibold text-[#575757]">Short Description</label>
                        <textarea name="short_description" id="short_description" cols="30" rows="4" placeholder="This will show on listings page" class="w-full mt-2 text-[#575757] font-normal -none  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]">{{ $property->short_description }}</textarea>
                    </div>
                    @error('short_description')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[161px] mt-4">
                        <label for="short_description" class="text-base font-semibold text-[#575757]">Arabic Short Description</label>
                        <textarea name="arabic_short_description" id="short_description" cols="30" rows="4" placeholder="This will show on listings page" class="w-full mt-2 text-[#575757] font-normal -none  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]">{{ $property->arabic_short_description }}</textarea>
                    </div>
                    @error('arabic_short_description')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[280px] mt-4">
                        <label for="description" class="text-base font-semibold text-[#575757]">Detailed Description</label>
                        <x-quill-editor id="description" name="description" placeholder="Please type the porperty description ..." value="{!! $property->description !!}" />
                    </div>
                    @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[280px] mt-4">
                        <label for="description" class="text-base font-semibold text-[#575757]">Arabic Detailed Description</label>
                        <x-quill-editor id="arabic_description" name="arabic_description" placeholder="Please type the porperty arabic description ..." value="{!! $property->arabic_description !!}" />
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

                {{-- location detail pricing starts --}}

                    <div class="rounded-lg px-10 py-5 bg-white my-7">
                        <div class="w-full">
                            <div>
                                <label class="text-base font-semibold text-[#575757]">Locations</label>
                                <div class="grid xl:grid-cols-2 2xl:grid-cols-3 mt-2 gap-4">
                                    <div>
                                        <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                            <label for="country" class="text-sm font-semibold text-[#575757]">Country</label>
                                            <input type="text" name="country" id="country" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" placeholder="country" value="{{ $property->country }}" required>
                                        </div>
                                        @error('country')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                            <label for="state" class="text-sm font-semibold text-[#575757]">State</label>
                                            <input type="text" name="state" id="state" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" placeholder="state" value="{{ $property->state }}"  required>
                                        </div>
                                        @error('state')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                            <label for="city" class="text-sm font-semibold text-[#575757]">City</label>
                                            <input type="text" name="city" id="city" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" placeholder="city" value="{{ $property->city }}"  required>
                                        </div>
                                        @error('city')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full p-4 bg-[#F2F2F2]  h-[99px] mt-3">
                                    <label for="address" class="text-sm font-semibold text-[#575757]">Property Location</label>
                                    <input id="address" name="property_location" type="text" placeholder="address" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{ $property->property_location }}"  required>
                                </div>
                                @error('property_location')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-8">
                                <label class="text-base font-semibold text-[#575757]">Details</label>
                                <div class="grid xl:grid-cols-2 2xl:grid-cols-4 mt-2 gap-4">
                                    <div>
                                        <div class="w-full p-4 bg-[#F2F2F2]  h-[99px]">
                                            <label for="bedrooms" class="text-sm font-semibold text-[#575757]">Bedrooms</label>
                                            <input id="bedrooms" name="bedrooms" type="number" placeholder="0" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{ $property->bedrooms }}" required>
                                        </div>
                                        @error('bedrooms')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="w-full p-4 bg-[#F2F2F2]  h-[99px]">
                                            <label for="bathrooms" class="text-sm font-semibold text-[#575757]">Bathrooms</label>
                                            <input id="bathrooms" name="bathrooms" type="number" placeholder="0" class="w-full mt-2 text-[#575757] font-normal  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{ $property->bathrooms }}" required>
                                        </div>
                                        @error('bathrooms')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="w-full p-4 bg-[#F2F2F2]  h-[99px]">
                                            <label for="floors" class="text-sm font-semibold text-[#575757]">Floors</label>
                                            <input id="floors" name="floors" type="number" placeholder="0" class="w-full mt-2 text-[#575757] font-normal  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{ $property->floors }}" required>
                                        </div>
                                        @error('floors')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="w-full p-4 bg-[#F2F2F2]  h-[99px]">
                                            <label for="area" class="text-sm font-semibold text-[#575757]">Area (sqm)</label>
                                            <input id="area" name="area" type="number" placeholder="0.00" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" step="0.01" value="{{ $property->area }}" required>
                                        </div>
                                        @error('area')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <label for="name" class="text-base font-semibold text-[#575757]">Pricing</label>
                                <div class="grid xl:grid-cols-2 2xl:grid-cols-3 mt-2 gap-4">
                                    <div>
                                        <div class="w-full p-4 bg-[#F2F2F2]  h-[99px]">
                                            <label for="price" class="text-sm font-semibold text-[#575757]">Price</label>
                                            <input id="price" name="price" type="number" placeholder="0 - AED" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" step="0.01" value="{{ $property->price }}" required>
                                        </div>
                                        @error('price')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                            <label for="currency" class="text-sm font-semibold text-[#575757]">Currency</label>
                                            {{-- <select name="currency" id="currency" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                                                <option value="" hidden>currency</option>
                                                <option value="AED" {{ $property->currency == 'AED' ? 'selected' : '' }}>AED</option>
                                                <option value="USD" {{ $property->currency == 'USD' ? 'selected' : '' }}>USD</option>
                                            </select> --}}

                                            <input id="currency" name="currency" type="text" value="USD" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" readonly>
                                        </div>
                                        @error('currency')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- location detail pricing ends --}}
            </div>
            <div class="col-span-4 bg-white rounded-lg px-7 py-10 h-[437px]">
                <div class="w-full p-5 bg-[#F2F2F2]  h-[99px]">
                    <label for="type" class="text-sm font-semibold text-[#575757]">Type</label>
                    <select name="type" id="type" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                        <option value="" hidden>rent/sell</option>
                        <option value="Rent" {{ $property->type == 'Rent' ? 'selected' : '' }}>Rent</option>
                        <option value="Sell" {{ $property->type == 'Sell' ? 'selected' : '' }}>Sell</option>
                    </select>
                </div>
                @error('type')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
                <div class="w-full p-5 bg-[#F2F2F2]  h-[99px] mt-7">
                    <label for="category" class="text-sm font-semibold text-[#575757]">Category</label>
                    <select name="category" id="category" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                        <option value="" hidden>select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $property->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
                <div class="w-full p-5 bg-[#F2F2F2]  h-[99px] mt-7">
                    <label for="featured" class="text-sm font-semibold text-[#575757]">Is Featured</label>
                    <select name="is_featured" id="featured" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                        <option value="" hidden>Active/Inactive</option>
                        <option value="1" {{ $property->is_featured ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$property->is_featured ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <p class="text-red-500" id="featured_error_message">You have reached maximum limit of featured properties.</p>
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
    url: "{{ route('agent.listing.image.store') }}",
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
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="images[]"][value="' + name + '"]').remove()
    },
    init: function () {    
        @if(isset($property) && $property->images)
            @foreach($property->images as $image)
                var file = {
                    name: "{{ $image->name }}",
                    size: {{ $image->size ?? 0 }},
                    url: "{{ asset($image->path) }}"
                };

                // Add the file to Dropzone
                this.options.addedfile.call(this, file);
                this.options.thumbnail.call(this, file, file.url); // Set the thumbnail using file URL
                // Mark the file as complete
                file.previewElement.classList.add('dz-complete');
                // Append a hidden input to the form for the file name
                $('form').append('<input type="hidden" name="images[]" value="' + file.name + '">');
            @endforeach
        @endif
    }
  }

    // var message = document.getElementById('featured_error_message');
    // message.style.display = 'none';
    // const allow = {{ $allow_add_featured_property ? 'true' : 'false' }}
    // document.getElementById('featured').addEventListener('change', function() {
    //     if(this.value == 1 && !allow) {
    //         message.style.display = 'block';
    //         document.getElementById('submit-form').disabled = true;
    //     } else {
    //         message.style.display = 'none';
    //         document.getElementById('submit-form').disabled = false;
    //     }
    // });

    $(document).ready(function() {
        var message = $('#featured_error_message');
        message.hide();
        $('#error_message').hide();
        const allow = {{ $allow_add_featured_property ? 'true' : 'false' }};
        
        $('#featured').on('change', function() {
            if (this.value == 1 && !allow) {
                message.show();
                // $('#submit-form').prop('disabled', true);
            } else {
                message.hide();
                // $('#submit-form').prop('disabled', false);
            }
        });

        $('form').on('submit', function(e) {
            var isFeatured = $('#featured').val();
            if (isFeatured == 1 && !allow) {
                e.preventDefault();
                message.show();
                $('#error_message').show();
            }
        });
    });

</script>
@endsection