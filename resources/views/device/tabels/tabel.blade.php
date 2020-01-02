<?php $number = 1; ?>
@foreach($devices as $device)
    <tr>
        <td>{{$number++}}</td>
        <td>{{$device->code}}</td>
        <td>{{$device->name}}</td>
        <td>{{$device->model}}</td>
        <td>
            @include('device.actions.action')
        </td>
    </tr>
@endforeach
