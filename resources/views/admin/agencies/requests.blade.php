@extends('admin.layouts.app')
@section('title', 'Admin - Agencies Requests')
@section('admin.content')
<h1 class="text-4xl font-semibold text-[#575757]">New Agencies Requests</h1>
@session('error')
    <div class="col-span-12 mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    </div>
@endsession
<section class="mt-12 bg-white p-7 mb-9 rounded-[10px]">
    {{--<div class="flex justify-between">
        <div class="flex gap-11 items-center">
            <h1 class="text-[#575757] text-[20px] font-semibold">Agencies</h1>
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
    </div>--}}
    <table class="w-full overflow-x-auto scroll-bar mt-14" id="new-agencies-requests-table">
        <thead>
            <tr>
                {{--<th class="text-left text-xs font-medium text-black opacity-50">
                    <input type="checkbox" class="w-3 h-3" id="check_all">
                </th>--}}
                <th class="text-left text-xs font-medium text-black opacity-50">ID</th>
                <th class="text-left text-xs font-medium text-black opacity-50">NAME</th>
                <th class="text-left text-xs font-medium text-black opacity-50">PHONE</th>
                <th class="text-left text-xs font-medium text-black opacity-50">EMAIL</th>
                <th class="text-left text-xs font-medium text-black opacity-50">LOCATION</th>
                <th class="text-left text-xs font-medium text-black opacity-50">DATE</th>
                <th class="text-left text-xs font-medium text-black opacity-50">LISTINGS</th>
                <th class="text-right text-xs font-medium text-black opacity-50">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            {{--<tr>
                <td class="pt-10 text-xs font-bold text-secondary">
                    <input type="checkbox" class="w-3 h-4">
                </td>
                <td class="pt-10 text-xs font-bold text-secondary">121</td>
                <td class="pt-10 text-xs font-bold text-primary">Ultimate Real state</td>
                <td class="pt-10  text-sm text-black font-bold">
                    +971 123 1122 12
                </td>
                <td class="pt-10 text-xs font-bold text-black">example@mail.com</td>
                <td class="pt-10 text-xs font-bold text-primary">Dubai, UAE</td>
                <td class="pt-10  text-sm text-black font-bold">
                    21-05-2024
                </td>
                <td class="pt-10 text-xs font-bold text-black">15</td>
                <td class="pt-10 text-sm">
                    <i class='bx bx-trash-alt text-2xl bg-primary hover:bg-primaryHover  p-2 rounded-lg'></i>
                    <a href="{{route('admin.agency.request.detail', ['request' => 1])}}" class="text-xs font-semibold text-white px-7 py-2 flex items-center justify-center rounded-lg bg-primary hover:bg-primaryHover ">View</a>
                </td>
            </tr>--}}
        </tbody>
    </table>
    {{--<div class="flex justify-between items-center mt-16">
        <div>
            <h1 class="text-[#575757] text-base font-normal">Showing <span class="text-base font-bold"> 10 record of 50</span></h1>
        </div>
        <div class="flex gap-3">
            <button class="w-[107px] h-[44px] text-sm font-semibold bg-primary hover:bg-primaryHover  text-white rounded-lg">Previous</button>
            <button class="w-[107px] h-[44px] text-sm font-semibold bg-primary hover:bg-primaryHover  text-white rounded-lg">Next</button>
        </div>
    </div>--}}
</section>
<script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#new-agencies-requests-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "{{ route('admin.agencies.requests.fetch') }}",
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
                data: 'agency_name',
                name: 'agency_name'
            },
            {
                data: 'phone_number',
                name: 'phone_number'
            },
            {
                data: 'email',
                name: 'email'
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
                data: 'number_of_listing',
                name: 'number_of_listing'
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

    {{--    
    $("#check_all").on("click", function() {
        $(".checkbox").prop("checked", $(this).prop("checked"));
    });
    --}}
</script>
@endsection