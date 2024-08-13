<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        return view('cadastroUser');
    }
    public function store(Request $request)
{
    // Validar os dados recebidos do formulário
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'bio' => 'nullable|string',
        'password' => 'required',
        'number' => 'required',
        'profile_picture' => 'nullable|string',
    ]);

    // Criptografar a senha usando bcrypt
    $validatedData['password'] = Hash::make($validatedData['password']);

    // Criar o usuário com os dados validados e senha criptografada
    $user = User::create($validatedData);

    // Redirecionar para o perfil do usuário recém-criado
    return redirect()->route('user.profile', ['user_id' => $user->id]);
}
    
    public function follow(Request $request)
    {
        $user = User::find($request->followed_id);
        if ($user) {
            $request->user()->following()->attach($user->id);
            return redirect()->back()->with('success', 'Você agora está seguindo ' . $user->name);
        }
        return redirect()->back()->with('error', 'Usuário não encontrado');
    }

    public function unfollow(Request $request)
    {
        $user = User::find($request->followed_id);
        if ($user) {
            $request->user()->following()->detach($user->id);
            return redirect()->back()->with('success', 'Você deixou de seguir ' . $user->name);
        }
        return redirect()->back()->with('error', 'Usuário não encontrado');
    }  
}
