<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jobs_posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Jobs_postsController extends Controller
{
    public function index()
    {
        $jobs = Jobs_posts::all();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('cadastroJob');
    }

    public function store(Request $request)
    {
        $vaidateAll = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'job_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

       Jobs_posts::create($vaidateAll);

        return redirect()->route('jobs')->with('success', 'Trabalho criado com sucesso!');
    }

    public function apply(Request $request, $job)
    {
        $jogObjeto = Jobs_posts::find($job);
        $jogObjeto->applications()->create([
            'user_id' => Auth::user()->id,
            'message' => $request->message,
        ]);

        return redirect()->route('jobs')->with('success', 'Você se candidatou a este trabalho com sucesso!');
    }
  
}
