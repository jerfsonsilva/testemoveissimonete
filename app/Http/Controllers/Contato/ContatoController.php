<?php

namespace App\Http\Controllers\Contato;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
	public function index(Request $request)
	{
		$objetos = \App\Models\Contato::get(); //Pegar lista de contatos do banco

		$links = [
			[
				'href'=>  url('/')."/contatos",
				'method'=> "get",
				'rel'=> "listar_contatos"
			],
			[
				'href'=>  url('/')."/contatos/add",
				'method'=> "POST",
				'rel'=> "criar_contato"
			]
		]; //Links de possiveis utilizações da API


		return response()->json(['itens'=>$objetos,'_links'=>$links], 200);
	}
	public function add(Request $request)
	{
		$links = [
			[
				'href'=>  url('/')."/contatos",
				'method'=> "get",
				'rel'=> "listar_contatos"
			],
			[
				'href'=>  url('/')."/contatos/add",
				'method'=> "POST",
				'rel'=> "criar_contato"
			]
		];

		$validacao = $this->validacao($request,[
			'nome' => 'required|max:255',
			'email' => 'required',
			'telefone' => 'required|max:14',
			'conteudo' => 'required'
		]);

		if ($validacao['resultado']) {//Caso a validação tenha falhado
			return response()->json(['err'=>$validacao['msg'],'_links'=>$links],412); //Pre-condição falhou
			exit;
		}

		$objeto = new \App\Models\Contato; //Cadastrar novo contato

		$objeto['nome'] = $request['nome'];
		$objeto['email'] = $request['email'];
		$objeto['telefone'] = $request['telefone'];
		$objeto['conteudo'] = $request['conteudo'];

		if(!$objeto->save()) return response()->json(['err'=>'Erro ao salvar conteudo','_links'=>$links], 500); //Erro interno do servidor

		return response()->json(['resultado'=>true, '_links'=>$links], 200);
	}

	public function validacao($request,$campos)
	{
		$validator = \Validator::make($request->all(), $campos); //Pegar campos de erro 
		$resul = $validator->fails();
		$msg =  $resul ? $this->validatorString($validator):'';
		return [
			'resultado' => $resul, 
			'validator' => $validator ,
			'msg'=>  $msg
		];

	}
	public static function validatorString($validator)
	{
		$arraysimples = [];
		foreach ($validator->errors()->messages() as $key => $campo ) {
			foreach ($campo as $key => $value) {
				$arraysimples[] = $value;
			}
		}
		return implode(", ", $arraysimples);
	}

}
