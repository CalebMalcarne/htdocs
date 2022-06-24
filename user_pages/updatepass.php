<?php
session_start();

if($_SESSION['user'] == 'admin'){
    include '../Headers/admin_header.php';    
} else {
    include '../Headers/general_header.php';
}
include '../php/updatePass.php'
?>

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

                            <form method="POST" action = "../php/updatePass.php" onsubmit="return confirm('Are you sure you want to change the password?');">
         
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
                document.getElementById("error_msg").innerHTML = "Old password is incorrect";
            } else if (err == '4'){
                document.getElementById("updateFail").hidden = false;
                document.getElementById("error_msg").innerHTML = "New password must be greather than or equal to 8 characters";
            } else if (err == '5'){
                document.getElementById("updateFail").hidden = false;
                document.getElementById("error_msg").innerHTML = "New password must contain both numbers and letters";
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