<?php

namespace App\Http\Controllers;

use App\Models\pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PetAdicionarController extends Controller
{
    public static function gerarPetRga(){
        $comRgaRange = 1000;
        $fimRgaRange = 9999;
        $pets = (new \App\Models\pet)->getSortedArrayPets();
        $rga = random_int($comRgaRange,$fimRgaRange);
        while($pets->contains($rga))
            $rga = random_int($comRgaRange,$fimRgaRange);
        return $rga;
    }

    public function adicionar(Request $request){
        try {
            \App\Validator\petValidator::validate(array_merge($request->all(), ['rga' => $this->gerarPetRga()]));
            $rga = $this->gerarPetRga();
            pet::create([
                'nome' => $request->nome,
                'sexo' => $request->sexo,
                'castrado' => $request->castrado,
                'necessidades_especiais' => $request->necessidades_especiais,
                'data_de_nascimento' => $request->data_de_nascimento,
                'dono_id' => $request->dono_id,
                'rga' => $rga,
                'registro'=> $request->registro,
            ]);
             return redirect('listar/pets');
        } catch (\App\Validator\ValidationException $exception){
            return redirect('adicionar/pet')
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
