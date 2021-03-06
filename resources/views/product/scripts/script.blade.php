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
            ajax: "{{ route('admin.product.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'code', name: 'code'},
                {data: 'commodity_id', name: 'commodity_id'},
                {data: 'characteristics_id', name: 'characteristics_id'},
                {data: 'name', name: 'name'},
                {data: 'label', name: 'label'},
                {data: 'price', name: 'price'},
                {data: 'manufacturing', name: 'manufacturing'},
                {data: 'minimum', name: 'minimum'},
                {data: 'maximum', name: 'maximum'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('#createNewProduct').click(function () {
            $('#productForm').trigger("reset");
            $('#ajaxModel').modal('show');
            $('#caption').text('افزودن محصول');
            $('#name').val('');
            $('#code').val('');
            $('#product_id').val('');
        });
        $('body').on('click', '.editProduct', function () {
            var product_id = $(this).data('id');
            $.get("{{ route('admin.product.update') }}" + '/' + product_id, function (data) {
                $('#ajaxModel').modal('show');
                $('#caption').text('ویرایش محصول');
                $('#product_id').val(data.id);
                $('#characteristic').val(data.characteristics_id);
                $('#commodity').val(data.commodity_id);
                $('#name').val(data.name);
                $('#code').val(data.code);
                $('#manufacturing').val(data.manufacturing);
                $('#price').val(data.price);
                $('#minimum').val(data.minimum);
                $('#maximum').val(data.maximum);
            });
        });
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $('#saveBtn').text('در حال ثبت اطلاعات...');
            $('#saveBtn').prop( "disabled", true );
            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('admin.Product.store') }}",
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
                        $('#saveBtn').text('ثبت');
                        $('#saveBtn').prop( "disabled", false );
                    }
                    if (data.success) {
                        $('#productForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                        Swal.fire({
                            title: 'موفق',
                            text: 'مشخصات محصول با موفقیت در سیستم ثبت شد',
                            icon: 'success',
                            confirmButtonText: 'تایید',
                        });
                        $('#saveBtn').text('ثبت');
                        $('#saveBtn').prop( "disabled", false );
                    }
                }
            });
        });
        $('#name').val('');
        $('#code').val('');
        $('#price').val('');
        $('#characteristics_id').val('');
        $('#commodity_id').val('');
        $('#manufacturing').val('');
        $('#product_id').val('');
        $('#minimum').val('');
        $('#maximum').val('');
    });
    $('#commodity').change(function () {
        var commodityID = $(this).val();
        if (commodityID) {
            $.ajax({
                type: "GET",
                url: "{{route('admin.list.product')}}?commodity_id=" + commodityID,
                success: function (res) {
                    if (res) {
                        $("#characteristic").empty();
                        $("#characteristic").append('<option>مشخصه محصول را انتخاب کنید</option>');
                        $.each(res, function (key, value) {
                            $("#characteristic").append('<option value="' + key + '">' + value + '</option>');
                        });
                        $("#characteristic").append('<option value="">بدون مشخصه</option>');


                    } else {
                        $("#characteristic").empty();
                    }
                }
            });
        } else {
            $("#characteristic").empty();
        }
    });


    $('body').on('click', '.deleteProduct', function () {
        var id = $(this).data("id");
        Swal.fire({
            title: 'حذف محصول؟',
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
                    url: "{{route('admin.Product.delete')}}" + '/' + id,
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function (data) {
                        $('#data-table').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'موفق',
                            text: 'مشخصات محصول با موفقیت از سیستم حذف شد',
                            icon: 'success',
                            confirmButtonText: 'تایید'
                        })
                    }
                });
            }
        })
    });
    $('#foundation').addClass('active');
    $('#foundation_a').addClass('active');
</script>
