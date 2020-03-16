<script src="{{asset('/public/js/a1.js')}}" type="text/javascript"></script>
<script src="{{asset('/public/js/a2.js')}}" type="text/javascript"></script>
<meta name="_token" content="{{ csrf_token() }}"/>
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var device1 = $('.device1').DataTable({
            processing: true,
            serverSide: true,
            rowreorder: true,
            retrieve: true,
            aaSorting: [],
            "searching": false,
            "lengthChange": false,
            "info": false,
            "bPaginate": false,
            "bSort": false,
            "language": {
                "search": "جستجو:",
                "lengthMenu": "نمایش _MENU_",
                "zeroRecords": "موردی یافت نشد!",
                "info": "نمایش _PAGE_ از _PAGES_",
                "infoEmpty": "موردی یافت نشد",
                "infoFiltered": "(جستجو از _MAX_ مورد)",
                "processing": "در حال پردازش اطلاعات"
            },
            ajax: "{{ route('admin.Manufacturing.device1.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'product', name: 'product'},
                {data: 'color', name: 'color'},
                {data: 'number', name: 'number'},
                {data: 'format', name: 'format'},
                {data: 'insert', name: 'insert'},
                {data: 'size', name: 'size'},
                {data: 'numberproduced', name: 'numberproduced'},
            ]
        });

        var device2 = $('.device2').DataTable({
            processing: true,
            serverSide: true,
            rowreorder: true,
            retrieve: true,
            aaSorting: [],
            "searching": false,
            "lengthChange": false,
            "info": false,
            "bPaginate": false,
            "bSort": false,
            "language": {
                "search": "جستجو:",
                "lengthMenu": "نمایش _MENU_",
                "zeroRecords": "موردی یافت نشد!",
                "info": "نمایش _PAGE_ از _PAGES_",
                "infoEmpty": "موردی یافت نشد",
                "infoFiltered": "(جستجو از _MAX_ مورد)",
                "processing": "در حال پردازش اطلاعات"
            },
            ajax: "{{ route('admin.Manufacturing.device2.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'product', name: 'product'},
                {data: 'color', name: 'color'},
                {data: 'number', name: 'number'},
                {data: 'format', name: 'format'},
                {data: 'insert', name: 'insert'},
                {data: 'size', name: 'size'},
                {data: 'numberproduced', name: 'numberproduced'},
            ]
        });


        var device3 = $('.device3').DataTable({
            processing: true,
            serverSide: true,
            rowreorder: true,
            retrieve: true,
            aaSorting: [],
            "searching": false,
            "lengthChange": false,
            "info": false,
            "bPaginate": false,
            "bSort": false,
            "language": {
                "search": "جستجو:",
                "lengthMenu": "نمایش _MENU_",
                "zeroRecords": "موردی یافت نشد!",
                "info": "نمایش _PAGE_ از _PAGES_",
                "infoEmpty": "موردی یافت نشد",
                "infoFiltered": "(جستجو از _MAX_ مورد)",
                "processing": "در حال پردازش اطلاعات"
            },
            ajax: "{{ route('admin.Manufacturing.device3.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'product', name: 'product'},
                {data: 'color', name: 'color'},
                {data: 'number', name: 'number'},
                {data: 'format', name: 'format'},
                {data: 'insert', name: 'insert'},
                {data: 'size', name: 'size'},
                {data: 'numberproduced', name: 'numberproduced'},
            ]
        });


    });
    $('#manufacturing').addClass('active');
</script>
