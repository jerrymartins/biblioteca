@extends("templates.app")

@section("content")

  <div class="col-md-6">
      <form action="{{url('autores/salva')}}" method="post">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="idNome">Nome</label>
          <input type="text" id="idNome" name="nome" value="{{ old('nome') }}" class="form-control" placeholder="nome do autor">
          </div>
          <div class="form-group">
              <label for="idSobreNome">Sobrenome</label>
              <input type="text" id="idSobreNome" name="sobreNome" value="{{ old('sobreNome') }}" class="form-control">
            </div>
          <div class="form-group">
            <label for="idDataNasc">Data Nascimento</label>
            <input type="date" id="idDataNasc" name="data_nascimento" value="{{ old('data_nascimento') }}" class="form-control" placeholder="Informe a data de seu nascimento">
          </div>
          <div class="form-group">
            <label for="idTituloLivro">Titulo</label>
            <input type="text" id="idTituloLivro" name="titulo" value="{{ old('titulo') }}"  class="form-control" placeholder="titulo do livro">
          </div>
          <div class="form-group">
            <label for="idDataPublicacao">Data Publicação</label>
            <input type="date" id="idDataPublicacao" name="data_publicacao" value="{{ old('data_publicacao') }}" class="form-control" placeholder="Informe a data de seu nascimento">
          </div>
          <button type="submit" class="btn btn-primary">cadastrar</button>
        </form>
        @if(count($errors))
        {{$errors->first()}}
      @endif
  </div>
@endsection