@extends('admin.layouts.app')
@section('title', 'Agent - Dashboard')
@section('admin.content')
<section class="grid xl:grid-cols-4 grid-cols-3 gap-7">
    <div class="bg-white h-28 p-5 rounded-lg">
        <h1 class="text-5xl font-semibold text-secondary">{{ number_format($activeProperties) }}</h1>
        <p class="text-black text-sm mt-1 font-normal">Active Properties</p>
    </div>
    <div class="bg-white h-28 p-5 rounded-lg">
        <h1 class="text-5xl font-semibold text-secondary">{{ number_format($pendingProperties) }}</h1>
        <p class="text-black text-sm mt-1 font-normal">Pending Properties</p>
    </div>
    <div class="bg-white h-28 p-5 rounded-lg">
        <h1 class="text-5xl font-semibold text-secondary">{{ number_format($disapprovedProperties) }}</h1>
        <p class="text-black text-sm mt-1 font-normal">Disapproved Properties</p>
    </div>
</section>
<section class="grid grid-cols-12 mt-10 gap-7">
    <div class=" p-5 bg-white rounded-[10px] col-span-12">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-black font-semibold text-base">Recent Properties</h1>
            </div>
            <div>
                <div class="flex flex-wrap justify-start gap-[10px] w-full">
                    <button class="active hover:bg-[#EAEAFF] active w-[56px] h-[36px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg" id="all">All</button>
                    <button class="hover:bg-[#EAEAFF] w-[90px] h-[36px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg" id="for_sale">For Sale</button>
                    <button class="hover:bg-[#EAEAFF] w-[88px] h-[36px] text-base font-semibold border border-primary text-primary focus:outline-none rounded-lg" id="for_rent">For Rent</button>
                </div>
            </div>
        </div>
        <div class="w-full mt-12">
            <div class="overflow-x-auto scroll-bar">
                <table class="w-full min-w-[990px] bg-white" id="listingTable">
                    <thead>
                        <tr>
                            <th class="text-left text-xs font-medium text-black opacity-50">ID</th>
                            <th class="text-left text-xs font-medium text-black opacity-50">IMAGE</th>
                            <th class="text-left text-xs font-medium text-black opacity-50">NAME</th>
                            <th class="text-left text-xs font-medium text-black opacity-50">STATUS</th>
                            <th class="text-left text-xs font-medium text-black opacity-50">CATEGORY</th>
                            <th class="text-right text-xs font-medium text-black opacity-50">ACTION</th>
                        </tr>
                    </thead>
                </table>
            </div>
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
                url: "{{ route('agent.recent.listings.fetch', ['filter' => 'all']) }}",
                type: 'POST',
                data: {}
            },
            columns: [
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
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    orderable: false
                }
            ],
            order: [
                [1, 'asc']
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
                ajaxConfig.ajax = "{{ route('agent.recent.listings.fetch', ['filter' => ':filter']) }}".replace(':filter', buttonId);
                $('#listingTable').DataTable().ajax.url(ajaxConfig.ajax).load();
            }
        });
    });
</script>
@endsection