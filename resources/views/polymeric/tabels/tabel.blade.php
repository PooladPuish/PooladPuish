<?php $number = 1; ?>
@foreach($polymerics as $polymeric)
    <tr>
        <td>{{$number++}}</td>
        <td>{{$polymeric->code}}</td>
        <td>{{$polymeric->type}}</td>
        <td>{{$polymeric->grid}}</td>
        <td>{{$polymeric->name}}</td>
        <td>{{$polymeric->product_id}}</td>
        <td>
            <a data-toggle="modal" role="button" data-target="#modal-show-{{$polymeric->id}}">
                <img src="{{url('/public/icon/icons8-preview-pane-80.png')}}"
                     width="25" title="مشاهده"></a>
            <div class="modal fade" id="modal-show-{{$polymeric->id}}" tabIndex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="col-md-12 form-group">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>توضیحات</label>
                                        <textarea name="description" class="form-control" rows="4" cols="50"
                                                  placeholder="متن خود را وارد کنید">
                                                    {!! $polymeric->description !!}
                                                </textarea>

                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                        class="btn btn-danger pull-left"
                                        data-dismiss="modal">
                                    خروج
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td>
            @include('polymeric.actions.action')
        </td>
    </tr>
@endforeach
