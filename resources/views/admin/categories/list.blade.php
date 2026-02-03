@extends('admin.layouts.app')
@section('title', 'Admin - Categories')
@section('admin.content')
<style>
    #categoryTable_wrapper input[type="search"],
    #categoryTable_wrapper select[name="categoryTable_length"],
    #categoryTable_wrapper ul.pagination > a {
        background-color: #f5f5f5 !important;
        color: #000 !important;
        border: 1px solid gainsboro;
    }
</style>
@session('success')
    <div class="col-span-12 my-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    </div>
@endsession
@session('error')
    <div class="col-span-12 my-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    </div>
@endsession
<section class="flex justify-between items-center">
    <h1 class="text-4xl font-semibold text-[#575757] justify-self-start">Categories</h1>
    <a href="{{ route('admin.categories.create') }}" class="px-3 py-3 text-base font-semibold bg-primary hover:bg-primaryHover justify-self-end text-white rounded-lg">Add Category</a>
</section>
<section class="mt-12 bg-white p-7 mb-9 rounded-[10px]">
    <div class="overflow-x-auto scroll-bar">
        <table class="w-full" id="categoryTable">
            <thead>
                <tr>
                    <th class="text-left text-xs font-medium text-black opacity-50">
                        <input type="checkbox" class="w-3 h-3" id="check_all">
                    </th>
                    <th class="text-left text-xs font-medium text-black opacity-50">NAME</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">PARENT CATEGORY</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">ORDER</th>
                    <th class="text-left text-xs font-medium text-black opacity-50">Status</th>
                    <th class="text-right text-xs font-medium text-black opacity-50">Action</th>
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
    $('#categoryTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "{{ route('admin.categories.fetch') }}",
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
                data: 'name',
                name: 'name'
            },
            {
                data: 'parent',
                name: 'parent'
            },
            {
                data: 'order',
                name: 'order'
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