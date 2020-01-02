<?php $number = 1; ?>
@foreach($formats as $format)
    <tr>
        <td>{{$number++}}</td>
        <td>{{$format->code}}</td>
        <td>
            @foreach($models as $model)
                @if($model->id == $format->model_id)
                    {{$model->name}}
                @endif
            @endforeach
        </td>
        <td>
            @foreach($commoditys as $commodity)
                @if($commodity->id == $format->commodity_id)
                    {{$commodity->name}}
                @endif
            @endforeach
        </td>
        <td>
            @foreach($characteristics as $characteristic)
                @if($characteristic->id == $format->characteristics_id)
                    {{$characteristic->name}}
                @endif
            @endforeach
        </td>
        <td>
            @foreach($products as $product)
                @if($product->id == $format->product_id)
                    {{$product->name}}
                @endif
            @endforeach

        </td>
        <td>{{$format->size}}</td>
        <td>{{$format->quetta}}</td>
        <td>
            @include('formats.actions.action')
        </td>
    </tr>
@endforeach
