|<!-- <?php include('./events.php'); ?> -->
<!doctype html>
<html lang="es">

<head>
    <title>Agenda</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="../../asset/css/style.css">

    <!-- Calendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/main.min.css" rel="stylesheet"></link> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/locales-all.js" rel="stylesheet"></script> -->


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" rel="stylesheet"> </link>
    
</head>

<body>

    <div class="container">
        <div class="col-12 wrapper">
            <h4 class="text-center">Agenda de Eventos</h4>
            <div class="p-5 mt-3 mb-4 bg-light rounded-3" id='calendar'></div>
        </div>
    </div>

    <!-- Modal Body lectura-->
    <div class="modal fade" id="myModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <!-- <h5 class="modal-title" id="tituloEvento"></h5> -->
                    <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div>
                        <p class="text-secondary">Descripción del evento: </p>
                        <!-- <h5 class="text-primary" id="descripcionEvento" name="description"></h5> -->
                        <h5 class="text-primary" id="description" name="description"></h5>
                    </div>
                    <div>
                        <!-- <p class="text-secondary">Día y Horario: </p> -->
                        <p class="text-secondary">Inicio: </p>
                        <h6 class="text-success" id="start" name="start">inicio</h6>
                        <p class="text-secondary">Fin: </p>
                        <h6 class="text-danger" id="end" name="end">fin</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Body edición -->
    <div class="modal fade" id="ModalEventos" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <form id="formAgenda" action="/login/secciones/agenda/index.php" method="post">

                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="tituloEvento"></h5>
                        <!-- <h5 class="modal-title" id="title"></h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <h5 class="text-primary" id="descripcionEvento"></h5>

                        Fecha: <input type="text" id="txtFecha" name="txtFecha" /><br />
                        Título: <input type="text" id="txtTitulo" /><br />
                        Hora: <input type="text" id="txtHora" value="10:30" /><br />
                        Description: <textarea id="txtDescription" rows="3"></textarea><br />
                        Color: <input type="color" value="#ff0000" id="txtColor" /><br />

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                        <button type="button" id="btnEditar" class="btn btn-warning">Editar</button>
                        <button type="button" id="btnBorrar" class="btn btn-danger">Borrar</button>
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancelar</button>
                        <!-- <button type="submit" class="btn btn-primary" id="btnAccion">Save</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        var myModal = new bootstrap.Modal(document.getElementById('myModal'))
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
                    left: 'prev,today,next',
                    center: 'title',
                    right: 'timeGridDay,timeGridWeek,dayGridMonth',
                },
                //dateClick: function(info) {
                //alert('Fecha Seleccionada: ' + info.dateStr);
                // change the day's background color just for fun
                //info.dayEl.style.backgroundColor = 'green';
                // document.getElementById('start').value = info.dateStr;
                //document.getElementById('titulo').textContent = 'Registro de Evento';
                //document.querySelector('#txtFecha').value = info.dateStr;
                //ModalEventos.show();
                //},
                editable: true,
                selectable: true,
                select: async function(start, end, allDay) {
                    const {
                        value: formValues
                    } = await Swal.fire({
                        title: 'Agregar Evento',
                        html: '<input id="swalEvTitle" class="swal2-input" placeholder="ingrese título">' +
                            '<textarea id="swalEvDescription" class="swal2-input" placeholder="ingrese descripción"></textarea>' +
                            '<input id="swalEvURL" class="swal2-input" placeholder="ingrese URL">',
                        focusConfirm: false,
                        preConfirm: () => {
                            return [
                                document.getElementById('swalEvTitle').value,
                                document.getElementById('swalEvDescription').value,
                                document.getElementById('swalEvURL').value,
                            ]
                        }
                    });
                    if (formValues) {
                        fetch("events.php", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/JSON"
                                },
                                body: JSON.stringify({
                                    request_type: 'addEvent',
                                    start: start.Str,
                                    end: start.endStr,
                                    event_data: formValues
                                }),
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status == 1) {
                                    Swal.fire('Evento agrgado exitosamente', '', 'success');
                                } else {
                                    Swal.fire(data.error, '', 'error');
                                }

                                calendar.refetchEvents();
                            })
                            .catch(console.error)
                    }
                },

                eventClick: function(info) {
                    info.jsEvent.preventDefault();
                    info.el.style.borderColor = 'blue';
                    Swal.fire({
                        title: info.event.title,
                        //icon: 'info',
                        html: '<p>' + info.event.extendedProps.description + '</p><a target="_blank" href="' + info.event.url + '">Ir a la Página</a>',
                    })

                    /*
                    document.querySelector('#title').innerHTML = info.event.title;
                    document.querySelector('#description').innerHTML = info.event.extendedProps[3];

                    document.querySelector('#start').innerHTML = info.event.extendedProps[4];

                    document.querySelector('#end').innerHTML = info.event.extendedProps[7];
                    console.log(info.event.title);
                    console.log("DESCRIPCION " + info.event.extendedProps[3]);
                    console.log("title   " + info.event.extendedProps[1]);
                    console.log("evento  " + info.event.extendedProps[2]);
                    console.log("description   " + info.event.extendedProps[3]);
                    console.log("start   " + info.event.extendedProps[4]);
                    console.log("end   " + info.event.extendedProps[7]);
                    */
                    //myModal.show();
                },
            })

            calendar.render()
        })
    </script>

    <script>
        $('#btnAgregar').click(function() {
            var NuevoEvento = {
                title: $('txtTitulo').val(),
                start: $('txtFecha').val() + " " + $('txtHora').val(),
                color: $('txtColor').val(),
                descripcion: $('txtDescripcion').val(),
                textColor: '#FFFFFF',
            };
            var calendar = new FullCalendar.Calendar('renderEvent', NuevoEvento, 'calendar');
            ModalEventos.show('toggleCalendar', calendar);
            // var NuevoEvento = {
            //     title: document.getElementById('txtTitulo').value,
            //     start: document.getElementById('txtFecha').value + " " + document.getElementById('txtHora').value,
            //     color: document.getElementById('txtColor').value,
            //     descripcion: document.getElementById('txtDescripcion').value,
            //     textColor: '#FFFFFF',
            // }

        });
    </script>

    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/main.min.css" rel="stylesheet">
    </link>
</body>

</html>