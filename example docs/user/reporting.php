<?php
include "../php/sendReport.php";
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
                        <img src="../images/christ.png" alt="Jesus Christ" class="my-1" style="height: 3rem;">&nbsp;&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">ASM Facebook Tools</h1>
                    </div>
                    
                    <div class="nav nav-pills">
                        <a href="people.php" class="nav-link text-dark"><span class="d-none d-md-inline">People&nbsp;&nbsp;</span><i class="bi bi-people-fill"></i></a>
                        <a href="insights.php" class="nav-link text-dark"><span class="d-none d-md-inline">Insights&nbsp;&nbsp;</span><i class="bi bi-graph-up"></i></a>
                        <a class="nav-link active bg-dark"><span class="d-none d-md-inline">Report&nbsp;&nbsp;</span><i class="bi bi-bug"></i></a>
                    </div>

                    <a href="../php/destroy.php" class="btn btn-danger"><span class="d-none d-md-inline">Sign Out&nbsp;&nbsp;</span><i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Hidden navbar for responsiveness -->
        <div class="mb-5">
            <div class="navbar navbar-light bg-white">
                <div class="container">
                    <div class="d-flex">
                        <img src="../images/christ.png" alt="Jesus Christ" class="my-1" style="height: 3rem;">&nbsp;&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">ASM Facebook Tools</h1>
                    </div>
                    
                    <div class="nav nav-pills">
                        <a class="nav-link text-dark"><span class="d-none d-md-inline">People&nbsp;&nbsp;</span><i class="bi bi-people-fill"></i></a>
                        <a class="nav-link text-dark"><span class="d-none d-md-inline">Insights&nbsp;&nbsp;</span><i class="bi bi-graph-up"></i></a>
                        <a class="nav-link active bg-dark"><span class="d-none d-md-inline">Report&nbsp;&nbsp;</span><i class="bi bi-bug"></i></a>
                    </div>

                    <a class="btn btn-danger"><span class="d-none d-md-inline">Sign Out&nbsp;&nbsp;</span><i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-10">
                    <div class="card shadow">
                        <div class="card-header text-center bg-dark text-white">
                            <h1 class="card-title">Reporting</h1>
                        </div>

                        <div class="card-body mt-2 mx-3">
                            <p class="card-text text-center mb-5">This web app is very new and, as such, very prone to bugs! We want to know any problems you may encounter, and any suggestions you have for us to improve! Please be as detailed as possible. If you are reporting a bug and are using a computer, please include any information inside the console. You can access this by pressing F12. A window will appear on your right; click on the "Console" tab, and copy everything in the white box into the report box. Please include a description of what didn't work. Thank you!</p>

                            <h2 class="text-center">Feedback Form</h2>
                            <form method="POST" action="../php/sendReport.php?path=user">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="text" name="email" id="email" class="form-control" required>
                                        <span class="input-group-text">@missionary.org</span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">What is this report about?</label>
                                    <select name="type" id="type" class="form-select" required>
                                        <option>Bug</option>
                                        <option>Idea for Improvement</option>
                                    </select>
                                </div>

                                <div class="mb-5">
                                    <label for="report" class="form-label">Report</label>
                                    <textarea rows="6" name="report" id="report" class="form-control" required></textarea>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-lg">Submit <i class="bi bi-check2"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </body>
</html>