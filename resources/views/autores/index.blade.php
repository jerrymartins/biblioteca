@extends("templates.app")

@section("content")
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
@endsection