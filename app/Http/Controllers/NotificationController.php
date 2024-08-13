<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function notific(Request $request)
    {
        $notifications = $request->user()->notifications;
        return view('notifications.index', compact('notifications'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'job_id' => 'required|exists:jobs_posts,id',
            'message' => 'required|string|max:255',
        ]);

        Notification::create([
            'user_id' => $request->user_id,
            'sender_id' => Auth::id(),
            'job_id' => $request->job_id,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Notificação enviada com sucesso!');
    }
}
