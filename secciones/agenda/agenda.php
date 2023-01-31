<?php include('./eventos.php'); ?>


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










    <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/index.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/index.global.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/main.min.css">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/locales-all.js"></script> -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="container">
        <div class="col-md-8 offset-md-2">
            <!-- <h2 class="text-center">Eventos</h2>
           <p class="text-center">Click para ver</p> -->
            <div class="p-5 mb-4 bg-light rounded-3 container" id='calendar'></div>
        </div>
    </div>

    <!-- Modal Body -->
    <div class="modal fade" id="myModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formAgenda" action="/login/secciones/agenda/agenda.php" method="post">
                    <div class="modal-body">
                        <div class="form-float mb-3">
                            <label for="evento" class="form-label text-center">Evento</label>
                            <input type="text" class="form-control" id="evento" name="evento">
                        </div>
                        <div class="form-float mb-3">
                            <label for="start" class="form-label text-center">Fecha</label>
                            <input type="date" class="form-control" id="start" name="start">
                        </div>
                        <div class="form-float mb-3">
                            <input type="color" class="form-control" id="color" name="color">
                            <label for="color" class="form-label text-center">color</label>
                        </div>
                    </div>

                    <!-- <div class="modal-footer">
                        Footer
                    </div> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnAccion">Save</button>
                    </div>
                </form>

                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div> -->




                <!-- <div class="table-responsive card-body card-background ">
                        <table class="table">
                            <thead>
                                    <tr>
                                        <th >evento</th>
                                        <th >start</th>
                                        <th >color</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($eventos as $evento) : ?>
                                            <tr>
                                                <td><?php echo $evento['evento']; ?></td>
                                                <td><?php echo $evento['start']; ?></td>
                                                <td><?php echo $evento['color']; ?></td>
                                            </tr>
                                <?php endforeach;  ?>
                            </tbody>
                        </table>
                </div> -->
            </div>
        </div>
    </div>


    <!-- <script>
        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
    </script> -->

    <!-- <script src="../../login/asset/js/moment.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <script src='fullcalendar/core/index.global.js'></script> -->
    <!-- <script src='fullcalendar/core/locales/es.global.js'></script> -->
    <script>
        //const myModalAlternative = new bootstrap.Modal('#myModal')
        const myModal = new bootstrap.Modal(document.getElementById('myModal'))
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locales: "es",
                headerToolbar: {
                    left: 'prev,today,next',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay',
                },
                events: 'eventos',
                dateClick: function(info) {
                    // document.getElementById('start').value = info.dateStr;
                    // document.getElementById('title').textContent = 'Registro de Evento';
                    myModal.show();
                    // console.log("aquí");
                }
            });
            calendar.render();
            //calendar.refetchEvents();
            // frm.addEventListener('submit', function(e) {
            //     e.preventDefault();
            //     const evento = document.getElementById('event').value;
            //     const start = document.getElementById('start').value;

            //     const color = document.getElementById('color').value;
            //     if (evento=="" || start== "" || color==) {
            //         Swal.fire(
            //             'warning',
            //         )
            //     } else {

            //     }


            // });
        });
        //calendar.setOption('locale', 'es');
    </script>

    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script> -->
</body>

</html>