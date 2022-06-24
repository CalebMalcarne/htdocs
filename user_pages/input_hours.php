<?php
include '../Headers/general_header.php'
?>
        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-10">
                    <div class="card shadow">
                        <div class="card-header text-center bg-dark text-white">
                            <h1 class="card-title">Input Hours</h1>
                        </div>

                        <div class="card-body mt-2 mx-3">

                            <form method="POST" action="../php/edit_data.php">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Date</label>
                                    <div class="input-group">
                                        <input type="date" name="date" id="date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Hours Worked</label>
                                    <input type="float" name="hours" id="hours" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Job #</label>
                                    <input type="text" name="job" id="job" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Name </label>
                                    <input type="text" name="job_name" id="job_name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Code</label>
                                    <input type="text" name="code" id="code" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Time in</label>
                                    <input type="time" name="time_in" id="time_in" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Time out</label>
                                    <input type="time" name="time_out" id="time_out" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Notes</label>
                                    <input type="text" name="notes" id="notes" class="form-control" required>
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