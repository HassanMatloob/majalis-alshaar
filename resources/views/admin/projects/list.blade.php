@extends('admin.layouts.app')
@section('title', 'Admin - Project')
@section('admin.content')
<style>
    #listingTable_wrapper input[type="search"],
    #listingTable_wrapper select[name="listingTable_length"],
    #listingTable_wrapper ul.pagination > a {
        background-color: #f5f5f5 !important;
        color: #000 !important;
        border: 1px solid gainsboro;
    }
</style>
<section>
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
        <h1 class="text-4xl font-semibold text-[#575757] justify-self-start">Projects</h1>
        <a href="{{ route('admin.projects.create') }}" class="px-3 py-3 text-base font-semibold bg-primary hover:bg-primaryHover justify-self-end text-white rounded-lg">Add Project</a>
    </div>
    <div class="xl:col-span-8 col-span-12 p-6 bg-white rounded-[6px] mt-12 mb-10">
        <div class="overflow-x-auto scroll-bar">
            <table class="w-full min-w-[1150px]" id="listingTable">
                <thead>
                    <tr>
                        <th class="text-left text-xs font-medium text-black opacity-50">ID</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">IMAGE</th>
                        <th class="text-left text-xs font-medium text-black opacity-50" width="300px">NAME</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">PROMOTION</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">DATE</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">CATEGORY</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">STATUS</th>
                        <th class="text-left text-xs font-medium text-black opacity-50">ACTION</th>
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
                url: "{{ route('admin.projects.fetch') }}",
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
                    data: 'promotion',
                    name: 'promotion'
                },
                {
                    data: 'date',
                    name: 'date'
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

        {{--
        $("#check_all").on("click", function() {
            $(".checkbox").prop("checked", $(this).prop("checked"));
        });
        --}}
    });
</script>
@endsection