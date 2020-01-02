@foreach($users as $user)
    <tr>
        @can('نام و نام خانوادگی')
            <td>{{$user->name}}</td>
        @endcan
        @can('نقش')
            <td>
                @foreach($user->roles as $role)
                    @if(!empty($role))
                        {{$role->name}}
                    @else
                        بدون دسترسی
                    @endif
                @endforeach
            </td>
        @endcan
        @can('نام کاربری')
            <td>{{$user->email}}</td>
        @endcan
        @can('شماره تماس')
            <td>{{$user->phone}}</td>
        @endcan
        @can('انلاین')
            <td>
                @if(Cache::has('active' . $user->id))
                    <img src="{{url('/public/icon/online.png')}}"
                         title="انلاین"
                         width="25">
                @else
                    <img src="{{url('/public/icon/offline.png')}}"
                         title="افلاین"
                         width="25">
                @endif
            </td>
        @endcan
        @can('وضعیت')
            <td>
                @if($user->status == null)
                    <img src="{{url('/public/icon/icons8-checked-user-male.png')}}"
                         width="25" title="فعال">
                @else
                    <img
                        src="{{url('/public/icon/icons8-checked-user-male-40.png')}}"
                        width="25"
                        title="غیر فعال">
                @endif
            </td>
        @endcan
        @if(Gate::check('ویرایش') || Gate::check('فعال و غیر فعال کردن'))
            <td>
               @include('users.actions.action')
            </td>
        @endif
    </tr>
@endforeach
