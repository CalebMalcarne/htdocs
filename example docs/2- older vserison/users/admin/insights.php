<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ASM Facebook Tools</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    </head>
    <?php 
    session_start(); 
    ?>

    <body class="bg-light">
        <!--Navbar-->
        <div class="fixed-top shadow">
            <div class="navbar navbar-light bg-white">
                <div class="container">
                    <div class="d-inline-flex">
                        <img src="../../images/logo.png" alt="ASM Logo" height="50px">&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">ASM Facebook Tools</h1>
                    </div>
                    
                    <div class="nav nav-pills">
                        <a href="people.php" class="nav-link text-dark"><span class="d-none d-sm-inline">People&nbsp;&nbsp;</span><i class="bi bi-people-fill"></i></a>
                        <a class="nav-link active bg-dark"><span class="d-none d-sm-inline">Insights&nbsp;&nbsp;</span><i class="bi bi-graph-up"></i></a>
                        <a href="reporting.php" class="nav-link text-dark"><span class="d-none d-sm-inline">Report&nbsp;&nbsp;</span><i class="bi bi-bug"></i></a>
                        <a href="tools.php" class="nav-link text-dark"><span class="d-none d-sm-inline">Tools&nbsp;&nbsp;</span><i class="bi bi-tools"></i></a>
                    </div>

                    <a href="../../index.php" class="btn btn-danger btn-lg"><span class="d-none d-sm-inline">Sign Out&nbsp;&nbsp;</span><i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!--Hidden Navbar for responsiveness-->
        <div class="mb-5">
            <div class="navbar">
                <div class="container">
                    <div class="d-inline-flex">
                        <img src="../../images/logo.png" alt="ASM Logo" height="50px">&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">ASM Facebook Tools</h1>
                    </div>
                    
                    <div class="nav nav-pills">
                        <a class="nav-link"><span class="d-none d-sm-inline">People&nbsp;&nbsp;</span><i class="bi bi-people-fill"></i></a>
                        <a class="nav-link"><span class="d-none d-sm-inline">Insights&nbsp;&nbsp;</span><i class="bi bi-graph-up"></i></a>
                        <a class="nav-link"><span class="d-none d-sm-inline">Report&nbsp;&nbsp;</span><i class="bi bi-bug"></i></a>
                        <a class="nav-link"><span class="d-none d-sm-inline">Tools&nbsp;&nbsp;</span><i class="bi bi-tools"></i></a>
                    </div>

                    <a class="btn btn-lg"><span class="d-none d-sm-inline">Sign Out&nbsp;&nbsp;</span><i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!--Content-->
        <div class="container">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="card-title">Coming Soon!</h1>
                </div>
            </div>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </body>
</html>
