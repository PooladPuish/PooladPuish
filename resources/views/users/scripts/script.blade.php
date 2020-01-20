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
        $('#createNewProduct').click(function () {
            $('#ajaxModel').modal('show');
            $('#id').val('');
            $('#name').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#password').val('');
        });
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            "language": {
                "search": "جستجو:",
                "lengthMenu": "نمایش _MENU_",
                "zeroRecords": "موردی یافت نشد!",
                "info": "نمایش _PAGE_ از _PAGES_",
                "infoEmpty": "موردی یافت نشد",
                "infoFiltered": "(جستجو از _MAX_ مورد)",
                "processing": "در حال پردازش اطلاعات"
            },
            ajax: "{{ route('admin.user.show') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'role', name: 'role'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'online', name: 'online'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('body').on('click', '.editProduct', function () {
            var product_id = $(this).data('id');
            $.get("{{ route('admin.user.u') }}" + '/' + product_id, function (data) {
                $('#ajaxModel').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#phone').val(data.phone);

            })
        });
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('admin.user.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    if (data.errors) {
                        $('#ajaxModel').modal('hide');
                        jQuery.each(data.errors, function (key, value) {
                            Swal.fire({
                                title: 'خطا!',
                                text: value,
                                icon: 'error',
                                confirmButtonText: 'تایید'
                            })
                        });

                    }
                    if (data.success) {
                        $('#ajaxModel').modal('hide');
                        table.draw();
                        Swal.fire({
                            title: 'موفق',
                            text: 'مشخصات کاربر با موفقیت در سیستم ثبت شد',
                            icon: 'success',
                            confirmButtonText: 'تایید',
                        });

                    }

                }
            });
        });
        $('body').on('click', '.status', function () {
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{route('admin.user.disable')}}" + '/' + id,
                success: function (data) {
                    if (data.errors) {
                        table.draw();
                        Swal.fire({
                            title: 'موفق!',
                            text: data.errors,
                            icon: 'error',
                            confirmButtonText: 'تایید'
                        })
                    }
                    if (data.success) {
                        table.draw();
                        Swal.fire({
                            title: 'موفق',
                            text: data.success,
                            icon: 'success',
                            confirmButtonText: 'تایید',
                        });

                    }

                }
            });
        });

        $('#admin-user').addClass('active');
    });
</script>
