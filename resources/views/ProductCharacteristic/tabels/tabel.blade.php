<?php $number = 1; ?>
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
        <td>{{$product->name}}</td>
        <td>
            @include('ProductCharacteristic.actions.action')
        </td>
    </tr>
@endforeach
