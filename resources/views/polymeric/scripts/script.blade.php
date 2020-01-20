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
            ajax: "{{ route('admin.polymeric.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'code', name: 'code'},
                {data: 'type', name: 'type'},
                {data: 'grid', name: 'grid'},
                {data: 'name', name: 'name'},
                {data: 'product', name: 'product'},
                {data: 'description', name: 'description'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('#createNewProduct').click(function () {
            $('#productForm').trigger("reset");
            $('#ajaxModel').modal('show');
            $('#product').val('');
        });
        $('body').on('click', '.editProduct', function () {
            var product_id = $(this).data('id');
            $.get("{{ route('admin.polymeric.update') }}" + '/' + product_id, function (data) {
                $('#ajaxModel').modal('show');
                $('#product').val(data.id);
                $('#name').val(data.name);
                $('#code').val(data.code);
                $('#type').val(data.type);
                $('#grid').val(data.grid);
                $('#product_id').val(data.product_id);
                $('#description').val(data.description);
            })
        });
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('admin.polymeric.store') }}",
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
                        $('#productForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                        Swal.fire({
                            title: 'موفق',
                            text: 'مشخصات مواد پلیمیری با موفقیت در سیستم ثبت شد',
                            icon: 'success',
                            confirmButtonText: 'تایید',
                        });
                        $('#product').val('');
                        $('#name').val('');
                        $('#code').val('');
                        $('#type').val('');
                        $('#grid').val('');
                        $('#product_id').val('');
                        $('#description').val('');
                    }
                }
            });
        });
        $('#product').val('');
        $('#name').val('');
        $('#code').val('');
        $('#type').val('');
        $('#grid').val('');
        $('#product_id').val('');
        $('#description').val('');
    });
    $('body').on('click', '.deleteProduct', function () {
        var id = $(this).data("id");
        Swal.fire({
            title: 'حذف مواد پلیمیری؟',
            text: "مشخصات حذف شده قابل بازیابی نیستند!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'حذف',
            cancelButtonText: 'انصراف',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'DELETE',
                    url: "{{route('admin.polymeric.delete')}}" + '/' + id,
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function (data) {
                        $('#data-table').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'موفق',
                            text: 'مشخصات مواد پلیمیری با موفقیت از سیستم حذف شد',
                            icon: 'success',
                            confirmButtonText: 'تایید'
                        })
                    }
                });
            }
        })
    });
    $('#foundation').addClass('active');
</script>
