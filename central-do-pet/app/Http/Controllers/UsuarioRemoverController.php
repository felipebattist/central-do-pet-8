<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioRemoverController extends Controller
{
    public function remover(Request $request){
        $usuario = \app\Models\usuario::find($request->id);
        $usuario->delete();
        return redirect('Usuario/listar/categorias');
    }
}
