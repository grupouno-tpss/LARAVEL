@extends('layouts.plantilla')


@section('asset("css/styles")')
@section('content')
@extends('layouts.navigation')

<div class="container">
    <br>
    <h2>Actividades</h2>
    <hr>
    <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Persona encargada</th>
                <th scope="col">Titulo de la actividad o trabajo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Fecha de entrega</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($acts as $act)
            <tr>
                <td scope="row">{{$act->user}}</td>
                <th>{{$act->title}}</th>
                <td>
                    <button onclick="alert('{{$act->desc}}')" class="btn btn-info">Descripción</button>
                </td>
                <td>{{$act->created_at}}</td>
                <td>{{$act->date}}</td>
                <td></td>
            </tr>
            @endforeach()
        </tbody>
    </table>
    <hr>
    <br>
    <center>
        <button class="btn btn-primary fixed-buttom">Crear actividad</button>
    </center>
</div>
@endsection()