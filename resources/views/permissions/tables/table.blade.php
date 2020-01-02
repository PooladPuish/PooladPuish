@foreach($permissions as $permission)
    <tr>
        <td>
            @if(strpos($permission->label,"/"))
                --{{$permission->name}}
            @else
                {{$permission->name}}
            @endif
        </td>
        <td>{{$permission->label}}</td>
        <td>
            @include('permissions.actions.action')
        </td>


    </tr>
@endforeach
