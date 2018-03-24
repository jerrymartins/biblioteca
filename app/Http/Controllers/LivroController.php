<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\livro;

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
}
