<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
	
	public function __construct() {
		$this->middleware("auth");
	}
	
    public function index()
    {
		$produto = new Produto();
		$produtos = Produto::All();
        return view("produto.index", [
			"produto" => $produto,
			"produtos" => $produtos
		]);
    }

    public function store(Request $request)
    {
		$validado = $request->validate([
			"nome" => "required",
			"valor" => "required",
			"foto" => "required|mimes:jpg,bmp,png,webp"
		], [
			"required" => ":attribute é obrigatório",
			"foto.mimes" => "É necessário importar um arquivo de imagem (jpg, bmp, png, webp)"
		]);
		
		if ($request->get("id") != "") {
			$produto = Produto::Find($request->get("id"));
		} else {
			$produto = new Produto();
		}
		
		$produto->nome = $request->get("nome");
		
		$valor = $request->get("valor");
		$valor = str_replace(".", "", $valor);
		$valor = str_replace(",", ".", $valor);
		$produto->valor = $valor;
		
		$produto->foto = $request->file("foto")->store("produtos");
		
		$produto->save();
		
		$request->Session()->flash("status", "sucesso");
		$request->Session()->flash("mensagem", "Produto salvo com sucesso!");
		
		return redirect("/produto");
    }
	
    public function edit($id)
    {
        $produto = Produto::Find($id);
		$produtos = Produto::All();
        return view("produto.index", [
			"produto" => $produto,
			"produtos" => $produtos
		]);
    }

    public function destroy($id, Request $request)
    {
        $produto = Produto::Find($id);
		\Storage::delete($produto->foto);
		$produto->delete();
		
		$request->Session()->flash("status", "sucesso");
		$request->Session()->flash("mensagem", "Produto excluído com sucesso!");
		
		return redirect("/produto");
    }
	
}
