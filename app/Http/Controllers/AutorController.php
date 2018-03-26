<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;
use App\Livro;

class AutorController extends Controller
{
    private $livro_controller;
    private $autor;

    public function __construct(LivroController $livro_controller)
    {
        $this->livro_controller = $livro_controller;
        $this->autor = new Autor();
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

    public function edita($id)
    {
        return view('autores.edit', [
            'autor' => getAutor($id)
        ]);
    }

    private function getAutor($id)
    {
        return $this->autor->find($id);
    }

    public function atualiza()
    {
        return view("working");
    }
}