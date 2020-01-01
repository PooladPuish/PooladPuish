@foreach($models as $models)
    <tr>
        <td>{{$models->code}}</td>
        <td>{{$models->name}}</td>
        <td>{{\Morilog\Jalali\Jalalian::forge($models->created_at)->format('Y/m/d')}}</td>
        <td>
            @include('models.actions.action')
        </td>
    </tr>
@endforeach
