<?php $number = 1; ?>
@foreach($models as $models)
    <tr>
        <td>{{$number++}}</td>
        <td>{{$models->code}}</td>
        <td>{{$models->name}}</td>
        <td>
            @include('models.actions.action')
        </td>
    </tr>
@endforeach
