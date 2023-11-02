<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Vacina;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    public function showVacinas($id){
        $vacinas = Lote::find($id)->vacinas;

        #Using JOIN to get the name of the vaccine
        $vacinas = Lote::join('vacinas', 'lotes.lote_id', '=', 'vacinas.lote_id')
        ->select('vacinas.*');

        return view('/', ['vacinas' => $vacinas]);
    }

    public function newVacina(Request $request){
        $vacinas = new Vacina();

        if ($request->nome_vacina === 'outra'){
            $vacinas->nome_vacina = $request->outra_vacina;
        } else {
            $vacinas->nome_vacina = $request->nome_vacina;
        }

        $existingVacina = Vacina::where('nome_vacina', $vacinas->nome_vacina)->first();

        if ($existingVacina){
            
            return redirect()->back()->with('error', 'Esta vacina já está cadastrada.');

        }

        $vacinas->data_aplicacao = $request->data_aplicacao;
        $vacinas->doses_vacina = $request->doses_vacina;
        $vacinas->lote_id = $request->lote_id;
        $vacinas->save();

        return redirect('/');
    }
}
