<?php $number = 1 ?>
@foreach($products as $product)
    <tr>
        <td>{{$number++}}</td>
        <td>{{$product->code}}</td>
        <td>
            @foreach($commoditys as $commodity)
                @if($commodity->id == $product->commodity_id)
                    {{$commodity->name}}
                @endif
            @endforeach
        </td>
        <td>
            @foreach($ProductCharacteristics as $ProductCharacteristic)
                @if($ProductCharacteristic->id == $product->characteristics_id)
                    {{$ProductCharacteristic->name}}
                @endif
            @endforeach


        </td>

        <td>{{$product->name}}</td>
        <td>
            @include('product.actions.action')
        </td>
    </tr>
@endforeach
