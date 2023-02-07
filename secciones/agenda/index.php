<!-- |<?php include('./events.php'); ?> -->
<!doctype html>
<html lang="es">

<head>
    <title>Agenda</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="../../asset/css/style.css">

    <!-- Calendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/main.min.css" rel="stylesheet"></link> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/locales-all.js" rel="stylesheet"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" rel="stylesheet">
    </link>

</head>

<body>

    <div class="container">
        <div class="col-12 wrapper">
            <h4 class="text-center p-3">Agenda de Eventos</h4>
            <div class="p-5 mt-3 mb-4 bg-light rounded-3" id='calendar'></div>
        </div>
    </div>

    <!-- Modal Body edición -->
    <div class="modal fade" id="ModalEventos" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <!-- <form id="formAgenda" action="/login/secciones/agenda/index.php" method="post"> -->
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="tituloEvento"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!--<div class="text-primary" id="descripcionEvento"></div>

                     Fecha: <input type="text" id="txtFecha" name="txtFecha" /><br />
                    Título: <input type="text" id="txtTitulo" /><br />
                    Hora: <input type="text" id="txtHora" value="10:30" /><br />
                    Description: <textarea id="txtDescripcion" rows="3"></textarea><br />
                    URL: <input type="text" id="txtURL" /><br />
                    Color: <input type="color" value="#ff0000" id="txtColor" /><br /> -->

                    <input type="hidden" id="Id">

                    <div class="form-row">
                        <div class="form-group col-12 mb-3">
                            <label for="">Título del Evento</label>
                            <!-- <input type="text" id="Titulo" class="form-control" placeholder=""> -->
                            <input type="text" id="evento" class="form-control" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Fecha">Fecha Inicio</label>
                            <div class="input-group" data-autoclose="true">
                                <!-- <input type="date" id="FechaInicio" class="form-control" value=""> -->
                                <input type="date" id="start" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group col-md-6" id="TituloHoraInicio">
                            <label for="Hora">Hora Inicio</label>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" id="HoraInicio" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Fecha">Fecha Fin</label>
                            <div class="input-group" data-autoclose="true">
                                <!-- <input type="date" id="FechaFin" class="form-control" value=""> -->
                                <input type="date" id="end" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group col-md-6" id="TituloHoraFin">
                            <label for="Hora">Hora Fin</label>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" id="HoraFin" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">
                        <label for="Descripcion">Descripción</label>
                        <!-- <textarea id="Descripcion" class="form-control" rows="3"></textarea> -->
                        <textarea id="Description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="form-row">
                        <label for="Color">Color</label>
                        <!-- <input type="color" value="#3788D8" id="ColorFondo" class="form-control" style="height:36px;"> -->
                        <input type="color" value="#3788D8" id="color" class="form-control" style="height:36px;">
                    </div>

                    <div class="form-row">
                        <label for="Color">Color Texto</label>
                        <!-- <input type="color" value="#ffffff" id="ColorTexto" class="form-control" style="height:36px;"> -->
                        <input type="color" value="#ffffff" id="textColor" class="form-control" style="height:36px;">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                    <button type="button" id="btnEditar" class="btn btn-warning">Editar</button>
                    <button type="button" id="btnBorrar" class="btn btn-danger">Borrar</button>
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancelar</button>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>

    <!-- <script type="text/javascript">
        $('.clockpicker').clockpicker();
    </script> -->
    <script>
        //$('.clockpicker').clockpicker();
        //var myModal = new bootstrap.Modal(document.getElementById('myModal'))
        var ModalEventos = new bootstrap.Modal(document.getElementById('ModalEventos'))
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar')
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                timeZone: 'local',
                initialView: 'dayGridMonth',
                height: 650,
                events: 'http://localhost/login/secciones/agenda/events.php',
                headerToolbar: {
                    locale: 'es',
                    left: 'prev,today,next',
                    center: 'title',
                    right: 'timeGridDay,timeGridWeek,dayGridMonth',
                },
                dateClick: function(info) {
                    //alert('Fecha Seleccionada: ' + info.dateStr);
                    //change the day's background color just for fun
                    //info.dayEl.style.backgroundColor = 'green';
                    //document.getElementById('start').value = info.dateStr;
                    //document.getElementById('titulo').textContent = 'Registro de Evento';

                    // document.querySelector('#txtFecha').value = info.dateStr;
                    // document.querySelector('#txtTitulo').value = "hi ";
                    ModalEventos.show();
                    //document.getElementById('FechaInicio').value(info.dateStr);
                    limpiarModal();
                    //document.getElementById('btnEditar').hide();
                    if (info.allDay) {
                        document.getElementById('FechaInicio').value = info.dateStr;
                        document.getElementById('FechaFin').value = info.dateStr;

                    } else {
                        let fechaHora = info.dateStr.split("T");
                        document.getElementById('FechaInicio').value = fechaHora[0];
                        document.getElementById('FechaFin').value = fechaHora[0];
                        document.getElementById('HoraInicio').value = fechaHora[1].substring(0, 5);


                    };
                    
                },
                editable: true,
                selectable: true,
                eventClick: function(info) {
                    info.jsEvent.preventDefault();
                    info.el.style.borderColor = 'blue';
                    Swal.fire({
                        title: info.event.title,
                        html: '<p>' + info.event.extendedProps.description +
                            '</p><a target="_blank" href="' + info.event.url + '">Ir a la Página</a>',
                    })
                },
            });

            calendar.render();

        

            function agregarRegistro(registro) {
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/login/secciones/agenda/events.php?accion=agregar',
                    data: registro,
                    success: function(msg) {
                        calendar.refetchevents();
                    },
                    error: function(error) {
                        alert("Hubo un error al agregar el evento " + error.message);
                    }
                })
            }

            function limpiarModal() {
                document.getElementById('Id').value = '';
                document.getElementById('Titulo').value = '';
                document.getElementById('FechaInicio').value = '';
                document.getElementById('HoraInicio').value = '';
                document.getElementById('FechaFin').value = '';
                document.getElementById('HoraFin').value = '';
                document.getElementById('Descripcion').value = '';
                document.getElementById('ColorFondo').value = '#3788D8';
                document.getElementById('ColorTexto').value = '#ffffff'
            };
        })
    </script>

    <!-- <script>
        $('#btnAgregar').click(function() {
            var NuevoEvento = {
                // title: $('txtTitulo').val(),
                // start: $('txtFecha').val() + " " + $('txtHora').val(),
                // color: $('txtColor').val(),
                // descripcion: $('txtDescripcion').val(),
                // URL: $('txtURL').val(),
                // textColor: '#FFFFFF',

                title: $('txtTitulo').value,
                start: $('txtFecha').value + " " + $('txtHora').value,
                color: $('txtColor').value,
                descripcion: $('txtDescripcion').value,
                URL: $('txtURL').value,
                textColor: '#FFFFFF',
            };
            calendar = new FullCalendar.Calendar('renderEvent', NuevoEvento);
            ModalEventos.show();

        });
    </script> -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/main.min.css" rel="stylesheet">
    </link>
</body>

</html>