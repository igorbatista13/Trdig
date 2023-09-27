<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Roles;
use App\Models\Perfil;

use Spatie\Permission\Models\Role;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }
    public function registrartipo()
    {
        return view('auth.registrartipo');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $basicRole = Role::where('name', 'Proponente')->first(); // Substitua 'basic' pelo nome do papel básico real
        if ($basicRole) {
            $user->assignRole($basicRole);
        }

        // Criar um perfil associado a esse usuário com campos vazios
        $perfil = new Perfil();
        $perfil->user_id = $user->id; // Associe o perfil ao usuário recém-criado
        $perfil->Sobre_mim = '';
        $perfil->Orgao = '';
        $perfil->Cargo = '';
        $perfil->Endereco = '';
        $perfil->Cidade = '';
        $perfil->Estado = '';
        $perfil->CEP = '';
        $perfil->Telefone = '';
        $perfil->Facebook = '';
        $perfil->Instagram = '';
        $perfil->Linkedin = '';
        $perfil->Site = '';
        $perfil->image = ''; // Ou defina como null, dependendo do tipo de campo
        $perfil->Tipo = $request->Tipo;

        // Salvar o perfil associado ao usuário
        $user->perfil()->save($perfil);


        //  event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
