<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
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

    public function validacao($data)
    {
        $regras = [
            'nome' => 'required|max:20|min:3',
            'sobreNome' => 'required|max:20|min:3',
            'data_nascimento' => 'required|date',
            'titulo' => 'required|unique:posts',
            'data_publicacao' => 'required|date'
        ];

        $mensg = [
            'nome.required' => 'obrigatório informar o nome do autor',
            'nome.max' => 'limite do tamanho do nome excedido',
            'SobreNome.required' => 'obrigatório informar o sobrenome do autor',
            'SobreNome.max' => 'limite do tamanho do sobrenome excedido',
            'data_nascimento.required' => 'infome a data de nascimento'
        ];

        return Validator::make($data, $regras, $mensg);
    }

    public function index()
    {
        $list_autores = Autor::paginate(2);
        return view( 'autores.index', ['autores' => $list_autores] );

    }

    public function cadastroView()
    {
        return view( 'autores.create');
    }

    public function armazena(Request $request)
    {
        $validacao = $this->validacao($request->all());

        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao->errors())->withInput($request->all());
        }

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

    public function editaView($id)
    {
        return view('autores.edit', [
            'autor' => $this->getAutor($id)
        ]);
    }

    private function getAutor($id)
    {
        return $this->autor->find($id);
    }

    public function atualiza(Request $request)
    {
        $autor = $this->getAutor($request->id);
        $autor->update($request->all());
        return redirect('/autores');
    }

    public function deleta(Request $request)
    {
        $autor = $this->getAutor($request->id);
        //var_dump($autor);
        
        $autor->delete();
        return redirect('/autores');
        
    }
}