<div class="container">
    <center>
        <h1 style="font-family: cursive;">Grupo 1</h1>
    </center>
    <br>
    <h2>Nuevo anuncio</h2>
    <br>
    <p>Hey, se ha publicado nuevo anuncio en la página del grupo :().</p>
    @foreach($ads as $ad)
    <br>
    <hr>
    <strong>{{$ad->title}}</strong>
    <p>{{$ad->body}}</p>
    <button>Ver anuncio</button>
    <hr>
    <br>
    @endforeach()
</div>