<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function imageupload(Request $request)
    {
        // Criando a validacao
        $request->validate([
            'file' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        // Criando nome aleatorio para a imagem
        $imageName = time() . '.' . $request->file->extension();

        // Inserindo a imagem na pasta mencionada
        $request->file->move(public_path('media/images'), $imageName);

        return [
            'location' => asset('media/images/' . $imageName)
        ];
    }
}
