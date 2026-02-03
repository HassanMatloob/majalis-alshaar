@extends('admin.layouts.app')
@section('title', 'Admin - Messages')
@section('admin.content')
<style>
    #messagesTable_wrapper input[type="search"],
    #messagesTable_wrapper select[name="messagesTable_length"],
    #messagesTable_wrapper ul.pagination > a {
        background-color: #f5f5f5 !important;
        color: #000 !important;
        border: 1px solid gainsboro;
    }
</style>
<section class="flex justify-between items-center">
    <h1 class="text-4xl font-semibold text-[#575757] justify-self-start">Messages</h1>
</section>
<section class="mt-12 bg-white p-7 mb-9 rounded-[10px]">
    <div class="overflow-x-auto scroll-bar">
        <table class="w-full min-w-[1250px]" id="messagesTable">
            <thead>
                <tr>
                    <th class="text-left text-xs font-medium text-black opacity-50">
                        <input type="checkbox" class="w-3 h-3" id="check_all">
                    </th>
                    <th class="text-left text-xs font-medium text-black opacity-50" width="120px">DATE</th>
                    <th class="text-left text-xs font-medium text-black opacity-50" width="130px">NAME</th>
                    <th class="text-left text-xs font-medium text-black opacity-50 p-2" width="100px">PHONE NUMBER</th>
                    <th class="text-left text-xs font-medium text-black opacity-50 p-2" width="200px">EMAIL</th>
                    <th class="text-left text-xs font-medium text-black opacity-50 p-2" width="200px">SUBJECT</th>
                    <th class="text-left text-xs font-medium text-black opacity-50 p-2">MESSAGE</th>
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
    $('#messagesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "{{ route('admin.messages.fetch') }}",
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
                data: 'date',
                name: 'date'
            },
            {
                data: 'name',
                name: 'name'
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
                data: 'subject',
                name: 'subject'
            },
            {
                data: 'message',
                name: 'message',
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