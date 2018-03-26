@extends("templates.app")

@section("content")
  <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand"></a>
    <form class="form-inline" action="{{ url('autores/busca') }}" method="post">
      {{ csrf_field() }}
      <input class="form-control mr-sm-2" name="criterio" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>

  <div class="row">
    @foreach($autores as $autor)
    <div class="col-md-3 m-1 ml-4">
      <div class="card">
          <div class="card-header text-center bg-info">
            <a class="text-white" href="{{url('autores/edita/'.$autor->id)}}">{{ $autor->nome }}</a>
          </div>
          <ul class="list-group list-group-flush">
            @foreach($autor->livros as $livros)   
              <li class="list-group-item">{{$livros->titulo}}</li>
            @endforeach
          </ul>
      </div>
    </div>
  @endforeach
  </div>
  <div>
      {{ $autores->links() }}
  </div>
@endsection