<script src="{{asset('/public/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            language: {
                paginate: {
                    next: 'بعدی',
                    previous: 'قبلی'
                },
                processing: 'در حال بارگزاری اطلاعات',
                search: 'جستجو:',
                sZeroRecords: 'موردی با این مشخصات یافت نشد!',
                lengthMenu: 'نمایش_MENU_مورد',
                info: 'نمایش مورد _PAGES_ از _PAGE_',
            },
            ajax: "{{ route('admin.user.show') }}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'role', name: 'role'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'personnel_id', name: 'personnel_id'},
                {data: 'created_at', name: 'created_at'},
                {data: 'status', name: 'status'},
                    @if(Gate::check('ویرایش کاربران') || Gate::check('فعال و غیر فعال کردن کاربران'))
                {
                    data: 'action', name: 'action'
                },
                @endif
            ]
        });
    });
</script>
