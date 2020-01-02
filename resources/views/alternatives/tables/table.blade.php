<?php $number = 1; ?>
@foreach($alternatives as $alternative)
    <tr>
        <td>{{$number++}}</td>
        <td>
            @foreach($users as $user)
                @if($user->id == $alternative->user_id)
                    {{$user->name}}
                @endif
            @endforeach
        </td>
        <td>
            @foreach($users as $user)
                @if($user->id == $alternative->alternate_id)
                    {{$user->name}}
                @endif
            @endforeach
        </td>
        <td>{{$alternative->from}}</td>
        <td>{{$alternative->ToDate}}</td>
        <td>
            @include('alternatives.actions.action')
        </td>
    </tr>
@endforeach
