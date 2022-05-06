<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\LoggerHelper;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Controller
{
    protected $loggerHelper;

    public function __construct(LoggerHelper $loggerHelper)
    {
        $this->loggerHelper = $loggerHelper;
    }

    /**
     * Reset user password
     *
     * @param \App\Models\User $id
     * @return void
     */
    public function __invoke($id)
    {
        $user = User::findOrFail($id);

        $user->password = Hash::make('12345678');
        $user->save();

        $this->loggerHelper->store('user', $user->id, "تم إعادة تعيين كلمة المرور للمستخدم {$user->user_name} رقم {$user->id}");

        flash('تم اعادة تعيين كلمة المرور بنجاح!', 'success');

        return back();
    }
}
