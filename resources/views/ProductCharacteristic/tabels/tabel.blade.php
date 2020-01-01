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
        <td>{{$product->name}}</td>
        <td>{{\Morilog\Jalali\Jalalian::forge($product->created_at)->format('Y/m/d')}}</td>
        <td>
            @include('ProductCharacteristic.actions.action')
        </td>
    </tr>
@endforeach
