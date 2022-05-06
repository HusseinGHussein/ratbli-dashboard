@forelse ($logs as $log)
    <tr>
        <td>{{ $log->description }}</td>
        <td>
            @if($log->user_id == Auth::user()->id)
                أنت
            @else
                {{ $log->user->user_name }}
            @endif
        </td>
        <td>{{ $log->created_at }}</td>
    </tr>
@empty
    <tr>
        <td colspan="3">لم يتم تسجيل أي حركات</td>
    </tr>
@endforelse