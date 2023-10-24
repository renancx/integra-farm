<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    public function updateLote(Request $request, $id){
        $lote = Lote::find($id);
        $lote->tamanho_lote = $request->tamanho_lote;
        $lote->chegada_lote = $request->chegada_lote;
        $lote->saida_lote = $request->saida_lote;
        $lote->observacao_lote = strip_tags($request->observacao_lote);
        $lote->user_id = auth()->user()->id;
        $lote->save();

        return redirect('/');
    }

    public function editLote(Request $request, $id){
        $lote = Lote::find($id);
        $lote->tamanho_lote = $request->tamanho_lote;
        $lote->chegada_lote = $request->chegada_lote;
        $lote->saida_lote = $request->saida_lote;
        $lote->observacao_lote = strip_tags($request->observacao_lote);
        $lote->user_id = auth()->user()->id;
        $lote->save();

        return redirect('/');
    }

    public function newLote(Request $request){
        $lote = new Lote();
        $lote->tamanho_lote = $request->tamanho_lote;
        $lote->chegada_lote = $request->chegada_lote;
        $lote->saida_lote = $request->saida_lote;
        $lote->observacao_lote = strip_tags($request->observacao_lote);
        $lote->user_id = auth()->user()->id;
        $lote->save();

        return redirect('/');
    }
}
