<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = [
        'id',
        'titulo',
        'data_publicacao',
        'autor_id'
    ];

    protected $table = 'livros';

}