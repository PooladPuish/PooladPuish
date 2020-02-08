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
                {data: 'status', name: 'status'},
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

        $('body').on('click', '.deleteProduct', function () {
            $('#id_delete').val('');
            $('#description_c').val('');
            var id = $(this).data("id");
            $('#id_delete').val(id);
            $('#ajaxModelDelete').modal('show');

            $('#saveCancel').click(function (e) {
                e.preventDefault();
                var form = $('#CustomerCanceled')[0];
                var data = new FormData(form);

                $('#ajaxModelDelete').modal('hide');
                Swal.fire({
                    title: 'لغو پیش فاکتور؟',
                    text: "مشخصات پیش فاکتور لغو شده فقط توسط مدیریت قابل بازیابی میباشد!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'حذف',
                    cancelButtonText: 'انصراف',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "POST",
                            enctype: 'multipart/form-data',
                            data: data,
                            url: "{{ route('admin.invoice.delete') }}",
                            cache: false,
                            contentType: false,
                            processData: false,
                            method: 'POST',
                            type: 'POST',
                            success: function (data) {
                                $('#data-table').DataTable().ajax.reload();
                                Swal.fire({
                                    title: 'موفق',
                                    text: 'مشخصات پیش فاکتور با موفقیت از لیست شما حذف شد',
                                    icon: 'success',
                                    confirmButtonText: 'تایید'
                                })
                            }
                        });
                        $('#id_delete').val('');
                        $('#description').val('');
                    }

                });


            });

        });


        $('body').on('click', '.validate', function () {
            var id = $(this).data("id");
            $.get("{{ route('admin.invoice.customers.validate') }}" + '/' + id, function (data) {
                $('#ajaxModelCustomer').modal('show');
                $('#Creditceiling').val(data.Creditceiling);
                $('#Openceiling').val(data.Openceiling);
                $('#Yearcount').val(data.Yearcount);
                $('#yearAgoCount').val(data.yearAgoCount);
                $('#Yearturnover').val(data.Yearturnover);
                $('#lastYearturnover').val(data.lastYearturnover);
                $('#description_m').val(data.description);
                $('#Checkback').val(data.Checkback);
                $('#Checkbackintheflow').val(data.Checkbackintheflow);
                $('#accountbalance').val(data.accountbalance);
                $('#Averagetimedelay').val(data.Averagetimedelay);
                $('#Futurefactors').val(data.Futurefactors);
                $('#Receiveddocuments').val(data.Receiveddocuments);
                $('#Openaccountbalance').val(data.Openaccountbalance);
                $('#paymentmethod').val(data.paymentmethod);
                $('#customer_id').val(id);


            })

        });


        $('body').on('click', '.many', function () {
            var id = $(this).data("id");
            $.get("{{ route('admin.invoice.customers.many') }}" + '/' + id, function (data) {
                $('#ajaxModelCustomerMany').modal('show');
                $('#description_m').val(data.description);
                $('#Checkback').val(data.Checkback);
                $('#Checkbackintheflow').val(data.Checkbackintheflow);
                $('#accountbalance').val(data.accountbalance);
                $('#Averagetimedelay').val(data.Averagetimedelay);
                $('#Futurefactors').val(data.Futurefactors);
                $('#Receiveddocuments').val(data.Receiveddocuments);
                $('#Openaccountbalance').val(data.Openaccountbalance);
                $('#paymentmethod').val(data.paymentmethod);

                $('#many_id').val(id);


            })

        });


        $('body').on('click', '.Print', function () {
            var id = $(this).data('id');
            $.get("{{ route('admin.invoice.check.print') }}" + '/' + id, function (data) {
                $('#ajaxModelPrint').modal('show');
                $('#user_idddd').val(data.user_id);
                $('#selectstoressss').val(data.selectstores_id);
                $('#name_bankkk').val(data.bank_id);
                $('#dateeee').val(data.date);
                $('#descriptionnn').val(data.description);
            });
            $('#PrintSell').click(function (e) {
                var user = $('#CustomerPrint').serialize();
                $.ajax({
                    type: "GET",
                    url: "{{route('admin.invoice.print')}}?id=" + id,
                    data: user,
                    dataType: 'html',
                    success: function (res) {
                        if (res) {
                            w = window.open(window.location.href, "_blank");
                            w.document.open();
                            w.document.write(res);
                            w.document.close();
                            w.location.reload();
                            $('#CustomerPrint').trigger("reset");
                            id = null;
                        } else {
                            id = null;
                        }
                    }
                });


            });
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
                        table.draw();
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


        $('#name_bank').change(function () {
            var name_bank = $(this).val();
            $('#name_bank').val(name_bank);

        });


        $('#saveCustomerValidate').click(function (e) {
            e.preventDefault();
            var form = $('#CustomersValidate')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                data: data,
                url: "{{ route('admin.invoice.customer.validate.store') }}",
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function (data) {
                    if (data.errors) {
                        $('#ajaxModelCustomer').modal('hide');
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
                        $('#CustomersValidate').trigger("reset");
                        $('#ajaxModelCustomer').modal('hide');
                        table.draw();
                        Swal.fire({
                            title: 'موفق',
                            text: 'اعتبار سنجی مشتری با موفقیت در سیستم ثبت شد',
                            icon: 'success',
                            confirmButtonText: 'تایید',
                        });
                    }
                }
            });
        });


        $('#saveCustomerMany').click(function (e) {
            e.preventDefault();
            var form = $('#CustomersMany')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                data: data,
                url: "{{ route('admin.invoice.customer.many.store') }}",
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function (data) {
                    if (data.errors) {
                        $('#ajaxModelCustomerMany').modal('hide');
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
                        $('#CustomersMany').trigger("reset");
                        $('#ajaxModelCustomerMany').modal('hide');
                        table.draw();
                        Swal.fire({
                            title: 'موفق',
                            text: 'سابقه پرداخت مشتری با موفقیت در سیستم ثبت شد',
                            icon: 'success',
                            confirmButtonText: 'تایید',
                        });
                    }
                }
            });
        });


    });


    $('#sell').addClass('active');


</script>
