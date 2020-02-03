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
            ajax: "{{ route('admin.invoice.index') }}",
            columns: [
                {data: 'invoiceNumber', name: 'invoiceNumber'},
                {data: 'created_at', name: 'created_at'},
                {data: 'user_id', name: 'user_id'},
                {data: 'customer_id', name: 'customer_id'},
                {data: 'number_sell', name: 'number_sell'},
                {data: 'sum_sell', name: 'sum_sell'},
                {data: 'paymentMethod', name: 'paymentMethod'},
                {data: 'invoiceType', name: 'invoiceType'},
                {data: 'price_sell', name: 'price_sell'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('body').on('click', '.SuccessCustomer', function () {
            var id = $(this).data('id');
            $.get("{{ route('admin.invoice.update.confirm') }}" + '/' + id, function (data) {
                $('#ajaxModel').modal('show');
                $('#name').val(data.name);
                $('#date').val(data.date);
                $('#HowConfirm').val(data.HowConfirm);
                $('#description').val(data.description);
                $('#invoice_id').val(data.invoice_id);
                $('#id_in').val(id);

            })
        });


    });
    $('body').on('click', '.deleteProduct', function () {
        var id = $(this).data("id");
        Swal.fire({
            title: 'حذف پیش فاکتور؟',
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
                    url: "{{route('admin.invoice.delete')}}" + '/' + id,
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function (data) {
                        $('#data-table').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'موفق',
                            text: 'مشخصات پیش فاکتور با موفقیت از سیستم حذف شد',
                            icon: 'success',
                            confirmButtonText: 'تایید'
                        })
                    }
                });
            }
        })
    });





    $('#saveConfirm').click(function (e) {
        e.preventDefault();
        var form = $('#CustomerConfirm')[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            data: data,
            url: "{{ route('admin.invoice.confirm.customer') }}",
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
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
                    $('#CustomerConfirm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    Swal.fire({
                        title: 'موفق',
                        text: 'تاییده مشتری برای این پیش فاکتور در سیستم ثبت شد',
                        icon: 'success',
                        confirmButtonText: 'تایید',
                    });
                }
            }
        });
    });

    $('#sell').addClass('active');
</script>
