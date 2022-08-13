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
                        <img src="../imgs/Logo3.jpg" alt="Company logo" class="my-1" style="height: 2rem;">&nbsp;&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-2 mb-1">Malcarne Contracting Employee Portal</h1>
                    <div class="nav nav-pills">
                        <a id = "DataLink" href ="" class="nav-link text-dark"><span class="d-none d-md-inline">Employee Time Sheet&nbsp;&nbsp;</span><i class="bi bi-people-fill"></i></a>
                        <a href="../user_pages/input_hours.php" class="nav-link text-dark"><span class="d-none d-md-inline">Add Employee&nbsp;&nbsp;</span><i class="bi bi-graph-up"></i></a>
                        <a href="../user_pages/updatepass.php?err=0&sub=0" class="nav-link text-dark"><span class="d-none d-md-inline">Change Password&nbsp;&nbsp;</span><i class="bi bi-tools"></i></a>
                        <a href="" class="nav-link text-dark"><span class="d-none d-md-inline">Input Employee Hours&nbsp;&nbsp;</span><i class="bi bi-tools"></i></a>
                    </div>  
                    <a href="../index.php" class="btn btn-danger"><span class="d-none d-md-inline">Sign Out&nbsp;&nbsp;</span><i class="bi bi-box-arrow-right"></i></a>
                </div>
                </div>
            </div>
        </div>

        <!-- Hidden navbar for responsiveness -->
        <div class="mb-5">
            <div class="navbar">
                <div class="container">
                    <div class="d-flex">
                        <img src="imgs/Logo3.jpg" alt="Company logo" class="my-1" style="height: 2rem;">&nbsp;&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-2 mb-1">Malcarne Contracting Employee Portal</h1>
                    <div class="nav nav-pills">
                        <a href="" class="nav-link text-dark"><span class="d-none d-md-inline">Time Sheet&nbsp;&nbsp;</span><i class="bi bi-people-fill"></i></a>
                        <a href="../user_pages/input_hours.php" class="nav-link text-dark"><span class="d-none d-md-inline">Input Hours&nbsp;&nbsp;</span><i class="bi bi-graph-up"></i></a>
                        <a href="" class="nav-link text-dark"><span class="d-none d-md-inline">change password&nbsp;&nbsp;</span><i class="bi bi-tools"></i></a>
                        <a href="" class="nav-link text-dark"><span class="d-none d-md-inline">Input Employee Hours&nbsp;&nbsp;</span><i class="bi bi-tools"></i></a>&nbsp;&nbsp;</span>
                    </div>
                    <a href="../index.php" class="btn btn-danger"><span class="d-none d-md-inline">Sign Out&nbsp;&nbsp;</span><i class="bi bi-box-arrow-right"></i></a>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>