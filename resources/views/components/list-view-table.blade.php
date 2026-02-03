<div class="overflow-x-auto scroll-bar mt-14">
    <table class="w-full min-w-[1150px]" id="">
        <thead>
            <tr>
                <th class="text-left text-xs font-medium text-black opacity-50">
                    <input type="checkbox" class="w-3 h-3">
                </th>
                <th class="text-left text-xs font-medium text-black opacity-50">ID</th>
                <th class="text-left text-xs font-medium text-black opacity-50">IMAGE</th>
                <th class="text-left text-xs font-medium text-black opacity-50">NAME</th>
                <th class="text-left text-xs font-medium text-black opacity-50">AGENCY</th>
                <th class="text-left text-xs font-medium text-black opacity-50">PROMOTION</th>
                <th class="text-left text-xs font-medium text-black opacity-50">DATE</th>
                <th class="text-left text-xs font-medium text-black opacity-50">STATUS</th>
                <th class="text-left text-xs font-medium text-black opacity-50">CATEGORY</th>
                <th class="text-left text-xs font-medium text-black opacity-50">STATUS</th>
                <th class="text-right text-xs font-medium text-black opacity-50">ACTIONS</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#rueiru").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: '',
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