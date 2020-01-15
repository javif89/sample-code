<?php

namespace App\Http\Controllers;

use App\AdminInvitation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminInvitationController extends Controller
{
    public function create(Request $request)
    {
        // Check if a user with that email already exists
        $user = User::whereEmail($request->input('email'))->first();
        if(!empty($user)) {
            session()->flash('error', 'A user with that email already exists');
            return back();
        }

        $invite = AdminInvitation::create([
            'for_email' => $request->input('email'),
            'code' => Str::uuid()
        ]);

        // Send email
        Mail::to($invite->for_email)->send(new \App\Mail\AdminInvitation($invite));

        session()->flash('success', "Invite created");

        return back();
    }

    public function delete(AdminInvitation $invite)
    {
        $invite->delete();

        session()->flash('success', "Invite deleted");

        return back();
    }

    public function showRegisterPage($inviteCode)
    {
        $invite = AdminInvitation::whereCode($inviteCode)->first();

        if(empty($invite) || $invite->used) {
            return abort(404);
        }

        return view('auth.register')->with(compact('invite'));
    }

    public function resendInviteEmail(AdminInvitation $invite)
    {
        Mail::to($invite->for_email)->send(new \App\Mail\AdminInvitation($invite));

        session()->flash('success', "Invite email sent");

        return back();
    }
}
