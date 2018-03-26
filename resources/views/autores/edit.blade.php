@extends("templates.app")

@section("content")
  <div class="col-md-6">
      <form action="{{url('autores/atualiza')}}" method="post">
        {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$autor->id}}">
        <div class="form-group">
          <label for="idNome">Nome</label>
        <input type="text" id="idNome" name="nome" class="form-control" value="{{$autor->nome}}">
        </div>
        <div class="form-group">
            <label for="idSobreNome">Sobrenome</label>
        <input type="text" id="idSobreNome" name="sobreNome" class="form-control" value="{{$autor->sobreNome}}">
          </div>
        <div class="form-group">
          <label for="idDataNasc">Data Nascimento</label>
          <input type="date" id="idDataNasc" name="data_nascimento" class="form-control" value="{{$autor->data_nascimento}}">
        </div>
        <div class="float-left">
          <a href="{{ url('livros/novoLivro/'.$autor->id) }}" class="btn btn-info text-white">cadastrar livro</a>
        </div>
        <div class="float-right">
          <button type="submit" class="btn btn-primary">atualizar</button>
          <a href="{{ url('autores/deleta/'.$autor->id) }}" class="btn btn-danger">apagar</a>
        </div>
      </form>
  </div>
@endsection