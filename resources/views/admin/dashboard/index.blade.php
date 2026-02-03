@extends('admin.layouts.app')
@section('title', 'Admin - Dashboard')
@section('admin.content')
    <section class="grid xl:grid-cols-4 grid-cols-3 gap-4">
        <div class="bg-white h-28 p-5 rounded-lg">
            <div class="flex justify-between items-start">
                <h1 class="text-5xl font-semibold text-secondary">{{$activeCategories}}</h1>
                <i class='bx bxs-copy text-2xl'></i>
            </div>
            <p class="text-black text-sm mt-3 font-normal">Active Categories</p>
        </div>
        <div class="bg-white h-28 p-5 rounded-lg">
            <div class="flex justify-between items-start">
                <h1 class="text-5xl font-semibold text-secondary">{{$activeSubCategories}}</h1>
                <i class='bx bxs-paste text-2xl'></i>
            </div>
            <p class="text-black text-sm mt-3 font-normal">Active Sub-Categories</p>
        </div>
        <div class="bg-white h-28 p-5 rounded-lg">
            <div class="flex justify-between items-start">
                <h1 class="text-5xl font-semibold text-secondary">{{$activeProjects}}</h1>
                <i class='bx bxs-building text-2xl'></i>
            </div>
            <p class="text-black text-sm mt-3 font-normal">Active Projects</p>
        </div>
        <div class="bg-white h-28 p-5 rounded-lg">
            <div class="flex justify-between items-start">
                <h1 class="text-5xl font-semibold text-secondary">{{$messages}}</h1>
                <i class='bx bxs-message text-2xl'></i>
            </div>
            <p class="text-black text-sm mt-3 font-normal">Messages</p>
        </div>
    </section>
    <section class="grid grid-cols-12">
        <div class="mt-10 p-5 bg-white rounded-[10px] col-span-12">
            <h1 class="text-black font-semibold text-base">Recent Featured Projects</h1>
            <div class="w-full mt-12">
                    <div class="overflow-x-auto scroll-bar">
                        <table class="w-full min-w-[990px] bg-white">
                            <thead>
                                <tr>
                                    <th class="text-left text-xs font-medium text-black opacity-50">ID</th>
                                    <th class="text-left text-xs font-medium text-black opacity-50">IMAGE</th>
                                    <th class="text-left text-xs font-medium text-black opacity-50">NAME</th>
                                    <th class="text-left text-xs font-medium text-black opacity-50">CATEGORY</th>
                                    <th class="text-left text-xs font-medium text-black opacity-50">DATE</th>
                                    <th class="text-left text-xs font-medium text-black opacity-50">VIEW</th>
                                </tr>
                            </thead>
                            <tbody id="properties-container">
                                <!-- Repeat this block for each row -->
                                @foreach($featuredProjects as $featuredProject)
                                    <tr>
                                        <td class="pt-10 text-xs font-bold text-secondary">{{ $featuredProject->id }}</td>
                                        <td class="pt-10 ">
                                            <img src="{{ asset($featuredProject->images[0]->path)}} " alt="Project Image" class="w-16 h-10 object-cover">
                                        </td>
                                        <td class="pt-10 text-xs font-bold text-primary">{{ $featuredProject->title . ' (' . $featuredProject->arabic_title . ')'  }}</td>
                                        <td class="pt-10 text-xs font-bold text-black">{{ $featuredProject->category->name . ' (' . $featuredProject->category?->arabic_name . ')' }}</td>
                                        <td class="pt-10 text-xs font-bold text-primary">{{ date_format($featuredProject->created_at, 'd-m-Y') }}</td>
                                        <td class="pt-10  text-sm justify-end flex">
                                            <a href="{{ route('project.detail', $featuredProject->slug) }}" target="_blank">
                                                <button class="text-xs font-semibold text-white w-[57px] h-[30px] rounded-[6px] bg-primary hover:bg-primaryHover ">View</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </section>
@endsection