@extends('admin.layouts.app')
@section('title', 'Agency - Listing Requests')
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
<div class="flex justify-between items-center">
    <div>
        <h1 class="text-[#575757] text-4xl font-semibold">Listing Requests</h1>
    </div>
    <div>
       <a href="{{ route('agency.listing.add') }}" class="text-white bg-primary hover:bg-primaryHover px-8 py-4 rounded-lg text-base font-semibold">Add Property</a>
    </div>
</div>
<section class="p-6 bg-white rounded-[6px] mt-12 mb-10">
    <div class="flex justify-between">
        <div class="flex gap-5 items-center">
            <h1 class="text-[#575757] text-[20px] font-semibold">Top Properties</h1>
            {{--<div class="flex items-center justify-center">
                <input type="text" id="search" placeholder="Search"
                class="w-full text-black bg-[#f7f7f7] text-sm focus:outline-none h-[43px] sm:h-full p-2">
                <i class='bx bx-search text-primary bg-[#f7f7f7] p-2'></i> 
           </div>--}}
        </div>
        <div class="flex gap-3">
            <div class="flex gap-1">
                <button class="active w-[77px] h-[44px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg hover:bg-[#EAEAFF]" id="all">All</button>
                <button class="w-[90px] h-[44px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg hover:bg-[#EAEAFF]" id="for_sale">For Sale</button>
                <button class="w-[90px] h-[44px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg hover:bg-[#EAEAFF]" id="for_rent">For Rent</button>
                <button class="w-[90px] h-[44px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg hover:bg-[#EAEAFF]" id="featured">Featured</button>
            </div>
            <button class="w-[100px] h-[44px] text-sm font-semibold bg-primary hover:bg-primaryHover rounded-lg text-white">Export CSV</button>
            <button class="w-[80px] h-[44px] text-sm font-semibold bg-primary hover:bg-primaryHover rounded-lg text-white">Reload</button>
        </div>
    </div>
    <div class="xl:col-span-8 col-span-12 mt-7">
        <div class="overflow-x-auto scroll-bar mt-14">
            <table class="w-full min-w-[1150px]" id="listingTable">
                <thead>
                    <tr>
                        {{-- <th class="text-left text-xs font-medium text-black opacity-50">
                            <input type="checkbox" class="w-3 h-3" id="check_all">
                        </th> --}}
                        <th class="text-left text-xs font-medium text-black opacity-50">ID</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">IMAGE</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">NAME</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">AGENCY</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">PROMOTION</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">DATE</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">TYPE</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">CATEGORY</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">STATUS</th>
                        <th class="text-right text-xs font-medium text-black opacity-50">ACTIONS</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var ajaxConfig = {
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('agency.listings.fetch', ['filter' => 'all']) }}",
                type: 'POST',
                data: {}
            },
            columns: [
                {{-- {
                    data: 'check',
                    name: 'check',
                    searchable: false,
                    orderable: false
                }, --}}
                {
                    data: 'counter',
                    name: 'counter'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'agency',
                    name: 'agency'
                },
                {
                    data: 'promotion',
                    name: 'promotion'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'status',
                    name: 'status'
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
        }

        $('#listingTable').DataTable(ajaxConfig);

        $('button').on('click', (e) => {
            const buttonId = e.target.id;
            if(buttonId == 'all' || buttonId == 'for_sale' || buttonId == 'for_rent' || buttonId == 'featured') {
                $(e.target).addClass('active').siblings().removeClass('active');
                ajaxConfig.ajax = "{{ route('agency.listings.fetch', ['filter' => ':filter']) }}".replace(':filter', buttonId);
                $('#listingTable').DataTable().ajax.url(ajaxConfig.ajax).load();
            }
        });

        {{--
        $("#check_all").on("click", function() {
            $(".checkbox").prop("checked", $(this).prop("checked"));
        });
        --}}
    });
</script>
@endsection