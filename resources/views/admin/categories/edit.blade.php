@extends('admin.layouts.app')
@section('title', 'Admin - Edit Category')
@section('admin.content')
@session('error')
    <div class="col-span-12 mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    </div>
@endsession
<form action="{{ route('admin.categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')
    <section class="flex justify-between items-center">
        <div class="flex gap-2 items-center">
            <a href="{{ route('admin.categories') }}">
            <i class="bx bx-arrow-back text-4xl text-[#575757]"></i>
            </a>
            <h1 class="text-4xl font-semibold text-[#575757]">Edit Category</h1>
        </div>
        <button class="px-8 py-2 text-base font-semibold bg-primary hover:bg-primaryHover  text-white rounded-lg">Update</a>
    </section>
    <section class="mt-12 mb-20">
        <div class="grid grid-cols-12 gap-5">
            <div class="xl:col-span-8 col-span-12 p-10 bg-white">
                <div class="grid grid-cols-2 gap-7">
                    <div class="w-full p-4 bg-[#F2F2F2] border h-[99px]">
                        <label for="name" class="text-sm font-semibold text-black">Name</label>
                        <input id="name" name="name" type="text" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{$category->name}}" required>
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full p-4 bg-[#F2F2F2] border h-[99px]">
                        <label for="arabic_name" class="text-sm font-semibold text-black">Arabic Name</label>
                        <input id="arabic_name" name="arabic_name" type="text" class="w-full mt-2 text-black font-normal  focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" value="{{$category->arabic_name}}" required>
                        @error('arabic_name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full p-5 bg-[#F2F2F2]  border h-[99px]">
                        <label for="parent" class="text-sm font-semibold text-black">Parent Category</label>
                        <select name="parent_id" id="parent" class="w-full mt-2 text-black font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]">
                            <option value="" hidden>Select Parent Category</option>
                            @foreach ($categories as $cat)
                            <option value="{{$cat->id}}" @if($cat->id == $category->parent_id) selected @endif>{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full p-4 bg-[#F2F2F2] border h-[99px]">
                        <label for="order" class="text-sm font-semibold text-black">Order</label>
                        <input id="order" name="order" type="number" value="{{$category->order}}" class="w-full mt-2 text-black font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                        @error('order')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="xl:col-span-4 col-span-12 p-10 bg-white h-[188px]">
                <div class="w-full p-5 bg-[#F2F2F2]  border h-[99px]">
                    <label for="status" class="text-sm font-semibold text-black">Status</label>
                    <select name="status" id="status" class="w-full mt-2 text-black font-normal focus:outline-none focus:border-transparent placeholder-gray-400 bg-[#F2F2F2]" required>
                        <option value="" hidden>Active/Inactive</option>
                        <option value="1" {{$category->status ? 'selected' : '' }}>Active</option>
                        <option value="0" {{!$category->status ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </section>
</form>

@endsection