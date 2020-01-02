<?php $number = 1; ?>
@foreach($sellers as $seller)
    <tr>
        <td>{{$number++}}</td>
        <td>{{$seller->code}}</td>
        <td>{{$seller->code}}</td>
        <td>{{$seller->code}}</td>
        <td>{{$seller->code}}</td>
        <td>{{$seller->code}}</td>
        <td>{{$seller->code}}</td>
        <td>{{$seller->code}}</td>
        <td>{{$seller->code}}</td>
        <td>
            @include('seller.actions.action')
        </td>
    </tr>
@endforeach
