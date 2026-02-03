<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8',
            'confirmNewPassword' => 'required|same:newPassword',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Recheck Inputs'], 400);
        }

        $user = Auth::user();

        if (!Hash::check($request->currentPassword, $user->password)) {
            return response()->json(['error' => 'Old password is incorrect'], 400);
        }

        $user->password = Hash::make($request->newPassword);
        $user->save();

        $maildata = [
            'name' => $user->name,
        ];

        Mail::send('mails.reset_password', $maildata, function ($message) use ($user) {
            $message->from(config('mail.from.address'));
            $message->to($user->email);
            $message->subject('Password Reset');
        });

        return response()->json(['success' => 'Password updated successfully'], 200);
    }
}
