<?php

namespace App\Http\Controllers;

use App\Models\Lote;
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
}
