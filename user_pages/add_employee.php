<?php
include '../Headers/admin_header.php'
?>
        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-10">
                    <div class="card shadow">
                        <div class="card-header text-center bg-dark text-white">
                            <h1 class="card-title">Add Employee</h1>
                        </div>

                        <div class="card-body mt-2 mx-3">

                            <form method="POST" action="../php/add_employee.php">

                                <div class="mb-3">
                                    <label for="type" class="form-label">Name(first and last)</label>
                                    <input type="text" name="emp_name" id="emp_name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Age</label>
                                    <input type="text" name="age" id="age" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">start date</label>
                                    <div class="input-group">
                                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">password </label>
                                    <input type="text" name="pass" id="pass" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Phone</label>
                                    <input type="tel" name="phone" id="phone" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Position</label>
                                    <input type="text" name="position" id="position" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="report" class="form-label">Pay Rate </label>
                                    <input type="number" name="pay" id="pay" class="form-control" required>
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