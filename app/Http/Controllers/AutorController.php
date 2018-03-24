<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;
use App\Livro;

class AutorController extends Controller
{
    private $livro_controller;

    public function __construct(LivroController $livro_controller)
    {
        $this->livro_controller = $livro_controller;
    }

    public function index()
    {
        $list_autores = Autor::all();
        return view( 'autores.index', ['autores' => $list_autores] );
    }

    public function cadastroView()
    {
        return view( 'autores.create');
    }

    public function armazena(Request $request)
    {
        $autor = Autor::create($request->all());
        
        if($request->titulo && $request->data_publicacao) {
            $livro = new Livro();
            $livro->titulo = $request->titulo;
            $livro->data_publicacao = $request->data_publicacao;
            $livro->id_autor = $autor->id;

            $this->livro_controller->armazena($livro); 
        }
        return redirect("/autores/cadastro")->with('message', 'autor cadastrado');
    }
}