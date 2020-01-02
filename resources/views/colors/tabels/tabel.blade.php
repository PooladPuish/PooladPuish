<?php $number = 1; ?>
@foreach($colors as $color)
    <tr>
        <td>{{$number++}}</td>
        <td>{{$color->code}}</td>
        <td>{{$color->name}}</td>
        <td>{{$color->manufacturer}}</td>
        <td>{{$color->combination}}</td>
        <td>{{$color->masterbatch}}</td>
        <td>
            @include('colors.actions.action')
        </td>
    </tr>
@endforeach
