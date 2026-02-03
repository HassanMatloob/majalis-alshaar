@extends('admin.layouts.app')
@section('title', 'Agent - Enquiries')
@section('admin.content')
<h1 class="text-4xl font-semibold text-[#575757]">Enquiries</h1>
<section class="mt-12 bg-white p-7 mb-9 rounded-[10px]">
    <div class="flex justify-between">
        <div class="flex gap-11 items-center">
            <h1 class="text-[#575757] text-[20px] font-semibold">Enquiries</h1>
            <div class="flex items-center justify-center">
                <input type="text" id="search" placeholder="Search"
                class="w-full text-black bg-[#f7f7f7] text-sm focus:outline-none h-[43px] sm:h-full p-2">
                <i class='bx bx-search text-primary bg-[#f7f7f7] p-2'></i> 
           </div>
        </div>
        <div class="flex gap-6">
            <button class="w-[118px] h-[44px] text-sm font-semibold bg-primary hover:bg-primaryHover  text-white rounded-lg">Export CSV</button>
            <button class="w-[107px] h-[44px] text-sm font-semibold bg-primary hover:bg-primaryHover  text-white rounded-lg">Reload</button>
        </div>
    </div>
    <div class="overflow-x-auto scroll-bar mt-14">
        <table class="w-full min-w-[1200px]">
            <thead>
                <tr>
                    <th class="text-left text-xs font-medium text-black opacity-50">
                        <input type="checkbox" class="w-3 h-3">
                    </th>
                    <th class="text-left text-xs font-medium text-black opacity-50">ID</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">PHONE</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">EMAIL</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">SUBJECT</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">MESSAGE</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">DATE</th>
                    <th class="text-right text-xs font-medium text-black opacity-50">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <!-- Repeat this block for each row -->
                <tr>
                    <td class="pt-10 text-xs font-bold text-secondary">
                        <input type="checkbox" class="w-3 h-4">
                    </td>
                    <td class="pt-10 text-xs font-bold text-secondary">Miracle Hahn</td>
                    <td class="pt-10  text-sm text-black font-bold">
                        +971 123 1122 12
                    </td>
                    <td class="pt-10 text-xs font-bold text-black">example@mail.com</td>
                    <td class="pt-10 text-xs font-bold text-primary">Need Detail</td>
                    <td class="pt-10  text-sm text-black font-bold w-[40%]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vulputate odio nisl, in blandit nibh maximus id. Pellentesque elementum purus vitae dolor viverra pharetra. Vestibulum ante ipsum primis in faucibus 
                    </td>
                    <td class="pt-10 text-xs font-bold text-primary">21-02-2023</td>
                    <td class="pt-10 flex justify-end">
                        <i class='bx bx-trash-alt text-2xl bg-primary hover:bg-primaryHover text-white p-2 rounded-lg'></i>
                    </td>
                </tr>
                <tr>
                    <td class="pt-7 text-xs font-bold text-secondary">
                        <input type="checkbox" class="w-3 h-4">
                    </td>
                    <td class="pt-7 text-xs font-bold text-secondary">Miracle Hahn</td>
                    <td class="pt-7  text-sm text-black font-bold">
                        +971 123 1122 12
                    </td>
                    <td class="pt-7 text-xs font-bold text-black">example@mail.com</td>
                    <td class="pt-7 text-xs font-bold text-primary">Need Detail</td>
                    <td class="pt-7  text-sm text-black font-bold w-[40%]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vulputate odio nisl, in blandit nibh maximus id. Pellentesque elementum purus vitae dolor viverra pharetra. Vestibulum ante ipsum primis in faucibus 
                    </td>
                    <td class="pt-7 text-xs font-bold text-primary">21-02-2023</td>
                    <td class="pt-7 flex justify-end">
                        <i class='bx bx-trash-alt text-2xl bg-primary hover:bg-primaryHover text-white p-2 rounded-lg'></i>
                    </td>
                </tr>
                <tr>
                    <td class="pt-7 text-xs font-bold text-secondary">
                        <input type="checkbox" class="w-3 h-4">
                    </td>
                    <td class="pt-7 text-xs font-bold text-secondary">Miracle Hahn</td>
                    <td class="pt-7  text-sm text-black font-bold">
                        +971 123 1122 12
                    </td>
                    <td class="pt-7 text-xs font-bold text-black">example@mail.com</td>
                    <td class="pt-7 text-xs font-bold text-primary">Need Detail</td>
                    <td class="pt-7  text-sm text-black font-bold w-[40%]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vulputate odio nisl, in blandit nibh maximus id. Pellentesque elementum purus vitae dolor viverra pharetra. Vestibulum ante ipsum primis in faucibus 
                    </td>
                    <td class="pt-7 text-xs font-bold text-primary">21-02-2023</td>
                    <td class="pt-7 flex justify-end">
                        <i class='bx bx-trash-alt text-2xl bg-primary hover:bg-primaryHover text-white p-2 rounded-lg'></i>
                    </td>
                </tr>
                <tr>
                    <td class="pt-7 text-xs font-bold text-secondary">
                        <input type="checkbox" class="w-3 h-4">
                    </td>
                    <td class="pt-7 text-xs font-bold text-secondary">Miracle Hahn</td>
                    <td class="pt-7  text-sm text-black font-bold">
                        +971 123 1122 12
                    </td>
                    <td class="pt-7 text-xs font-bold text-black">example@mail.com</td>
                    <td class="pt-7 text-xs font-bold text-primary">Need Detail</td>
                    <td class="pt-7  text-sm text-black font-bold w-[40%]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vulputate odio nisl, in blandit nibh maximus id. Pellentesque elementum purus vitae dolor viverra pharetra. Vestibulum ante ipsum primis in faucibus 
                    </td>
                    <td class="pt-7 text-xs font-bold text-primary">21-02-2023</td>
                    <td class="pt-7 flex justify-end">
                        <i class='bx bx-trash-alt text-2xl bg-primary hover:bg-primaryHover text-white p-2 rounded-lg'></i>
                    </td>
                </tr>
                <tr>
                    <td class="pt-7 text-xs font-bold text-secondary">
                        <input type="checkbox" class="w-3 h-4">
                    </td>
                    <td class="pt-7 text-xs font-bold text-secondary">Miracle Hahn</td>
                    <td class="pt-7  text-sm text-black font-bold">
                        +971 123 1122 12
                    </td>
                    <td class="pt-7 text-xs font-bold text-black">example@mail.com</td>
                    <td class="pt-7 text-xs font-bold text-primary">Need Detail</td>
                    <td class="pt-7  text-sm text-black font-bold w-[40%]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vulputate odio nisl, in blandit nibh maximus id. Pellentesque elementum purus vitae dolor viverra pharetra. Vestibulum ante ipsum primis in faucibus 
                    </td>
                    <td class="pt-7 text-xs font-bold text-primary">21-02-2023</td>
                    <td class="pt-7 flex justify-end">
                        <i class='bx bx-trash-alt text-2xl bg-primary hover:bg-primaryHover text-white p-2 rounded-lg'></i>
                    </td>
                </tr>
                <tr>
                    <td class="pt-7 text-xs font-bold text-secondary">
                        <input type="checkbox" class="w-3 h-4">
                    </td>
                    <td class="pt-7 text-xs font-bold text-secondary">Miracle Hahn</td>
                    <td class="pt-7  text-sm text-black font-bold">
                        +971 123 1122 12
                    </td>
                    <td class="pt-7 text-xs font-bold text-black">example@mail.com</td>
                    <td class="pt-7 text-xs font-bold text-primary">Need Detail</td>
                    <td class="pt-7  text-sm text-black font-bold w-[40%]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vulputate odio nisl, in blandit nibh maximus id. Pellentesque elementum purus vitae dolor viverra pharetra. Vestibulum ante ipsum primis in faucibus 
                    </td>
                    <td class="pt-7 text-xs font-bold text-primary">21-02-2023</td>
                    <td class="pt-7 flex justify-end">
                        <i class='bx bx-trash-alt text-2xl bg-primary hover:bg-primaryHover text-white p-2 rounded-lg'></i>
                    </td>
                </tr>
                <tr>
                    <td class="pt-7 text-xs font-bold text-secondary">
                        <input type="checkbox" class="w-3 h-4">
                    </td>
                    <td class="pt-7 text-xs font-bold text-secondary">Miracle Hahn</td>
                    <td class="pt-7  text-sm text-black font-bold">
                        +971 123 1122 12
                    </td>
                    <td class="pt-7 text-xs font-bold text-black">example@mail.com</td>
                    <td class="pt-7 text-xs font-bold text-primary">Need Detail</td>
                    <td class="pt-7  text-sm text-black font-bold w-[40%]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vulputate odio nisl, in blandit nibh maximus id. Pellentesque elementum purus vitae dolor viverra pharetra. Vestibulum ante ipsum primis in faucibus 
                    </td>
                    <td class="pt-7 text-xs font-bold text-primary">21-02-2023</td>
                    <td class="pt-7 flex justify-end">
                        <i class='bx bx-trash-alt text-2xl bg-primary hover:bg-primaryHover text-white p-2 rounded-lg'></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="flex justify-between items-center mt-16">
        <div>
            <h1 class="text-[#575757] text-base font-normal">Showing <span class="text-base font-bold"> 10 record of 50</span></h1>
        </div>
        <div class="flex gap-3">
            <button class="w-[107px] h-[44px] text-sm font-semibold bg-primary text-white rounded-lg hover:bg-primaryHover">Previous</button>
            <button class="w-[107px] h-[44px] text-sm font-semibold bg-primary text-white rounded-lg hover:bg-primaryHover">Next</button>
        </div>
    </div>
</section>

@endsection