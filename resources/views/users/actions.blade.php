<button type="button" class="btn btn-sm btn-clean showLogs" data-id="{{ $row->id }}" data-type="user" title="الحركات"><i class="flaticon-list"></i></button>
<form method="POST" action="{{ url('reset-password', ['id' => $row->id]) }}" style="display: inline-block">
    @csrf
    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="اعادة تعيين كلمة المرور"><i class="flaticon-lock"></i></button>
</form>
<form method="POST" action="{{ url('activate-user', ['id' => $row->id]) }}" style="display: inline-block">
    @csrf
    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{ ($row->verified == 1) ? 'تعطيل' : 'تفعيل' }}"><i class="flaticon2-reload"></i></button>
</form>
<a href="{{ route('users.edit', $row) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="تعديل">
    <i class="la la-edit"></i>
</a>
