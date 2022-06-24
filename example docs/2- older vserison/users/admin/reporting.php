<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ASM Facebook Tools</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

        <?php
        include "../php/sendReport.php";
        session_start();
        //$_SESSION["path"] = "/users/admin"
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
                    
                    <div class="nav nav-pills">
                        <a href="people.php" class="nav-link text-dark"><span class="d-none d-sm-inline">People&nbsp;&nbsp;</span><i class="bi bi-people-fill"></i></a>
                        <a href="insights.php" class="nav-link text-dark"><span class="d-none d-sm-inline">Insights&nbsp;&nbsp;</span><i class="bi bi-graph-up"></i></a>
                        <a class="nav-link active bg-dark"><span class="d-none d-sm-inline">Report&nbsp;&nbsp;</span><i class="bi bi-bug"></i></a>
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
        <div class="container mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h1 class="card-title mb-3">Reporting</h1>

                    <p>This web app is very new and, as such, very prone to bugs! We want to know any problems you may encounter, and any suggestions you have for us to improve! Please be as detailed as possible. If you are reporting a bug and are using a computer, please include any information inside the console. You can access this by pressing F12. A window will appear on your right; click on the "Console" tab, and copy everything in the white box into the report box. Please include a description of what didn't work. Thank you!</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-3">Feedback Form</h2>

                    <form  method = "POST" class="needs-validation">
                        <div class="mb-3">
                            <label for="email" class="control-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">What is this report about?</label>
                            <select name="type" id="type" class="form-select" required>
                                <option selected>Bug</option>
                                <option>Idea for Improvement</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="report" class="form-label">Report</label>
                            <textarea rows="4" name="report" id="report" class="form-control" required></textarea>
                        </div>

                        <div class="text-center mb-2">
                            <button type="submit" name="submit" class="btn btn-success btn-lg">Submit&nbsp;&nbsp;<i class="bi bi-check2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </body>
</html>
