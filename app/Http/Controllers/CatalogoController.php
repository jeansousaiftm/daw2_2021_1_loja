<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class CatalogoController extends Controller
{
	public function catalogo(Request $request) 
	{
		$ordenacao = $request->get("ordenacao");
		if ($ordenacao == "") $ordenacao = "0";
		
		if ($ordenacao == "0") {
			$produtos = DB::table("produto")->simplePaginate(3);
		} else if ($ordenacao == "1") {
			$produtos = DB::table("produto")->orderBy("nome")->simplePaginate(3);
		} else if ($ordenacao == "2") {
			$produtos = DB::table("produto")->orderBy("valor")->simplePaginate(3);
		} else if ($ordenacao == "3") {
			$produtos = DB::table("produto")->orderByDesc("valor")->simplePaginate(3);
		} else {
			$produtos = DB::table("produto")->simplePaginate(3);
		}

        return view("catalogo.index", [
			"ordenacao" => $ordenacao,
			"produtos" => $produtos
		]);
	}
}
