@foreach($commoditys as $commodity)
    <tr>
        <td>{{$commodity->code}}</td>
        <td>{{$commodity->name}}</td>
        <td>{{\Morilog\Jalali\Jalalian::forge($commodity->created_at)->format('Y/m/d')}}</td>
        <td>
            @include('CommodityGroup.actions.action')
        </td>
    </tr>
@endforeach
