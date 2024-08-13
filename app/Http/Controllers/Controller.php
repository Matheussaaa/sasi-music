<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Jobs_posts;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

 class Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('home', compact('posts'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function login()
    {
        return view('login');
    }
    public function logando(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            return redirect()->route('user.profile', ['user_id' => $user->id]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    
    public function jobs(){
        $jobs = Jobs_posts::all();
        return view('jobs', compact('jobs'));
    }
    public function showApplications()
    {
        $user = Auth::user();
        $applications = $user->jobApplications;
    
        return view('jobsApply', compact('applications'));
    }
    
    public function showProfile($user_id)
    { 
        $user = User::find($user_id);
        return view('user', compact('user'));
    }
    public function showNotification(){
        return view('notification');
    }
    
}
