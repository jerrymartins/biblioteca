<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livro;

class LivroController extends Controller
{
    public function armazena(Livro $livro)
    {
        try{
            $livro->save();

        } catch (\Exception $e) {
            return "ERROR:" . $e->getMessage();
        }
    }

    public function cadastroLivroView($idAutor)
    {
        return view( 'livros.createLivro', [
            'idAutor' => $idAutor
        ]);
    }

    public function novoLivro(Request $request)
    {
        if($request->titulo && $request->data_publicacao) {
            $livro = new Livro();
            $livro->titulo = $request->titulo;
            $livro->data_publicacao = $request->data_publicacao;
            $livro->id_autor = $request->id_autor;

            $this->armazena($livro);

            return redirect('autores/');
        }
    }
}
