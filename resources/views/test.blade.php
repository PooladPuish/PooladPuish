@extends('layouts.master')
<script src="{{asset('/public/assets/sort1.js')}}"></script>
<script src="{{asset('/public/assets/sort2.js')}}"></script>
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        لیست تست
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody id="tablecontents">
                        @foreach($tests as $test)
                            <tr class="row1" data-id="{{ $test->id }}">
                                <td>
                                    <img src="{{url('/public/icon/icons8-move-grabber-50.png')}}" width="25"
                                    title="اولویت بندی">
                                </td>
                                <td>{{ $test->name }}</td>
                                <td>{{ ($test->label == 1)? "Completed" : "Not Completed" }}</td>
                                <td>{{ date('d-m-Y h:m:s',strtotime($test->created_at)) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $("#table").DataTable();

            $( "#tablecontents" ).sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {

                var order = [];
                $('tr.row1').each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index+1
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('demos/sortabledatatable') }}",
                    data: {
                        order:order,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });

            }
        });

    </script>
@endsection
