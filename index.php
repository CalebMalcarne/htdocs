
<!DOCTYPE html>
<?php
include "php/destroy.php";
session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Malcarne Employee Portal</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body class="bg-light">
        <!-- Navbar -->
        <div class="fixed-top shadow-lg">
            <div class="navbar navbar-light bg-white">
                <div class="container">
                    <div class="d-flex">
                        <img src="imgs/Logo3.jpg" alt="Company logo" class="my-1" style="height: 2rem;">&nbsp;&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-2 mb-1">Malcarne Contracting Employee Portal</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden navbar for responsiveness -->
        <div class="mb-5">
            <div class="navbar">
                <div class="container">
                    <div class="d-flex">
                        <img src="imgs/Logo3.jpg" alt="Company Logo" class="my-1" style="height: 2rem;">&nbsp;&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-2 mb-1">Malcarne Contracting Employee Portal</h1>
                    </div>
                </div>
            </div>
        </div>

        <!--Content-->
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="card shadow">
                        <div class="card-header text-center bg-dark text-white">
                            <h1 class="card-title">Sign In</h1>
                        </div>

                        <div class="card-body mt-2 mx-3">
                            <form method="POST" action="php/validateSignIn.php">
                                <div class="mb-3">
                                    <label for="zone" class="form-label">username</label>
                                    <input type = "text" name = "user" id = "user" class="form-control">
                                </div>
            
                                <div class="mb-5">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-lg">Sign In <i class="bi bi-box-arrow-in-right"></i></button>
                                    </div>
                                </div>
                            </form>

                            <form method="post" action="/php/weekRange.php">
                                <div class="row mb-3">
                                    <div class="col d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-lg">test data <i class="bi bi-box-arrow-in-right"></i></button>
                                    </div>
                                </div>
                            </form>



            <div id="signInFailedMessage" class="row" hidden>
                <div class="col d-flex justify-content-center">
                    <div class="card bg-danger text-white shadow mb-3">
                        <div class="card-body text-center">
                            <h6 class="card-text">Email or Password incorrect. Please try again.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <?php
        if (isset($_GET['err'])){
            echo "<script>document.getElementById('signInFailedMessage').hidden = false;</script>";
        }
        ?>
    
    </body>
</html>