@extends("templates.app")

@section("content")
  <div class="col-md-6">
      <form action="{{url('livros/salvaLivro')}}" method="post">
        {{ csrf_field() }}
      <input type="hidden" name="id_autor" value="{{$idAutor}}">
          <div class="form-group">
            <label for="idTituloLivro">Titulo</label>
            <input type="text" id="idTituloLivro" name="titulo" class="form-control" placeholder="titulo do livro">
          </div>
          <div class="form-group">
            <label for="idDataPublicacao">Data Publicação</label>
            <input type="date" id="idDataPublicacao" name="data_publicacao" class="form-control" placeholder="Informe a data de seu nascimento">
          </div>
          <button type="submit" class="btn btn-primary">cadastrar</button>
        </form>
  </div>
@endsection