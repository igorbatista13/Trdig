<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Perfil;
use App\Models\User;
use Intervention\Image\ImageManager;

use Illuminate\Http\Request;

class PerfilController extends Controller
{

    public function index()
    {
        return view('profile.index');
    }



    public function update(Request $request, Perfil $perfil)
    {

      // Atualize o perfil do usuário autenticado
    $user = Auth::user();
    $perfil = $user->perfil;

    $perfil->Sobre_mim = $request->input('Sobre_mim');
    $perfil->Orgao = $request->input('Orgao');
    $perfil->Cargo = $request->input('Cargo');
    $perfil->Endereco = $request->input('Endereco');
    $perfil->Cidade = $request->input('Cidade');
    $perfil->Estado = $request->input('Estado');
    $perfil->CEP = $request->input('CEP');
    $perfil->Telefone = $request->input('Telefone');
    $perfil->Facebook = $request->input('Facebook');
    $perfil->Instagram = $request->input('Instagram');
    $perfil->Linkedin = $request->input('Linkedin');
    $perfil->Site = $request->input('Site');
    $perfil->Tipo = $request->input('Tipo');

    // Lide com o upload da imagem, se necessário
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $requestImage = $request->image;
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $imagePath = public_path('images/perfil') . '/' . $imageName;
        
        // Crie uma instância da classe Intervention ImageManager
        $imageManager = new ImageManager();
        
        // Abra a imagem usando o ImageManager
        $image = $imageManager->make($requestImage->path());
        
        // Redimensione a imagem para as dimensões desejadas
        $largura = 225;
        $altura = 225;
        $image->resize($largura, $altura, function ($constraint) {
            $constraint->aspectRatio(); // Mantém a proporção da imagem
            $constraint->upsize(); // Evita que a imagem seja dimensionada para cima
        });
        
        // Salve a imagem redimensionada
        $image->save($imagePath);
        
        $perfil->image = $imageName;
    }

    $perfil->save();

    // Redirecione de volta com uma mensagem de sucesso
    return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
}

public function changePassword(Request $request)
{
    // Validação dos campos
    $request->validate([
        'password' => 'required|string|min:8', // Senha atual
        'newpassword' => 'required|string|min:8|confirmed', // Nova senha
    ]);

    // Obtém o usuário logado
    $user = Auth::user();

    // Verifica se a senha atual fornecida está correta
    if (!Hash::check($request->password, $user->password)) {
        return redirect()->back()->with('error', 'Senha atual incorreta.');
    }

    // Atualiza a senha do usuário
    $user->password = Hash::make($request->newpassword);
    $user->save();

    //dd($user);

    return redirect()->back()->with('edit', 'Senha atualizada com sucesso.');
}


}
