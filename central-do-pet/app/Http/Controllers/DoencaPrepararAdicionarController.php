<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoencaPrepararAdicionarController extends Controller
{
    public function prepararAdicionar(Request $request){
        return view('Doenca/adicionarDoencas');
    }
}
