@extends('admin.layouts.app')
@section('title', 'Agency - Management - Agents - Edit')
@section('admin.content')
<style>
    ::-webkit-file-upload-button {
   display: none;
}
</style>
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
<form action="{{ route('agency.management.agent.update', ['id' => $agent->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <section class="flex justify-between items-center">
        <div class="flex gap-2 items-center">
            <a href="{{ route('agency.management.agents') }}">
            <i class="bx bx-arrow-back text-3xl text-[#575757]"></i>
            </a>
            <h1 class="text-3xl font-semibold text-[#575757]">Edit Agent</h1>
        </div>
        <button type="submit" class="px-8 py-2 text-base font-semibold bg-primary hover:bg-primaryHover  text-white rounded-lg">Update</button>
    </section>
    <section class="mt-16">
        <div class="grid grid-cols-12 gap-8 mb-10">
            <div class="col-span-8">
                {{-- add title and description starts--}}
                <div class="rounded-lg p-10 bg-white">
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[99px]">
                        <label for="name" class="text-base font-semibold text-[#575757]">Name</label>
                        <input id="name" type="text" name="name" placeholder="Add agent name here" value="{{ $agent->name }}" class="w-full mt-2 text-[#575757] font-normal  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                    </div>
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[99px] mt-7">
                        <label for="phone" class="text-sm font-semibold text-[#575757]">Phone</label>
                        <input id="phone" type="number" name="phone" placeholder="phone number" class="w-full mt-2 text-[#575757] font-normal  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{$agent->phone_number}}" required>
                    </div>
                    @error('phone')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="w-full p-4 bg-[#F2F2F2]  h-[99px] mt-7">
                        <label for="email" class="text-sm font-semibold text-[#575757]">Email</label>
                        <input id="email" type="text" name="email" placeholder="email" class="w-full mt-2 text-[#575757] font-normal  focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{$agent->email}}" required>
                    </div>
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="grid xl:grid-cols-2 2xl:grid-cols-3 mt-7 gap-4">
                        <div>
                            <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                <label for="country" class="text-sm font-semibold text-[#575757]">Country</label>
                                <input type="text" name="country" id="country" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" placeholder="country" value="{{ $agent->country }}" required>
                            </div>
                            @error('country')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                <label for="state" class="text-sm font-semibold text-[#575757]">State</label>
                                <input type="text" name="state" id="state" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" placeholder="state" value="{{ $agent->state }}" required>
                            </div>
                            @error('state')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                                <label for="city" class="text-sm font-semibold text-[#575757]">City</label>
                                <input type="text" name="city" id="city" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:-transparent placeholder-gray-400 bg-[#F2F2F2]" placeholder="city" value="{{ $agent->city }}" required>
                            </div>
                            @error('city')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- add logo starts --}}
                    <div class="w-full p-4 bg-[#F2F2F2] mt-7">
                        <h1 class="text-base text-[#575757] font-semibold">Add Photo</h1>
                        <div class="border-2 border-dashed border-[#d3d3d3] py-10 justify-center w-full flex flex-col items-center rounded-xl mt-6 bg-white">
                            <label for="imageUpload" class="cursor-pointer flex justify-center items-center w-[174px] h-[49px] bg-primary text-white rounded-lg">
                                Upload Image
                            </label>
                            <input type="file" id="imageUpload" name="photo" accept="image/png, image/jpeg, image/jpg" class="pl-[190px] pt-4">
                            <p class="mt-3">Click to upload images from your computer</p>
                            <p class="mt-2">supports png, jpg and jpeg</p>
                        </div>
                    </div>
                    @if($agent->photo)
                        <div class="w-full mt-4">
                            <img src="{{ asset('uploads/agents/photos/' . $agent->photo) }}" alt="logo" class="w-[100px] h-[100px] object-cover rounded-lg">
                        </div>
                    @else
                        <div>
                            <p>No photo uploaded</p>
                        </div>
                    @endif
                    @error('photo')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    {{-- add logo ends --}}
                </div>
                {{-- add title and description ends--}}
            </div>
            <div class="col-span-4 bg-white rounded-lg px-7 py-10 h-[200px]">
                <div class="w-full">
                    <div class="w-full p-5 bg-[#F2F2F2] h-[99px]">
                        <label for="status" class="text-sm font-semibold text-[#575757]">Status</label>
                        <select name="status" id="status" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                            <option value="" hidden>Active/Inactive</option>
                            <option value="1" {{$agent->status ? 'selected' : ''}}>Active</option>
                            <option value="0" {{!$agent->status ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>
                    @error('status')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    {{--<div class="w-full p-5 bg-[#F2F2F2] h-[99px] mt-6">
                        <label for="top-agent" class="text-sm font-semibold text-[#575757]">Top Agent</label>
                        <select name="top_agent" id="top-agent" class="w-full mt-2 text-[#575757] font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                            <option value="" hidden>Yes/No</option>
                            <option value="1" {{$agent->top_agent ? 'selected' : ''}}>Yes</option>
                            <option value="0" {{!$agent->top_agent ? 'selected' : ''}}>No</option>
                        </select>
                    </div>
                    @error('top_agent')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror--}}
                </div>
            </div>
        </div>
    </section>
</form>
@endsection
