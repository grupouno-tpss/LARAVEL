@extends("layouts.plantilla")

@section("styles")
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
@endsection()

@section("content")
@extends("layouts.navigation")
<div class="calendarModal" id="calendarModal" hidden>
    <div>
        <h2>Nueva tarea</h2>
        <hr>
        <form action="{{route('generateWork')}}" method="post" id="calendarForm">
            @csrf()
            <label>Fecha de entrega </label>
            <input type="text" class="form-control" name="fecha" readonly="readonly">
            <label>Titulo de la tarea</label>
            <input type="text" class="form-control" name="title" required></input>
            <label>Descripción de la tarea</label>
            <input type="text" class="form-control" name="de" required></input>
            <label>Usuario encargado</label>
            <select class="form-select" aria-label="Default select example" name="user" required>
                <option value="Jhojann Triana">Jhojann</option>
                <option value="Andrés Ramos">Andrés Ramos</option>
                <option value="Andrés Guerrero">Andres Guerrero</option>
                <option value="Diego Casallas">Diego Casallas</option>
            </select>
            <br>
            <hr>
            <button type="button" class="btn btn-secondary" id="calendarCloseModal" onclick="closeModal()">Cerrar</button>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
</div>
<div class="container">
    <br>
    <h2>Calendario</h2>
    <i class="bi bi-calendar-event">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
        </svg>
    </i>
    <div class="infoCalendar">
        <div id="year"></div>
        <div class="btn-light" id="nameMonth"></div>
        <div>
            <button class="btn btn-primary" onclick="backMonth()">
                Atras
                <i class="bi bi-chevron-compact-left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 0 1 .223.67L6.56 8l2.888 5.776a.5.5 0 1 1-.894.448l-3-6a.5.5 0 0 1 0-.448l3-6a.5.5 0 0 1 .67-.223z" />
                    </svg>
                </i>
            </button>
            <button class="btn btn-primary" onclick="nextMonth()">
                Adelante
                <i class="bi bi-chevron-compact-right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z" />
                    </svg>
                </i>
            </button>
        </div>
    </div>
    <br>
    <div class="calendar" id="calendar">
        <div>Lunes</div>
        <div>Martes</div>
        <div>Miercoles</div>
        <div>Jueves</div>
        <div>Viernes</div>
        <div>Sabado</div>
        <div>Domingo</div>
    </div>
</div>

<script src="{{asset('js/calendar.js')}}"></script>

<script>
    let dataDate = `@foreach($act as $actividad){{$actividad->date.","}}@endforeach()`;
    let dataTitle = `@foreach($act as $actividad){{$actividad->title.","}}@endforeach()`;

    let dataDateArr = dataDate.split(",");
    let dataTitleArr = dataTitle.split(",");

    dataDateArr.pop();
    dataTitleArr.pop();




    function calendarInner() {
        let contador = 0;

        function append(x) {

            let span = document.createElement("span");
            span.innerHTML = dataTitleArr[contador];

            span.classList.add("calendarAct");

            document.getElementById(x).appendChild(span);


            span.addEventListener("click", () => {
                alert("Hola Mundo");
            });
            contador++;
        }

        dataDateArr.forEach(element => {
            append(element);
        });
    }

    calendarInner();
</script>
@endsection()