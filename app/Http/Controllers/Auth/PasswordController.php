<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $customMessages = [
            'current_password.current_password' => 'A senha atual está incorreta.',
            'password.required' => 'O campo de nova senha é obrigatório.',
            'password.min' => 'A nova senha deve ter pelo menos :min caracteres.',
            'password.confirmed' => 'A confirmação da nova senha não corresponde.',
        ];
        
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ], $customMessages);

        

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);


        return back()->with('update', 'Senha alterada com sucesso!');
    }
}
