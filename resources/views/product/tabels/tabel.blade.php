@foreach($products as $product)
    <tr>
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
        <td>{{\Morilog\Jalali\Jalalian::forge($product->created_at)->format('Y/m/d')}}</td>
        <td>
            @include('product.actions.action')
        </td>
    </tr>
@endforeach
