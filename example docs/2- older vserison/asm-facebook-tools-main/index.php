<?php
session_start();
$_SESSION["database"] = "signin";
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ASM Facebook Tools</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body class="bg-light">
        <!-- Navbar -->
        <div class="fixed-top shadow-lg">
            <div class="navbar navbar-light bg-white">
                <div class="container">
                    <div class="d-flex">
                        <img src="images/christ.png" alt="Jesus Christ" class="my-1" style="height: 3rem;">&nbsp;&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">ASM Facebook Tools</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden navbar for responsiveness -->
        <div class="mb-5">
            <div class="navbar">
                <div class="container">
                    <div class="d-flex">
                        <img src="images/christ.png" alt="Jesus Christ" class="my-1" style="height: 3rem;">&nbsp;&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">ASM Facebook Tools</h1>
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
                                    <label for="zone" class="form-label">Zone</label>
                                    <select name="zone" id="zone" class="form-select" required>
                                        <option hidden></option>
                                        <option>Camelback</option>
                                        <option>Mesa Maricop</option>
                                        <option>Paradise Valley</option>
                                        <option>Payson</option>
                                        <option>Phoenix</option>
                                        <option>Phoenix East</option>
                                        <option>Round Valley</option>
                                        <option>Scottsdale North</option>
                                        <option>Show Low</option>
                                        <option>Snowflake</option>
                                        <option>White Mountain</option>
                                        <option>-Admin-</option>
                                    </select>
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
                        </div>
                    </div>
                </div>
            </div>

            <div id="signInFailedMessage" class="row" hidden>
                <div class="col d-flex justify-content-center">
                    <div class="card bg-danger text-white shadow mb-3">
                        <div class="card-body text-center">
                            <h6 class="card-text">Sign in failed. Please try again.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </body>
</html>