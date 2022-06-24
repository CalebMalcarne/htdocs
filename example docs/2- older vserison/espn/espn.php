<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clases de Ingles</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <?php
        include "sendReport.php";
        ?>
    </head>

    <body>
        <div class="navbar shadow">
            <div class="container-fluid">
                <div class="d-inline-flex">
                    <img src="images/logo.png" alt="ASM Logo" height="48rem">&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">Arizona Scottsdale Misión</h1>
                    <a href = "../index.php"><button type="submit" class="btn btn-success btn-sm">FB Page&nbsp;&nbsp;<i class="bi bi-box-arrow-in-right"></i></button></a>
                </div>
            </div>
        </div>

        <div class="container-fluid mb-5" style="height: 24rem; background-image: url('images/eng_class.jpg'); background-size: cover; background-position: center 65%;">
            <div class="row align-items-center" style="height: 24rem;">
                <div class="col text-center">
                    <h1 class="display-1" style="color: #ffffff;">Aprender Ingles</h1>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <p class="lead mb-5">Quieres aprender o mejorar tu ingles con una clase y ayuda gratis? Llena la forma de abajo para encontrar el clase mas cerca de tu casa!</p>
            

            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h1>REGÍSTRATE</h1>
                </div>

                <div class="card-body">
                    <div class="container">
                        <form method="POST">
                            <input type="text" name="name" placeholder="Nombre" class="form-control mb-3" required>
                            
                            <input type="text" name="email" placeholder="Apellido" class="form-control mb-3" required>

                            <input type="text" name="phone" placeholder="Celular" class="form-control mb-3" required>

                            <select name="location" class="form-select mb-4" required>
                                <option selected hidden>Localización</option>
                                <option>Localización 1</option>
                                <option>Localización 2</option>
                                <option>Localización 3</option>
                                <option>Localización 4</option>
                                <option>Localización 5</option>
                            </select>

                            <button type="submit" class="btn btn-primary btn-lg">REGISTRAR</button>
                        </form>
                        <p5><small><em>no es necesario registrarse para asistir</em></small></p5>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center">

            <div class="shadow-sm mb-4">

                <div class=" card shadow-sm mb-4">
                    <div class="card-header">
                        <h1>Localizacións</h1>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <h4> Gold Dust Edificio</h4>
                            <h5>Jueves a las 7:00PM</h5>
                            <h5>Habla a:  6840 E Gold Dust Ave, Scottsdale, AZ 85253</h5>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="container">
                            <h4> Edificio 2</h4>
                            <h5>Jueves a las 7:00PM</h5>
                            <h5>Habla a: </h5>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="container">
                            <h4> Edificio 2</h4>
                            <h5>Jueves a las 7:00PM</h5>
                            <h5>Habla a: </h5>
                        </div>
                    </div>
                </div>

            </div>

            <h2 class="mb-5"><em>Tienes preguntas? Llámanos!</em> (480) 111-1111</h2>

            <h4>Quiénes Somos?</h4>
            <p><small>Somos misioneros de La Iglesia de Jesucristo de Los Santos de Los Ultimos Dias. Prestamos mucho servicio, incluso ayudamos a ensenar estas clases de ingles! Si quieres aprender mas sobre La Iglesia, puedes preguntar a los misioneros o visitarnos a <a href="https://laiglesiadejesucristo.org" target="_blank" style="text-decoration: none;">LaIglesiaDeJesuCristo.org</a> o <a href="https://www.facebook.com/CristoEnScottsdale" target="_blank" style="text-decoration: none;">Facebook</a>.</small></p>
        </div>


        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
    