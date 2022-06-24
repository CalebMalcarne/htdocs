<?php
session_start();
if (!$_SESSION["signedin"]) {
    header("Location: /");
}

include "php/updatePass.php";
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
                        <a href="reporting.php" class="nav-link text-dark"><span class="d-none d-md-inline">Report&nbsp;&nbsp;</span><i class="bi bi-bug"></i></a>
                        <a class="nav-link active bg-dark"><span class="d-none d-md-inline">Tools&nbsp;&nbsp;</span><i class="bi bi-tools"></i></a>
                    </div>

                    <a href="../php/signOut.php" class="btn btn-danger"><span class="d-none d-md-inline">Sign Out&nbsp;&nbsp;</span><i class="bi bi-box-arrow-right"></i></a>
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
                        <a class="nav-link text-dark"><span class="d-none d-md-inline">Report&nbsp;&nbsp;</span><i class="bi bi-bug"></i></a>
                        <a class="nav-link active bg-dark"><span class="d-none d-md-inline">Tools&nbsp;&nbsp;</span><i class="bi bi-tools"></i></a>
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
                            <h1 class="card-title">Tools</h1>
                        </div>

                        <div class="card-body mt-2 mx-3">
                            <h2 class="text-center">Change Password</h2>

                            <form method="POST" onsubmit="return confirm('Are you sure you want to change the password?');">
                                <div class="mb-3">
                                    <label for="zone" class="form-label">Zone</label>
                                    <select name="zone" id="zone" class="form-select" required>
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
            
                                <div class="mb-4">
                                    <label for="password" class="form-label">Old Password</label>
                                    <input type="password" name="old_password" id="old_password" class="form-control" required>
                                    <br>
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                                    <br>
                                    <label for="password" class="form-label">Retype New Password</label>
                                    <input type="password" name="re_password" id="re_password" class="form-control"required>
                                </div>

                                <div class="text-center mb-2">
                                    <button type="submit" class="btn btn-success btn-lg">Update Password&nbsp;&nbsp;<i class="bi bi-check2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="updateFail" class="card text-center" hidden>
                <div class="card-body">
                    <h6 id="error_msg" class="card-text text-danger"></h6>
                </div>
            </div>
            
            <div id="success" class="card text-center" hidden>
                <div class="card-body">
                    <h6 class="card-text text-success">Password has been updated</h6>
                </div>
            </div>
        </div>

        <script>
            var err = '<?php echo $error; ?>';
            var sub = '<?php echo $sub; ?>';

            if (sub == '1'){
                document.getElementById("success").hidden = false;
            } else {
                document.getElementById("success").hidden = true;
            }

            if (err == '2'){
                document.getElementById("updateFail").hidden = false;
                document.getElementById("error_msg").innerHTML = "New Password can not be the same as old password";
            } else if (err == '1'){
                document.getElementById("updateFail").hidden = false;
                document.getElementById("error_msg").innerHTML = "New and re-typed password do not match";
            } else if (err == '3'){
                document.getElementById("updateFail").hidden = false;
                document.getElementById("error_msg").innerHTML = "Old password is not correct";
            } else if (sub == '1'){
                document.getElementById("success").hidden = false;
            } else {
                document.getElementById("updateFail").hidden = true;
            }
        </script>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </body>
</html>