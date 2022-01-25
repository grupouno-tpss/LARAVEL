@extends("layouts.plantilla")

@section("content")
@extends("layouts.navigation")

<div class="container">
    <br>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Hola {{Auth::user()->name}} : )</strong>
        <p>Esta página la he creado con una tecnologia que he aprendido en vacaciones, esta tecnologia se llama laravel, es un framwork de PHP y te lo recomiendo completamente si queres aprender lo que hoy en dia se podria llamar como programación moderna.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        si sigo siendo el lider de grupo, por esta página voy a registrar el trabajo de cada uno y las actividades que se realicen en el grupo y claro, con el proyecto formativo. Por tal razón, es importante que la revices.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <br>
    <h2>Anuncios</h2>
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Crear anuncio
    </button>

    <!-- Modal -->
    <div class="modal fade modal-centered" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear nuevo anuncio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('generateAd')}}" method="post">
                        @csrf()
                        <label for="name">Ingrese el titulo del anuncio</label>
                        <input type="text" class="form-control" id="name" name="title" required>
                        <label for="body">Ingrese el cuerpo del anuncio</label>
                        <textarea class="form-control" id="body" name="body" required></textarea>
                        <label for="link">Ingrese el enlace de redirección del anuncio</label>
                        <input type="text" class="form-control" id="link" name="link" required>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" onclick="loaderActive()" class="btn btn-primary" value="Publicar anuncio">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    @foreach ($ads as $ad)
    <div class="card text-center">
        <div class="card-header">
            Anuncio (creado en la fecha y hora: {{$ad->created_at}})
        </div>
        <div class="card-body">
            <strong>
                <h5 class="card-title">{{$ad->title}}</h5>
            </strong>
            <p class="card-text">{{$ad->body}}</p>
            <a href="{{$ad->link}}" target="_blank" class="btn btn-primary">{{$ad->link}}</a>
        </div>
        <div class="card-footer text-muted">
            Ultima actualización: {{$ad->updated_at}}
        </div>
    </div>
    <br>
    <br>
    @endforeach()
</div>
@endsection()