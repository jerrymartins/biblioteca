<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Livro;

class Autor extends Model
{
    //no formulário de cadastro do template create.blade.php, os atributos name precisam ter os mesmos nomes que estes.
    protected $fillable = [
        'id',
        'nome',
        'sobreNome',
        'data_nascimento'
    ];

    protected $table = "autores";

    //cria uma relação de 1 para muitos, onde um autor pode ter vários livros
    public function livros()
    {
        return $this->hasMany(Livro::class, 'id_autor');
    }

    static function busca($criterio)
    {
        return static::where('nome', 'LIKE', '%'.$criterio.'%')->paginate(4);
    }

}
