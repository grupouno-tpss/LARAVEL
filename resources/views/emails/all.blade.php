@extends('layouts.plantilla')

@section('content')
<div class="container">

    <center>
        <h2 style="font-family: cursive;">Grupo 1</h2>
    </center>

    <br>
    @foreach($chats as $chat)

    <p><strong>{{$chat->user}}</strong>, ha escrito un mensaje importante en la página del grupo.</p>
    <br>
    <strong>El mensaje dice lo siguiente</strong>
    <br>
    <p>"{{$chat->message}}"</p>
    @endforeach()

    <br>
    <p>Para más información, entrar a la página del grupo.</p>
    <button class="btn btn-primary">Página del grupo</button>

</div>
<hr>

<footer class="container" style="background-color: #ffffff; padding: 30px;">
    <center>
        <strong style="font-family: cursive;">Grupo 1</strong>
        <br>
        <br>
        <strong>Contactar con lider de grupo: </strong>
        <br>
        <a href="mailto:jhostriana11@misena.edu.co">Correo electrónico</a>
        <a href="#">3227519202</a>
    </center>
</footer>

<!-- @foreach($chats as $chat)
        <strong>{{$chat->message}}</strong>
    @endforeach() -->
@endsection()