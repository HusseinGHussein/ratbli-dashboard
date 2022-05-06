<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\LoggerHelper;

class ActivateUser extends Controller
{
    protected $loggerHelper;

    public function __construct(LoggerHelper $loggerHelper)
    {
        $this->loggerHelper = $loggerHelper;
    }

    /**
     * Toggle user status
     *
     * @param \App\Models\User $id
     * @return void
     */
    public function __invoke($id)
    {
        $user = User::findOrFail($id);

        $user->verified = ! (bool) $user->verified;
        $user->save();

        $msg = ($user->verified == 1) ? 'تفعيل' : 'تعطيل';

        $this->loggerHelper->store('user', $user->id, "تم {$msg} المستخدم {$user->user_name} رقم {$user->id}");

        flash("تم {$msg} العضو بنجاح!", 'success');

        return back();
    }
}
