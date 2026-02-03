@extends('admin.layouts.app')
@section('title', 'Admin - Agencies')
@section('admin.content')
<h1 class="text-4xl font-semibold text-[#575757]">Agencies</h1>
<section class="mt-12 bg-white p-7 mb-9 rounded-[10px]">
    <div class="flex justify-between">
        <div class="flex gap-11 items-center">
            <h1 class="text-[#575757] text-[20px] font-semibold">Agencies</h1>
            <div class="flex items-center justify-center">
                <input type="text" id="search" placeholder="Search"
                class="w-full text-black bg-[#f7f7f7] text-sm focus:outline-none h-[43px] sm:h-full p-2">
                <i class='bx bx-search text-primary bg-[#f7f7f7] p-2'></i> 
           </div>
        </div>
        <div class="flex gap-6">
            <button class="w-[118px] h-[44px] text-sm font-semibold bg-primary hover:bg-primaryHover rounded-lg text-white">Export CSV</button>
            <button class="w-[107px] h-[44px] text-sm font-semibold bg-primary hover:bg-primaryHover rounded-lg text-white">Reload</button>
        </div>
    </div>
    <div class="overflow-x-auto scroll-bar mt-14">
        <table class="w-full min-w-[950px]" id="agencies-table">
            <thead>
                <tr>
                    {{--<th class="text-left text-xs font-medium text-black opacity-50">
                        <input type="checkbox" class="w-3 h-3" id="check_all">
                    </th>--}}
                    <th class="text-left text-xs font-medium text-black opacity-50">ID</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">IMAGE</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">NAME</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">PLAN</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">LOCATION</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">DATE CREATED</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">STATUS</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">LISTINGS</th>
                    <th class="text-right text-xs font-medium text-black opacity-50">APPROVAL</th>
                </tr>
            </thead>
            <tbody>
                <!-- Repeat this block for each row -->
                {{--<tr>
                    <td class="pt-10 text-xs font-bold text-secondary">
                        <input type="checkbox" class="w-3 h-4">
                    </td>
                    <td class="pt-10 text-xs font-bold text-secondary">121</td>
                    <td class="pt-10 ">
                        <img src="/images/admin-images-1.png" alt="Property Image" class="w-16 h-10 object-cover">
                    </td>
                    <td class="pt-10 text-xs font-bold text-primary">Top Floor Furnished Sea View</td>
                    <td class="pt-10  text-sm">
                        <span class="inline-block px-5 py-1 text-xs text-primary font-normal bg-[#EAEAFF] rounded-2xl">Standard</span>
                    </td>
                    <td class="pt-10 text-xs font-bold text-primary">Dubai, UAE</td>
                    <td class="pt-10 text-xs font-bold text-black">21-02-2023</td>
                    <td class="pt-10  text-sm">
                        <span class="inline-block px-7 py-1 text-xs text-primary font-normal bg-[#EAEAFF] rounded-2xl">Active</span>
                    </td>
                    <td class="pt-10 text-xs font-bold text-black">15</td>
                    <td class="pt-10 flex justify-end text-sm">
                        <a href="{{ route('admin.agency.detail', ['agency' => 1]) }}" class="text-xs font-semibold text-white px-7 py-2 rounded-lg hover:bg-primaryHover bg-primary">View</a>
                    </td>
                </tr>--}}
            </tbody>
        </table>
    </div>
    {{--<div class="flex justify-between items-center mt-16">
        <div>
            <h1 class="text-[#575757] text-base font-normal">Showing <span class="text-base font-bold"> 10 record of 50</span></h1>
        </div>
        <div class="flex gap-6">
            <button class="w-[107px] h-[44px] text-sm font-semibold bg-primary text-white rounded-lg hover:bg-primaryHover">Previous</button>
            <button class="w-[107px] h-[44px] text-sm font-semibold bg-primary text-white rounded-lg hover:bg-primaryHover">Next</button>
        </div>
    </div>--}}
</section>
<script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#agencies-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "{{ route('admin.agencies.fetch') }}",
        type: 'POST',
        data: {}
        },
        columns: [
            {{--{
                data: 'check',
                name: 'check',
                searchable: false,
                orderable: false
            },--}}
            {
                data: 'counter',
                name: 'counter'
            },
            {
                data: 'image',
                name: 'image'
            },
            {
                data: 'agency_name',
                name: 'agency_name'
            },
            {
                data: 'plan',
                name: 'plan'
            },
            {
                data: 'location',
                name: 'location'
            },
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'listings',
                name: 'listings'
            },
            {
                data: 'action',
                name: 'action',
                searchable: false,
                orderable: false
            }
        ],
        order: [
            [0, 'asc']
        ],
        "initComplete": function() {
            table.columns().every(function() {
                var that = this;
                $('input', this.footer()).on('keyup change', function() {
                that.search(this.value).draw();
                });
            });
        },
 
    });

    {{--$("#check_all").on("click", function() {
        $(".checkbox").prop("checked", $(this).prop("checked"));
    });--}}
</script>
@endsection