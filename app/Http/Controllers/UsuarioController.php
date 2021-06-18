<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
	
	public function __construct() {
		$this->middleware("auth");
	}
	
    public function index()
    {
		$usuario = new User();
		$usuarios = User::All();
        return view("usuario.index", [
			"usuario" => $usuario,
			"usuarios" => $usuarios
		]);
    }

    public function store(Request $request)
    {
		$validado = $request->validate([
			"name" => "required",
			"email" => "required|email",
			"password" => "required"
		], [
			"required" => ":attribute é obrigatório",
			"email.email" => "O campo deve ser do tipo e-mail"
		]);
		
		if ($request->get("id") != "") {
			$usuario = User::Find($request->get("id"));
		} else {
			$usuario = new User();
		}
		
		$usuario->name = $request->get("name");
		$usuario->email = $request->get("email");
		$usuario->password = Hash::make($request->get("password"));
		
		$usuario->save();
		
		$request->Session()->flash("status", "sucesso");
		$request->Session()->flash("mensagem", "Usuário salvo com sucesso!");
		
		return redirect("/usuario");
    }
	
    public function edit($id)
    {
        $usuario = User::Find($id);
		$usuarios = User::All();
        return view("usuario.index", [
			"usuario" => $usuario,
			"usuarios" => $usuarios
		]);
    }

    public function destroy($id, Request $request)
    {
        User::Destroy($id);
		
		$request->Session()->flash("status", "sucesso");
		$request->Session()->flash("mensagem", "Usuário excluído com sucesso!");
		
		return redirect("/usuario");
    }
}
