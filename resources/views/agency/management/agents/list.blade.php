@extends('admin.layouts.app')
@section('title', 'Agency - Management - Agents')
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
<section class="flex justify-between items-center">
    <h1 class="text-4xl font-semibold text-[#575757]">Agents</h1>
    <a href="{{ route('agency.management.agent.add') }}" class="px-5 py-3 text-base font-semibold bg-primary hover:bg-primaryHover  text-white rounded-lg">Add Agent</a>
</section>
<section class="mt-12 bg-white p-7 mb-9 rounded-[10px]">
    <div class="flex justify-between">
        <div class="flex gap-11 items-center">
            <h1 class="text-[#575757] text-[20px] font-semibold">Agencies</h1>
        </div>
    </div>
    <div class="overflow-x-auto scroll-bar mt-14">
        <table class="w-full" id="agents-table">
            <thead>
                <tr>
                    <th class="text-left text-xs font-medium text-black opacity-50">
                        <input type="checkbox" class="w-3 h-3">
                    </th>
                    <th class="text-left text-xs font-medium text-black opacity-50">ID</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">IMAGE</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">NAME</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">PHONE</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">EMAIL</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">FLOCATION</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">STATUS</th>
                    <th class="text-right text-xs font-medium text-black opacity-50">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</section>
<script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#agents-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "{{ route('agency.management.agents.fetch') }}",
        type: 'POST',
        data: {}
        },
        columns: [{
            data: 'check',
            name: 'check',
            searchable: false,
            orderable: false
            },
            {
                data: 'counter',
                name: 'counter'
            },
            {
                data: 'image',
                name: 'image'
            },
            {
                data: 'agent_name',
                name: 'agent_name'
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
 
    });

    $("#check_all").on("click", function() {
        $(".checkbox").prop("checked", $(this).prop("checked"));
    });
</script>
@endsection