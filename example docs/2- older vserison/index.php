<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ASM Facebook Tools</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

        <?php
        session_start();
        $_SESSION["database"] = "signin";
        ?>
    </head>

    <body class="bg-light">
        <!--Navbar-->
        <div class="fixed-top shadow">
            <div class="navbar navbar-light bg-white">
                <div class="container">
                    <div class="d-inline-flex">
                        <img src="../../images/logo.png" alt="ASM Logo" height="50px">&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">ASM Facebook Tools</h1>
                    </div>
                </div>
            </div>
        </div>

        <!--Hidden Navbar for responsiveness-->
        <div class="mb-5">
            <div class="navbar navbar-light bg-white">
                <div class="container">
                    <div class="d-inline-flex">
                        <img src="../../images/logo.png" alt="ASM Logo" height="50px">&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">ASM Facebook Tools</h1>
                    </div>
                </div>
            </div>
        </div>

        <!--Content-->
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                    <h1 class="card-title text-center mb-3">Sign In</h1>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="zone" class="form-label">Zone</label>
                            <select name="zone" id="zone" class="form-select">
                                <option selected hidden></option>
                                <option>Camelback</option>
                                <option>Maricopa</option>
                                <option>Maricopa North</option>
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
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="text-center mb-2">
                            <button type="submit" class="btn btn-success btn-lg">Sign In&nbsp;&nbsp;<i class="bi bi-box-arrow-in-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="signInFailedMessage" class="card text-center" hidden>
                <div class="card-body">
                    <h6 class="card-text text-danger">Sign in failed. Please try again.</h6>
                </div>
            </div>
        </div>

        <?php
        include "php/validateSignIn.php";
        ?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </body>
</html>
