@extends('layouts.plantilla')

@section('content')
@extends('layouts.navigation')

<div class="container">
    <br>
    <h2>Chat</h2>
    <hr><br>
</div>

<div class="container chat">
    <div class="chatDiv">
        <h3>Usuarios</h3>
        <hr>
        <br>
        @foreach ($users as $user)
        <div class="chatUsers">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
            </svg>
            <a href="">{{$user->name}}</a>
        </div>
        <br>
        @endforeach()
    </div>
    <div class="chatDiv">
        <div class="contentChat" style="overflow-y: auto;">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Lo que se envíe en esta sección del chat quedará registrado en la base de datos pero no se enviará por correo
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <br>
            @foreach ($chat as $messages)
            <div>
                <strong style="text-decoration: underline;">{{$messages->user.': '}}</strong>{{$messages->message}}</p>
            </div>
            @endforeach()
        </div>
        <div class="messageChat">
            <form action="{{route('createMessage')}}" method="post" class="chatMessage">
                @csrf()
                <input type="text" value="{{Auth::user()->name}}" name="user" hidden>
                <textarea class="form-controller" style="width: 100%;" placeholder="Escriba aquí su mensaje" name="message" required></textarea>
                <input type="submit" onclick="loaderActive()" class="btn btn-success">
            </form>
        </div>
    </div>
    <div class="chatDiv">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            Lo que se envíe en esta sección del chat quedará registrado en la base de datos y se enviará por correo a todos los usuarios
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <br>
        <form action="{{route('allEmail')}}">
            @csrf()
            <center>
                <input type="text" value="{{Auth::user()->name}}" name="user" hidden>
                <textarea class="form-controller" style="width: 100%;" placeholder="Escriba aquí su mensaje" name="message" required></textarea>
                <br><br>
                <input type="submit" onclick="loaderActive()" class="btn btn-success">
            </center>
        </form>
    </div>
    <br><br>
</div>
@endsection()