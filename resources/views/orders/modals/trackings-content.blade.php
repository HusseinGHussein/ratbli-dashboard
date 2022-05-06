@forelse ($trackings as $tracking)
    <tr>
        <td>
            <span class="label label-lg font-weight-bold  label-light-{{ $tracking->orderStatus->class }} label-inline">{{ $tracking->orderStatus->name }}</span>
        </td>
        <td>
            @if($tracking->user_id == Auth::user()->id)
                أنت
            @else
                {{ $tracking->user->user_name }}
            @endif
        </td>
        <td>{{ $tracking->created_at }}</td>
    </tr>
@empty
    <tr>
        <td colspan="3">لم يتم تسجيل أي تحركات</td>
    </tr>
@endforelse