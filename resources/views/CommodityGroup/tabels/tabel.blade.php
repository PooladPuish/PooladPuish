<?php $number = 1; ?>
@foreach($commoditys as $commodity)
    <tr>
        <td>{{$number++}}</td>
        <td>{{$commodity->code}}</td>
        <td>{{$commodity->name}}</td>
        <td>
            @include('CommodityGroup.actions.action')
        </td>
    </tr>
@endforeach
