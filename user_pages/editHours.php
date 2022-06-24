<?php
session_start();
if($_SESSION['user'] == 'admin'){
    include '../Headers/admin_header_edit.php';    
} else {
    include '../Headers/general_header.php';
}

$user_ = $_GET['user_'];
$name_ = $_GET['name_'];

$date = $_GET['date'];
$hours = $_GET['hours'];
$job = $_GET['job_num'];

$job_name = $_GET['job_name'];
$code = $_GET['code'];
$time_in = $_GET['time_in'];
$time_out = $_GET['time_out'];
$notes = $_GET['notes'];
$id = $_GET['id'];

?>
        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-10">
                    <div class="card shadow">
                        <div class="card-header text-center bg-dark text-white">
                            <h1 class="card-title">Edit Hours</h1>
                        </div>

                        <div class="card-body mt-2 mx-3">

                            <form method="POST" action="../php/edit_data.php">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Date</label>
                                    <div class="input-group">
                                        <input value = <?php echo $date;?> type="date" name="update_date" id="update_date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Hours Worked</label>
                                    <input value = <?php echo $hours;?> type="float" name="update_hours" id="update_hours" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Job #</label>
                                    <input value = <?php echo $job;?> type="text" name="update_job" id="update_job" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Name </label>
                                    <input value = <?php echo $job_name;?> type="text" name="update_job_name" id="update_job_name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Code</label>
                                    <input value = <?php echo $code;?> type="text" name="update_code" id="update_code" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Time in</label>
                                    <input value = <?php echo $time_in;?> type="time" name="update_time_in" id="update_time_in" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Time out</label>
                                    <input value = <?php echo $time_out;?> type="time" name="update_time_out" id="update_time_out" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Notes</label>
                                    <input value = "<?php echo $notes;?>" type="text" name="update_notes" id="update_notes" class="form-control" required>
                                </div>

                                <div hidden = "true" class="mb-3">
                                    <label for="report" class="form-label">Notes</label>
                                    <input value = <?php echo $id;?> type="text" name="id" id="id" class="form-control" required>
                                </div>

                                <div hidden = "true" class="mb-3">
                                    <label for="report" class="form-label">Notes</label>
                                    <input value = <?php echo $user_;?> type="text" name="user_" id="user_" class="form-control" required>
                                </div>

                                <div hidden = "true" class="mb-3">
                                    <label for="report" class="form-label">Notes</label>
                                    <input value = <?php echo $name_;?> type="text" name="name_" id="name_" class="form-control" required>
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
        <script> 
            var user = "<?php echo $user_ ?>";
            var name = "<?php echo $name_ ?>";

            var link = document.getElementById("DataLink");
            link.setAttribute("href", "../user_pages/AdminEmp_Data.php?user=" + user + "&name=" + name);
        
        </script>
   
    </body>
</html>