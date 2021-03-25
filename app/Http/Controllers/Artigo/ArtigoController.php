<?php

namespace App\Http\Controllers\Artigo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
	public function index(Request $request)
	{
		$objetos = \App\Models\Artigos::get(); //Pegar lista de artigos do banco

		$links = [
			[
				'href'=>  url('/')."/artigo/0",
				'method'=> "get",
				'rel'=> "visualizar_artigo"
			],
			[
				'href'=>  url('/')."/artigos",
				'method'=> "get",
				'rel'=> "listar_artigo"
			]
		]; //Links de possiveis utilizações da API


		return response()->json(['itens'=>$objetos,'_links'=>$links], 200);
	}

	public function artigo($id, Request $request)
	{
		$links = [
			[
				'href'=>  url('/')."/artigo/".$id,
				'method'=> "get",
				'rel'=> "visualizar_artigo"
			],
			[
				'href'=>  url('/')."/artigos",
				'method'=> "get",
				'rel'=> "listar_artigo"
			]
		]; //Links de possiveis utilizações da API

		$objeto = \App\Models\Artigos::find($id); //Procurar objeto no banco pelo ID

		if($objeto == null ) return response()->json(['err'=>'Objeto não encontrado','_links'=>$links], 404);
		$objeto->data = $objeto->created_at->format('M d, Y');
		return response()->json(['item'=> $objeto,'_links'=>$links], 200);

	}

	public function artigoView($id, Request $request)
	{
		
		return view('post',compact('id'));
	}

}
