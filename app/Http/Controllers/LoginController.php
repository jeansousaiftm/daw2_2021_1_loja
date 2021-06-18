<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
		
		$validado = $request->validate([
			"email" => "required|email",
			"password" => "required"
		], [
			"required" => ":attribute é obrigatório",
			"email.email" => "O campo deve ser do tipo e-mail"
		]);
		
		$credenciais = $request->only("email", "password");
		
		if (Auth::attempt($credenciais)) {
			$request->Session()->flash("status", "sucesso");
			$request->Session()->flash("mensagem", "Login realizado com sucesso!");
            return redirect("/");
        } else {
			$request->Session()->flash("status", "erro");
			$request->Session()->flash("mensagem", "Usuário ou senha incorretos!");
			return redirect("/");
		}		
		
	}
	
	public function logoff(Request $request) {
		Auth::logout();
		$request->Session()->flash("status", "sucesso");
		$request->Session()->flash("mensagem", "Logoff realizado com sucesso!");
		return redirect("/");
	}
	
}
