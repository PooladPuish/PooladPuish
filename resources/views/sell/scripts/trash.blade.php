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
            ajax: "{{ route('admin.invoice.trash') }}",
            columns: [
                {data: 'invoiceNumber', name: 'invoiceNumber'},
                {data: 'created_at', name: 'created_at'},
                {data: 'user_id', name: 'user_id'},
                {data: 'customer_id', name: 'customer_id'},
                {data: 'number_sell', name: 'number_sell'},
                {data: 'sum_sell', name: 'sum_sell'},
                {data: 'paymentMethod', name: 'paymentMethod'},
                {data: 'invoiceType', name: 'invoiceType'},
                {data: 'status', name: 'status'},
                {data: 'price_sell', name: 'price_sell'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('body').on('click', '.question', function () {
            var id = $(this).data('id');
            $.get("{{ route('admin.invoice.update.trash') }}" + '/' + id, function (data) {
                $('#ajaxModelQuestion').modal('show');
                $('#description_c').val(data.description);
                $('#id_trash').val(id);
                $('#cancellation').val(data.cancellation);

            });
            $('#saveRestore').click(function (e) {
                e.preventDefault();
                var form = $('#CustomerCanceled')[0];
                var data = new FormData(form);

                $('#ajaxModelDelete').modal('hide');
                Swal.fire({
                    title: 'بازگشت پیش فاکتور به لیست؟',
                    text: "آیا از بازگشت پیش فاکتور به لیست اطمینان دارید!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بازگردانی',
                    cancelButtonText: 'انصراف',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "GET",
                            url: "{{route('admin.invoice.RestoreDelete')}}" + '/' + id,
                            success: function (data) {
                                $('#data-table').DataTable().ajax.reload();
                                Swal.fire({
                                    title: 'موفق',
                                    text: 'مشخصات پیش فاکتور با موفقیت به لیست پیش فاکتورها برگشت',
                                    icon: 'success',
                                    confirmButtonText: 'تایید'
                                })
                            }
                        });
                        $('#id_delete').val('');
                        $('#cancellation').val('');
                        $('#description').val('');
                    }

                });


            });

            $('#saveDelete').click(function (e) {
                e.preventDefault();
                var form = $('#CustomerCanceled')[0];
                var data = new FormData(form);

                $('#ajaxModelDelete').modal('hide');
                Swal.fire({
                    title: 'حذف پیش فاکتور؟',
                    text: "مشخصات پیش فاکتور حذف شده قابل بازیابی نخواهد بود!",
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
                            url: "{{route('admin.invoice.AdminDelete')}}" + '/' + id,
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
                        $('#id_delete').val('');
                        $('#cancellation').val('');
                        $('#description').val('');
                    }

                });


            });


        });


    });


    $('#sell').addClass('active');
</script>
